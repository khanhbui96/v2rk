<?php

namespace App\Models;

use App\Models\Exceptions\CouponException;
use App\Models\Exceptions\OrderException;
use App\Models\Traits\Serialize;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Throwable;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property int|null $invite_user_id
 * @property int $user_id
 * @property int $plan_id
 * @property int|null $coupon_id 0
 * @property int|null $payment_id
 * @property int $type 1新购2续费3升级
 * @property string $cycle
 * @property string $trade_no
 * @property string|null $callback_no
 * @property int $total_amount
 * @property int|null $discount_amount
 * @property int|null $balance_amount 使用余额
 * @property int $status 0待支付1开通中2已取消3已完成4已折抵
 * @property int $commission_status 0待确认1发放中2有效3无效
 * @property int $commission_balance
 * @property int|null $paid_at
 * @property array|null $price_meta
 * @property string $price_name
 * @property int $created_at
 * @property int $updated_at
 * @method static Builder|Order newModelQuery()
 * @method static Builder|Order newQuery()
 * @method static Builder|Order query()
 * @method static Builder|Order whereBalanceAmount($value)
 * @method static Builder|Order whereCallbackNo($value)
 * @method static Builder|Order whereCommissionBalance($value)
 * @method static Builder|Order whereCommissionStatus($value)
 * @method static Builder|Order whereCouponId($value)
 * @method static Builder|Order whereCreatedAt($value)
 * @method static Builder|Order whereCycle($value)
 * @method static Builder|Order whereDiscountAmount($value)
 * @method static Builder|Order whereId($value)
 * @method static Builder|Order whereInviteUserId($value)
 * @method static Builder|Order wherePaidAt($value)
 * @method static Builder|Order wherePaymentId($value)
 * @method static Builder|Order wherePlanId($value)
 * @method static Builder|Order whereStatus($value)
 * @method static Builder|Order whereTotalAmount($value)
 * @method static Builder|Order whereTradeNo($value)
 * @method static Builder|Order whereType($value)
 * @method static Builder|Order whereUpdatedAt($value)
 * @method static Builder|Order whereUserId($value)
 * @method static Builder|Order wherePriceMeta($value)
 * @method static Builder|Order wherePriceName($value)
 * @mixin Eloquent
 */
class Order extends Model
{
    use Serialize;

    const FIELD_ID = "id";
    const FIELD_INVITE_USER_ID = "invite_user_id";
    const FIELD_USER_ID = "user_id";
    const FIELD_PLAN_ID = "plan_id";
    const FIELD_COUPON_ID = "coupon_id";
    const FIELD_PAYMENT_ID = "payment_id";
    const FIELD_TYPE = "type";
    const FIELD_PRICE_META = "price_meta";
    const FIELD_PRICE_NAME = "price_name";
    const FIELD_TRADE_NO = "trade_no";
    const FIELD_CALLBACK_NO = "callback_no";
    const FIELD_TOTAL_AMOUNT = "total_amount"; //总金额
    const FIELD_DISCOUNT_AMOUNT = "discount_amount"; //折扣金额
    const FIELD_BALANCE_AMOUNT = "balance_amount"; // 余额
    const FIELD_STATUS = "status";
    const FIELD_COMMISSION_STATUS = "commission_status"; //佣金状态
    const FIELD_COMMISSION_RATE = "commission_rate";   //佣金率
    const FIELD_COMMISSION_BALANCE = "commission_balance";   //佣金余额
    const FIELD_PAID_AT = "paid_at";
    const FIELD_CREATED_AT = "created_at";
    const FIELD_UPDATED_AT = "updated_at";

    const CALLBACK_NO_MANUAL_OPERATION = "manual_operation";

    //0待支付1开通中2已取消3已完成
    const STATUS_UNPAID = 0;
    const STATUS_PENDING = 1;
    const STATUS_CANCELLED = 2;
    const STATUS_COMPLETED = 3;

    //1新购2续费3变更4重置流量包5一次性6充值
    const TYPE_NEW_ORDER = 1;
    const TYPE_RENEW = 2;
    const TYPE_CHANGE = 3;
    const TYPE_RESET_PRICE = 4;
    const TYPE_ONETIME = 5;
    const TYPE_RECHARGE = 6;


    //0待确认1发放中2有效3无效
    const COMMISSION_STATUS_NEW = 0;
    const COMMISSION_STATUS_PENDING = 1;
    const COMMISSION_STATUS_VALID = 2;
    const COMMISSION_STATUS_INVALID = 3;

    protected $table = 'order';
    protected $dateFormat = 'U';

    protected $casts = [
        self::FIELD_PRICE_META => 'collection',
        self::FIELD_CREATED_AT => 'timestamp',
        self::FIELD_UPDATED_AT => 'timestamp',
    ];

