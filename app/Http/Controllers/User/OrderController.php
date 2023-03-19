<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\OrderSave;
use App\Models\Exceptions\CouponException;
use App\Models\Exceptions\OrderException;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Plan;
use App\Models\User;
use App\Services\PaymentService;
use App\Utils\Helper;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class OrderController extends Controller
{

    /**
     * fetch
     *
     * @param Request $request
     * @return ResponseFactory|Response
     */
    public function fetch(Request $request)
    {
        $sessionId = $request->session()->get('id');
        $reqStatus = $request->input('status');
        $reqCurrent = (int)$request->input('current') ? $request->input('current') : 1;
        $reqPageSize = (int)$request->input('pageSize') >= 10 ? $request->input('pageSize') : 10;

        $conditions = [];
        $conditions[Order::FIELD_USER_ID] = $sessionId;

        if ($reqStatus != null) {
            $conditions[Order::FIELD_STATUS] = (int)$reqStatus;
        }

        $orderModel = Order::where($conditions)->orderBy(Order::CREATED_AT, 'desc');
        $total = $orderModel->count();
        $orders = $orderModel->forPage($reqCurrent, $reqPageSize)->get();
        $plans = Plan::get();

        foreach ($orders as $order) {
            /**
             * @var  Order $order
             */
            $orderPlanId = $order->getAttribute(Order::FIELD_PLAN_ID);

            foreach ($plans as $plan) {
                /**
                 * @var Plan $plan
                 */
                $planId = $plan->getKey();
                if ($orderPlanId == $planId) {
                    $order->setAttribute("plan", $plan);
                }
            }
        }

        return response([
            'data' => $orders->makeHidden([Order::FIELD_ID, Order::FIELD_USER_ID]),
            'total' => $total
        ]);
    }


    /**
     * details
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function details(Request $request)
    {
        $reqTradeNo = $request->input('trade_no');
        /**
         * @var Order $order
         */
        $order = Order::findByTradeNo($reqTradeNo);
        if ($order === null) {
            abort(500, __('Order does not exist or has been paid'));
        }

        if ($order->getAttribute(Order::FIELD_TYPE) !== Order::TYPE_RECHARGE) {
            $order['plan'] = Plan::find($order->getAttribute(Order::FIELD_PLAN_ID));
            $order['try_out_plan_id'] = (int)config('v2board.try_out_plan_id');
            if (!$order['plan']) {
                abort(500, __('Subscription plan does not exist'));
            }
        }

        return response([
            'data' => $order
        ]);
    }

    /**
     * save
     *
     * @param OrderSave $request
     * @return Application|ResponseFactory|Response
     * @throws Throwable
     */
    public function save(OrderSave $request)
    {
        $reqId = $request->input('plan_id');
        $reqPriceId = $request->input('price_id');
        $sessionId = $request->session()->get('id');
        $reqCouponCode = $request->input('coupon_code');

        /**
         * @var Plan $plan
         */
        $plan = Plan::find($reqId);
        if ($plan === null || (!$plan->isShowOn() && !$plan->isRenewOn())) {
            abort(500, __('Subscription plan does not exist'));
        }

        /**
         * @var Collection $prices
         */
        $prices = $plan->getAttribute(Plan::FIELD_PRICES);
        $price = null;
        if ($prices->count() > 0) {
            $price = collect($prices)->filter(function ($value, $key) use ($reqPriceId) {
                return $value['id'] === $reqPriceId;
            })->pop();
        }

        if ($price === null) {
            abort(500, __("This payment cycle cannot be purchased, please choose another cycle"));
        }

        if (isset($price[Plan::SUB_FIELD_PRICE_TIP])) {
            unset($price[Plan::SUB_FIELD_PRICE_TIP]);
        }

        if (isset($price[Plan::SUB_FIELD_PRICE_OFF_TIP])) {
            unset($price[Plan::SUB_FIELD_PRICE_OFF_TIP]);
        }

        $priceCollection = collect($price);
        $priceType = $priceCollection->get(Plan::SUB_FIELD_PRICE_TYPE);
        $priceValue = $priceCollection->get(Plan::SUB_FIELD_PRICE_VALUE);
        $priceName = $priceCollection->get(Plan::SUB_FIELD_PRICE_NAME);

        DB::beginTransaction();

        /**
         * @var User $user
         */
        $user = User::lockForUpdate()->find($sessionId);
        if ($user == null) {
            abort(500, __('The user does not exist'));
        }

        if ($user->isNotCompletedOrders()) {
            abort(500, __('You have an unpaid or pending order, please try again later or cancel it'));
        }

        if (!$plan->isShowOn() && $plan->isRenewOn() && $user->getAttribute(User::FIELD_PLAN_ID) !== $plan->getKey()) {
            abort(500, __('This subscription has been sold out, please choose another subscription'));
        }

        if ($plan->isShowOn() && !$plan->isRenewOn() && $user->getAttribute(User::FIELD_PLAN_ID) === $plan->getKey()) {
            abort(500, __('This subscription cannot be renewed, please change to another subscription'));
        }

        if ($priceType === Plan::PRICE_TYPE_RESET) {
            if (($user->getAttribute(User::FIELD_EXPIRED_AT) !== null && $user->getAttribute(User::FIELD_EXPIRED_AT) <= time()) || $user->getAttribute(User::FIELD_PLAN_ID) < 0) {
                abort(500, __('Subscription has expired or no active subscription, unable to purchase Data Reset Package'));
            }
        }

        if (!$plan->isAllowID((int)$user->getAttribute(User::FIELD_PLAN_ID))) {
            abort(500, __('Not eligible to purchase this subscription'));
        }

        $order = new Order();
        $order->setAttribute(Order::FIELD_USER_ID, $sessionId);
        $order->setAttribute(Order::FIELD_PLAN_ID, $reqId);
        $order->setAttribute(Order::FIELD_PRICE_NAME, $priceName);
        $order->setAttribute(Order::FIELD_PRICE_META, $price);
        $order->setAttribute(Order::FIELD_TRADE_NO, Helper::generateOrderNo());
        $order->setAttribute(Order::FIELD_TOTAL_AMOUNT, $priceValue);

        if ($reqCouponCode) {
            try {
                $couponId = $order->useCoupon($reqCouponCode);
                if ($couponId === 0) {
                    DB::rollBack();
                    abort(500, __('Coupon failed'));
                }
                $order->setAttribute(Order::FIELD_COUPON_ID, $couponId);
            } catch (CouponException $e) {
                DB::rollBack();
                abort($e->getCode(), $e->getMessage());
            }
        }

        $configCommissionFirstTimeEnable = (bool)config('v2board.commission_first_time_enable', 1);
        $configCommissionRate = (int)config('v2board.invite_commission', 10);
        $order->setUserDiscount($user);
        $order->setOrderType($user);
        $order->setInvite($user, $configCommissionFirstTimeEnable, $configCommissionRate);

        if ($order->getAttribute(Order::FIELD_TYPE) == Order::TYPE_CHANGE) {
            if (!(int)config('v2board.plan_change_enable', 1)) {
                abort(500, '目前不允许更改订阅，请联系客服或提交工单操作');
            }
        }

        $userBalance = (int)$user->getAttribute(User::FIELD_BALANCE);
        $totalAmount = (int)$order->getAttribute(Order::FIELD_TOTAL_AMOUNT);

        if ($userBalance > 0 && $totalAmount > 0) {
            $remainingBalance = $userBalance - $totalAmount;
            if ($remainingBalance > 0) {
                $user->addBalance(-$totalAmount);
                //余额
                $order->setAttribute(Order::FIELD_BALANCE_AMOUNT, $totalAmount);
                //总金额
                $order->setAttribute(Order::FIELD_TOTAL_AMOUNT, 0);
            } else {
                $user->addBalance(-$userBalance);
                //余额
                $order->setAttribute(Order::FIELD_BALANCE_AMOUNT, $userBalance);
                $order->setAttribute(Order::FIELD_TOTAL_AMOUNT, $totalAmount - $userBalance);
            }

            if (!$user->save()) {
                DB::rollBack();
                abort(500, __('Insufficient balance'));
            }
        }

        if (!$order->save()) {
            DB::rollback();
            abort(500, __('Failed to create order'));
        }

        DB::commit();

        return response([
            'data' => $order->getAttribute(Order::FIELD_TRADE_NO)
        ]);
    }

    public function checkout(Request $request)
    {
        $reqTradeNo = $request->input('trade_no');
        $reqMethod = $request->input('method');
        $reqToken = $request->input('token', "");
        $sessionId = $request->session()->get('id');
        $order = Order::where(Order::FIELD_TRADE_NO, $reqTradeNo)
            ->where(Order::FIELD_USER_ID, $sessionId)
            ->where(Order::FIELD_STATUS, Order::STATUS_UNPAID)
            ->first();


        /**
         * @var Order $order
         */
        if ($order === null) {
            abort(500, __('Order does not exist or has been paid'));
        }


        if ($order->getAttribute(Order::FIELD_TYPE) !== Order::TYPE_RECHARGE) {
            $plan = $order->plan();
            /**
             * @var Plan $plan
             */
            if ($plan === null || !$plan->isShowOn()) {
                abort(500, "该订阅无法销售");
            }
        }

        // free process 免费订单处理
        if ($order->getAttribute(Order::FIELD_TOTAL_AMOUNT) <= 0) {
            $order->setAttribute(Order::FIELD_TOTAL_AMOUNT, 0);
            $order->setAttribute(Order::FIELD_STATUS, Order::STATUS_PENDING);
            $order->save();
            return response([
                'type' => -1,
                'data' => true
            ]);
        }
        $data = [];
        /**
         * @var Payment $payment
         */
        $payment = Payment::find($reqMethod);
        if ($payment === null || !$payment->isEnabled()) {
            abort(500, __('Payment method is not available'));
        }

        try {
            $paymentService = new PaymentService($payment->getAttribute(Payment::FIELD_PAYMENT), $payment);
            $result = $paymentService->pay($order, $reqToken);
            $order->setAttribute(Order::FIELD_PAYMENT_ID, $reqMethod);
            if (!$order->save()) {
                abort(500, "保存失败");
            }
            $data = [
                'type' => $result['type'],
                'data' => $result['data']
            ];

        } catch (Exception $e) {
            abort(500, "支付流程失败" . $e->getMessage());
        }

        return response($data);
    }

    /**
     * order
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function check(Request $request)
    {
        $reqTradeNo = $request->input('trade_no');
        /**
         * @var Order $order
         */
        $order = Order::findByTradeNo($reqTradeNo);
        if ($order === null) {
            abort(500, __('Order does not exist'));
        }
        return response([
            'data' => $order->getAttribute(Order::FIELD_STATUS)
        ]);
    }

    /**
     * get payment method
     *
     * @return Application|ResponseFactory|Response
     */
    public function getPaymentMethod()
    {
        $methods = Payment::select([
            Payment::FIELD_ID,
            Payment::FIELD_NAME,
            Payment::FIELD_PAYMENT,
            Payment::FIELD_ICON_TYPE
        ])->where(Payment::FIELD_ENABLE, Payment::PAYMENT_ON)->get();

        return response([
            'data' => $methods
        ]);
    }

    /**
     * cancel
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     * @throws Throwable
     */
    public function cancel(Request $request)
    {
        $reqTradeNo = $request->input('trade_no');
        if (empty($reqTradeNo)) {
            abort(500, __('Invalid parameter'));
        }

        /**
         * @var Order $order
         */
        $order = Order::findByTradeNo($reqTradeNo);
        if ($order == null) {
            abort(500, __('Order does not exist'));
        }

        try {
            $order->cancel();
        } catch (OrderException $e) {
            Log::error($e->getMessage());
            abort(500, __('Cancel failed'));
        }

        return response([
            'data' => true
        ]);
    }
}