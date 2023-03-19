<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OrderAssign;
use App\Http\Requests\Admin\OrderFetch;
use App\Http\Requests\Admin\OrderUpdate;
use App\Models\Exceptions\OrderException;
use App\Models\Order;
use App\Models\Plan;
use App\Models\User;
use App\Utils\Helper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;


class OrderController extends Controller
{
    /**
     * _filter
     *
     * @param Request $request
     * @param Builder $builder
     */
    private function _filter(Request $request, Builder $builder)
    {
        $reqFilter = (array)$request->input('filter');
        foreach ($reqFilter as $filter) {
            if ($filter['key'] === User::FIELD_EMAIL) {
                /**
                 * @var User $user
                 */
                $user = User::where(User::FIELD_EMAIL, "%{$filter['value']}%")->first();
                if ($user === null) {
                    continue;
                }
                $builder->where(Order::FIELD_USER_ID, $user->getKey());
                continue;
            }
            //兼容
            if ($filter['condition'] === '模糊' || $filter['condition'] === 'like') {
                $filter['condition'] = 'like';
                $filter['value'] = "%{$filter['value']}%";
            }
            $builder->where($filter['key'], $filter['condition'], $filter['value']);
        }
    }

    /**
     * fetch
     *
     * @param OrderFetch $request
     * @return Application|ResponseFactory|Response
     */
    public function fetch(OrderFetch $request)
    {
        $reqCurrent = $request->input('current') ? $request->input('current') : 1;
        $reqPageSize = $request->input('pageSize') >= 10 ? $request->input('pageSize') : 10;
        $reqIsCommission = (bool)$request->input('is_commission');
        $orderModel = Order::orderBy(Order::FIELD_CREATED_AT, "DESC");

        if ($reqIsCommission) {
            $orderModel->where(Order::FIELD_INVITE_USER_ID, '>', 0);
            $orderModel->whereNotIn(Order::FIELD_STATUS, [Order::STATUS_UNPAID, Order::STATUS_CANCELLED]);
            $orderModel->where(Order::FIELD_COMMISSION_STATUS, '>', 0);
        }
        $this->_filter($request, $orderModel);
        $total = $orderModel->count();
        $orders = $orderModel->forPage($reqCurrent, $reqPageSize)
            ->get();
        return response([
            'data' => $orders,
            'total' => $total
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

        /**
         * @var Order $order
         */
        $order = Order::findByTradeNo($reqTradeNo);

        if ($order === null) {
            abort(500, '订单不存在');
        }

        if ($order->getAttribute(Order::FIELD_STATUS) !== Order::STATUS_UNPAID) {
            abort(500, '只能对待支付的订单进行操作');
        }

        try {
            $order->cancel();
        } catch (OrderException $e) {
            Log::error($e->getMessage());
            abort(500, '取消失败');
        }
        return response([
            'data' => true
        ]);
    }


    /**
     * paid
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function paid(Request $request)
    {
        $reqTradeNo = $request->input('trade_no');
        $order = Order::findByTradeNo($reqTradeNo);

        if ($order === null) {
            abort(500, '订单不存在');
        }

        if ($order->getAttribute(Order::FIELD_STATUS) !== Order::STATUS_UNPAID) {
            abort(500, '只能对待支付的订单进行操作');
        }

        $order->setAttribute(Order::FIELD_PAID_AT, time());
        $order->setAttribute(Order::FIELD_STATUS, Order::STATUS_PENDING);
        $order->setAttribute(Order::FIELD_CALLBACK_NO, Order::CALLBACK_NO_MANUAL_OPERATION);
        if (!$order->save()) {
            abort(500, '更新失败');
        }

        return response([
            'data' => true
        ]);
    }


    /**
     * update
     *
     * @param OrderUpdate $request
     * @return Application|ResponseFactory|Response
     */
    public function update(OrderUpdate $request)
    {
        $reqCommissionStatus = $request->input("commission_status");
        $reqTradeNo = $request->input("trade_no");

        /**
         * @var Order $order
         */
        $order = Order::findByTradeNo($reqTradeNo);
        if ($order === null) {
            abort(500, '订单不存在');
        }

        if ($reqCommissionStatus !== null) {
            $order->setAttribute(Order::FIELD_COMMISSION_STATUS, $reqCommissionStatus);
        }

        if (!$order->save()) {
            abort(500, '更新失败');
        }

        return response([
            'data' => true
        ]);
    }


    /**
     * assign
     *
     * @param OrderAssign $request
     * @return Application|ResponseFactory|Response
     * @throws Throwable
     */
    public function assign(OrderAssign $request)
    {
        $reqPlanId = $request->input('plan_id');
        $reqEmail = $request->input("email");
        $reqPriceId = $request->input("price_id");
        $reqTotalAmount = $request->input("total_amount");

        /**
         * @var Plan $plan
         */
        $plan = Plan::find($reqPlanId);
        /**
         * @var User $user
         */
        $user = User::findByEmail($reqEmail);

        if ($user === null) {
            abort(500, '该用户不存在');
        }

        if ($plan === null) {
            abort(500, '该订阅不存在');
        }

        /**
         * @var Collection $prices
         */
        $prices = $plan->getAttribute(Plan::FIELD_PRICES);
        $price = null;
        if ($prices->count() > 0) {
            $price = $prices->filter(function ($value, $key) use ($reqPriceId) {
                return $value['id'] === $reqPriceId;
            })->pop();
        }

        if ($price === null) {
            abort(500, __("该订阅周期不存在"));
        }

        $priceCollection = collect($price);
        $priceName = $priceCollection->get(Plan::SUB_FIELD_PRICE_NAME);


        DB::beginTransaction();
        $order = new Order();
        $order->setAttribute(Order::FIELD_USER_ID, $user->getKey());
        $order->setAttribute(Order::FIELD_PLAN_ID, $plan->getKey());
        $order->setAttribute(Order::FIELD_PRICE_NAME, $priceName);
        $order->setAttribute(Order::FIELD_PRICE_META, $price);
        $order->setAttribute(Order::FIELD_TRADE_NO, Helper::generateOrderNo());
        $order->setAttribute(Order::FIELD_TOTAL_AMOUNT, $reqTotalAmount);
        $order->setOrderType($user);
        $order->setInvite($user);

        if (!$order->save()) {
            DB::rollback();
            abort(500, '订单创建失败');
        }

        DB::commit();

        return response([
            'data' => $order->getAttribute(Order::FIELD_TRADE_NO)
        ]);
    }
}