    /**
     * 用户
     *
     * @return BelongsTo|Model|object
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User')->first();
    }

    /**
     * Plan
     *
     * @return BelongsTo|Model|object
     */
    public function plan()
    {
        return $this->belongsTo("App\Models\Plan")->first();
    }

    /**
     * Coupon
     *
     * @return BelongsTo|Model|object|null
     */
    public function coupon()
    {
        return $this->belongsTo("App\Models\Coupon")->first();
    }

    /**
     * Payment
     *
     * @return BelongsTo|Model|object|null
     */
    public function payment()
    {
        return $this->belongsTo("App\Models\Payment")->first();
    }


    public function isNewOrder(): bool
    {
        return $this->getAttribute(Order::FIELD_TYPE) === Order::TYPE_NEW_ORDER;
    }

    /**
     * set user discount
     *
     * @param User $user
     *
     * @return void
     */
    public function setUserDiscount(User $user)
    {
        $discountAmount = $this->getAttribute(self::FIELD_DISCOUNT_AMOUNT);
        $totalAmount = $this->getAttribute(self::FIELD_TOTAL_AMOUNT);
        $userDiscount = $user->getAttribute(User::FIELD_DISCOUNT);
        if ($userDiscount > 0) {
            $this->setAttribute(self::FIELD_DISCOUNT_AMOUNT, $discountAmount + ($totalAmount * ($userDiscount / 100)));
        }
        $this->setAttribute(self::FIELD_TOTAL_AMOUNT, ($totalAmount - $this->getAttribute(self::FIELD_DISCOUNT_AMOUNT)));
    }


    /**
     * set order type
     *
     * @param User $user
     *
     * @return void
     */
    public function setOrderType(User $user)
    {
        /**
         * @var Collection $priceMeta
         */
        $priceMeta = $this->getAttribute(self::FIELD_PRICE_META);
        $priceType = $priceMeta->get(Plan::SUB_FIELD_PRICE_TYPE);
        $userPlanId = (int)$user->getAttribute(User::FIELD_PLAN_ID);
        $planId = (int)$this->getAttribute(Order::FIELD_PLAN_ID);
        $userExpiredAt = $user->getAttribute(User::FIELD_EXPIRED_AT);

        if ($priceType === Plan::PRICE_TYPE_RESET) {
            $type = self::TYPE_RESET_PRICE;
        } else if ($priceType === Plan::PRICE_TYPE_ONETIME) {
            $type = self::TYPE_ONETIME;
        } else if ($userPlanId !== 0 && $planId !== $userPlanId && $userExpiredAt > time()) {
            $type = self::TYPE_CHANGE;
        } else if ($planId === $userPlanId && $userExpiredAt > time()) {
            $type = self::TYPE_RENEW;
        } else { // 新购
            $type = self::TYPE_NEW_ORDER;
        }
        $this->setAttribute(self::FIELD_TYPE, $type);
    }


    /**
     * set invite
     *
     * @param User $user
     * @param bool $commissionFirstTimeEnable
     * @param int $commissionRate
     *
     * @return void
     */
    public function setInvite(User $user, bool $commissionFirstTimeEnable = true, int $commissionRate = 10)
    {
        $userInviteId = (int)$user->getAttribute(User::FIELD_INVITE_USER_ID);
        $totalAmount = (int)$this->getAttribute(self::FIELD_TOTAL_AMOUNT);

        if ($userInviteId > 0 && $totalAmount > 0) {
            $this->setAttribute(self::FIELD_INVITE_USER_ID, $userInviteId);
            $isCommission = false;
            switch ($user->getAttribute(User::FIELD_COMMISSION_TYPE)) {
                case User::COMMISSION_TYPE_SYSTEM:
                    $isCommission = (!$commissionFirstTimeEnable || $user->countValidOrders() == 0);
                    break;
                case User::COMMISSION_TYPE_CYCLE:
                    $isCommission = true;
                    break;
                case User::COMMISSION_TYPE_ONETIME:
                    $isCommission = $user->countValidOrders() == 0;
                    break;
            }

            if ($isCommission) {
                $inviter = User::find($userInviteId);
                $totalAmount = $this->getAttribute(Order::FIELD_TOTAL_AMOUNT);
                /**
                 * @var User $inviter
                 */
                if ($inviter && $inviter->getAttribute(User::FIELD_COMMISSION_RATE)) {
                    $commissionBalance = $totalAmount * ($inviter->getAttribute(User::FIELD_COMMISSION_RATE) / 100);
                } else {
                    $commissionBalance = $totalAmount * ($commissionRate / 100);
                }
                $this->setAttribute(self::FIELD_COMMISSION_BALANCE, $commissionBalance);
                $this->setAttribute(self::FIELD_COMMISSION_RATE, $commissionRate);
            }

        }
    }


    /**
     * stat month income
     *
     * @return mixed
     */
    public static function sumMonthIncome()
    {
        return self::where(self::FIELD_CREATED_AT, '>=', strtotime(date('Y-m-1')))
            ->where(self::FIELD_CREATED_AT, '<', time())
            ->whereNotIn(self::FIELD_STATUS, [self::STATUS_UNPAID, self::STATUS_CANCELLED])
            ->sum(self::FIELD_TOTAL_AMOUNT);
    }


    /**
     * stat day income
     *
     * @return mixed
     */
    public static function sumDayIncome()
    {
        return self::where(self::FIELD_CREATED_AT, '>=', strtotime(date('Y-m-d')))
            ->where(self::FIELD_CREATED_AT, '<', time())
            ->whereNotIn(self::FIELD_STATUS, [self::STATUS_UNPAID, self::STATUS_CANCELLED])
            ->sum(self::FIELD_TOTAL_AMOUNT);
    }


    /**
     * stat last month income
     *
     * @return mixed
     */
    public static function sumLastMonthIncome()
    {
        return Order::where(self::FIELD_CREATED_AT, '>=', strtotime('-1 month', strtotime(date('Y-m-1'))))
            ->where(self::FIELD_CREATED_AT, '<', strtotime(date('Y-m-1')))
            ->whereNotIn(self::FIELD_STATUS, [self::STATUS_UNPAID, self::STATUS_CANCELLED])
            ->sum(self::FIELD_TOTAL_AMOUNT);
    }


    /**
     * stat commission pending
     *
     * @return int
     */
    public static function countCommissionPending(): int
    {
        return self::where(self::FIELD_COMMISSION_STATUS, self::COMMISSION_STATUS_NEW)
            ->where(self::FIELD_INVITE_USER_ID, '!=', 0)
            ->whereNotIn(self::FIELD_STATUS, [self::STATUS_UNPAID, self::STATUS_CANCELLED])
            ->where(self::FIELD_COMMISSION_STATUS, '>', 0)
            ->count();
    }

    /**
     * find order by tradeNo
     *
     * @param string $tradeNo
     * @return Builder|Model|object|Order|null
     */
    public static function findByTradeNo(string $tradeNo)
    {
        return self::where(self::FIELD_TRADE_NO, $tradeNo)->first();
    }

    /**
     * use Coupon
     *
     * @param string $couponCode
     * @return int|mixed
     * @throws CouponException
     */
    public function useCoupon(string $couponCode)
    {
        $planId = $this->getAttribute(Order::FIELD_PLAN_ID);
        $userId = $this->getAttribute(Order::FIELD_USER_ID);
        /**
         * @var Collection $priceMeta
         */
        $priceMeta = $this->getAttribute(Order::FIELD_PRICE_META);
        $priceId = $priceMeta->get(Plan::SUB_FIELD_PRICE_ID);
        $coupon = Coupon::checkCode($couponCode, $planId, $userId, $priceId);
        $couponType = $coupon->getAttribute(Coupon::FIELD_TYPE);
        $couponValue = $coupon->getAttribute(Coupon::FIELD_VALUE);
        $couponLimitUse = $coupon->getAttribute(Coupon::FIELD_LIMIT_USE);
        $totalAmount = $this->getAttribute(Order::FIELD_TOTAL_AMOUNT);
        switch ($couponType) {
            case 1:
                $this->setAttribute(Order::FIELD_DISCOUNT_AMOUNT, $couponValue * 100);
                break;
            case 2:
                $this->setAttribute(Order::FIELD_DISCOUNT_AMOUNT, $totalAmount * ($couponValue / 100));
                break;
        }

        if ($this->getAttribute(Order::FIELD_DISCOUNT_AMOUNT) > $totalAmount) {
            $this->setAttribute(Order::FIELD_DISCOUNT_AMOUNT, $totalAmount);
        }

        if ($couponLimitUse > 0) {
            $coupon->setAttribute(Coupon::FIELD_LIMIT_USE, $couponLimitUse - 1);
        }
        return $coupon->save() ? $coupon->getKey() : 0;
    }


    /**
     * @throws OrderException
     * @throws Throwable
     */
    public function cancel(): bool
    {
        /**
         * @var User $user
         */
        $user = $this->user();
        if ($user === null) {
            throw new OrderException("user not exist", 1);
        }

        DB::beginTransaction();
        $balanceAmount = $this->getAttribute(Order::FIELD_BALANCE_AMOUNT);
        if ($balanceAmount > 0) {
            $user->addBalance($balanceAmount);
            if (!$user->save()) {
                DB::rollBack();
                throw new OrderException("user save failed, rollback: " . $user->getKey(), 2);
            }
        }

        $this->setAttribute(Order::FIELD_STATUS, Order::STATUS_CANCELLED);
        if (!$this->save()) {
            DB::rollBack();
            throw new OrderException("order save failed, rollback: " . $this->getKey(), 3);
        }
        DB::commit();

        return true;
    }


    /**
     * open order
     *
     * @throws OrderException
     * @throws Throwable
     */
    public function open(): bool
    {
        /**
         * @var User $user
         */
        $user = $this->user();
        if ($user === null) {
            throw new OrderException("user not exist", 1);
        }

        if ($this->getAttribute(self::FIELD_TYPE) === Order::TYPE_RECHARGE) {
            return $this->_openRecharge($user);
        }

        DB::beginTransaction();
        /**
         * @var Plan $plan
         */
        $plan = $this->plan();
        if ($plan === null) {
            throw new OrderException("plan not found, break: " . $this->getAttribute(Order::FIELD_PLAN_ID), 4);
        }
        /**
         * @var Collection $orderPriceMeta
         */
        $orderPriceMeta = $this->getAttribute(Order::FIELD_PRICE_META);
        $orderPriceType = $orderPriceMeta->get(Plan::SUB_FIELD_PRICE_TYPE);
        switch ($orderPriceType) {
            case Plan::PRICE_TYPE_ONETIME:
                $user->resetTraffic();
                $user->buyPlan($plan);
                break;
            case Plan::PRICE_TYPE_RESET:
                $user->resetTraffic();
                break;
            case Plan::PRICE_TYPE_LOOP_LIMIT:
                $orderType = $this->getAttribute(Order::FIELD_TYPE);
                $priceExpireType = $orderPriceMeta->get(Plan::SUB_FIELD_PRICE_EXPIRE_TYPE);
                $priceExpireValue = $orderPriceMeta->get(Plan::SUB_FIELD_PRICE_EXPIRE_VALUE);
                $userExpiredAt = $user->getAttribute(User::FIELD_EXPIRED_AT);
                $userOrderDay = $user->getAttribute(User::FIELD_ORDER_DAY);
                if ($orderType === Order::TYPE_NEW_ORDER || $orderType === Order::TYPE_CHANGE) {
                    $user->resetTraffic();
                    $userExpiredAt = time();
                }

                if ($orderType === Order::TYPE_RENEW) {
                    $user->buyPlan($plan, Plan::expiredTime($priceExpireType, $priceExpireValue, $userExpiredAt), $userOrderDay);
                } else {
                    $user->buyPlan($plan, Plan::expiredTime($priceExpireType, $priceExpireValue, $userExpiredAt), date('d', time()));
                }
                break;
            default:
                break;
        }

        if (!$user->save()) {
            DB::rollBack();
            throw new OrderException("user saved failed, rollback: " . $user->getKey(), 2);
        }

        $this->setAttribute(Order::FIELD_STATUS, Order::STATUS_COMPLETED);
        if (!$this->save()) {
            DB::rollBack();
            throw new OrderException("order save failed, rollback: " . $this->getKey(), 3);
        }

        DB::commit();
        return true;
    }

    /**
     * open recharge order
     *
     * @param User $user
     * @return bool
     * @throws OrderException
     * @throws Throwable
     */
    private function _openRecharge(User $user): bool
    {
        DB::beginTransaction();

        $totalAmount = $this->getAttribute(Order::FIELD_TOTAL_AMOUNT);
        $user->increment(User::FIELD_BALANCE, $totalAmount);
        $this->setAttribute(Order::FIELD_STATUS, Order::STATUS_COMPLETED);
        if (!$user->save()) {
            DB::rollBack();
            throw new OrderException("user saved failed, rollback: " . $user->getKey(), 2);
        }

        $this->setAttribute(Order::FIELD_STATUS, Order::STATUS_COMPLETED);
        if (!$this->save()) {
            DB::rollBack();
            throw new OrderException("order save failed, rollback: " . $this->getKey(), 3);
        }

        DB::commit();
        return true;
    }


    /**
     * Get coupon used count
     *
     * @param $couponId
     * @param $userId
     * @return int
     */
    public static function getCouponUsedCount($couponId, $userId): int
    {
        return self::where(self::FIELD_COUPON_ID, $couponId)
            ->where(self::FIELD_USER_ID, $userId)
            ->whereNotIn(self::FIELD_STATUS, [self::STATUS_UNPAID, self::STATUS_CANCELLED])
            ->count();
    }
}