<?php

namespace App\Models;

use App\Models\Traits\Serialize;
use Eloquent;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;
use Throwable;

/**
 * App\Models\User
 *
 * @property int $id
 * @property int|null $invite_user_id
 * @property int|null $telegram_id
 * @property string $email
 * @property string $password
 * @property string|null $password_algo
 * @property string|null $password_salt
 * @property int|null $balance
 * @property int $commission_type 0: system 1: cycle 2: onetime
 * @property int|null $discount
 * @property int|null $commission_rate
 * @property int|null $commission_balance
 * @property int|null $t
 * @property int|null $u
 * @property int|null $d
 * @property int $transfer_enable
 * @property int $banned
 * @property int|null $is_admin
 * @property int|null $last_login_at
 * @property int|null $is_staff
 * @property int|null $last_login_ip
 * @property string $uuid
 * @property int|null $plan_id
 * @property int|null $remind_expire
 * @property int|null $remind_traffic
 * @property string $token
 * @property string|null $register_ip
 * @property int|null $suspend_at
 * @property int|null $expired_at
 * @property string|null $remarks
 * @property int $created_at
 * @property int $updated_at
 * @property-read Collection|InviteCode[] $inviteCodes
 * @property-read int|null $invite_codes_count
 * @property-read Collection|Order[] $orders
 * @property-read int|null $orders_count
 * @property-read Collection|TrafficServerLog[] $serverLogs
 * @property-read int|null $server_logs_count
 * @property-read Collection|TicketMessage[] $ticketMessages
 * @property-read int|null $ticket_messages_count
 * @property-read Collection|Ticket[] $tickets
 * @property-read int|null $tickets_count
 * @property-read Collection|TrafficUserLog[] $trafficUserLogs
 * @property-read int|null $traffic_user_logs_count
 * @property int|null $order_day
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereBalance($value)
 * @method static Builder|User whereBanned($value)
 * @method static Builder|User whereCommissionBalance($value)
 * @method static Builder|User whereCommissionRate($value)
 * @method static Builder|User whereCommissionType($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereD($value)
 * @method static Builder|User whereDiscount($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereExpiredAt($value)
 * @method static Builder|User whereGroupId($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereInviteUserId($value)
 * @method static Builder|User whereIsAdmin($value)
 * @method static Builder|User whereIsStaff($value)
 * @method static Builder|User whereLastLoginAt($value)
 * @method static Builder|User whereLastLoginIp($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User wherePasswordAlgo($value)
 * @method static Builder|User wherePasswordSalt($value)
 * @method static Builder|User wherePlanId($value)
 * @method static Builder|User whereRemarks($value)
 * @method static Builder|User whereRemindExpire($value)
 * @method static Builder|User whereRemindTraffic($value)
 * @method static Builder|User whereT($value)
 * @method static Builder|User whereTelegramId($value)
 * @method static Builder|User whereToken($value)
 * @method static Builder|User whereTransferEnable($value)
 * @method static Builder|User whereU($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User whereUuid($value)
 * @method static Builder|User whereOrderDay($value)
 * @method static Builder|User whereRegisterIp($value)
 * @method static Builder|User whereSuspendAt($value)
 * @mixin Eloquent
 */
class User extends Model
{
    use Serialize;

    const FIELD_ID = "id";
    const FIELD_INVITE_USER_ID = "invite_user_id";
    const FIELD_TELEGRAM_ID = "telegram_id";
    const FIELD_EMAIL = "email";
    const FIELD_PASSWORD = "password";
    const FIELD_PASSWORD_ALGO = "password_algo";
    const FIELD_PASSWORD_SALT = 'password_salt';
    const FIELD_BALANCE = "balance";
    const FIELD_DISCOUNT = "discount";
    const FIELD_COMMISSION_TYPE = "commission_type";
    const FIELD_COMMISSION_RATE = "commission_rate";
    const FIELD_COMMISSION_BALANCE = "commission_balance";
    const FIELD_T = "t";
    const FIELD_U = "u";
    const FIELD_D = "d";
    const FIELD_BANNED = "banned";     //禁止
    const FIELD_IS_ADMIN = "is_admin";
    const FIELD_IS_STAFF = "is_staff";
    const FIELD_LAST_LOGIN_AT = "last_login_at";
    const FIELD_LAST_LOGIN_IP = "last_login_ip";
    const FIELD_REGISTER_IP = "register_ip";
    const FIELD_UUID = "uuid";
    const FIELD_PLAN_ID = "plan_id";
    const FIELD_REMIND_EXPIRE = "remind_expire"; //提醒过期
    const FIELD_REMIND_TRAFFIC = "remind_traffic";
    const FIELD_TOKEN = "token";
    const FIELD_REMARKS = "remarks";
    const FIELD_ORDER_DAY = "order_day";
    const FIELD_EXPIRED_AT = "expired_at";
    const FIELD_SUSPEND_AT = "suspend_at";
    const FIELD_CREATED_AT = "created_at";
    const FIELD_UPDATED_AT = "updated_at";

    const BANNED_OFF = 0;

    const COMMISSION_TYPE_SYSTEM = 0;
    const COMMISSION_TYPE_CYCLE = 1;
    const COMMISSION_TYPE_ONETIME = 2;

    const SUSPEND_DURATION_FIVE_MIN = 1;
    const SUSPEND_DURATION_FIFTEEN_MIN = 2;
    const SUSPEND_DURATION_HALF_HOUR = 3;
    const SUSPEND_DURATION_ONE_HOUR = 4;
    const SUSPEND_DURATION_SIX_HOUR = 5;
    const SUSPEND_DURATION_TWELVE_HOUR = 6;
    const SUSPEND_DURATION_ONE_DAY = 7;


    protected $table = 'user';
    protected $dateFormat = 'U';

    protected $casts = [
        self::FIELD_CREATED_AT => 'timestamp',
        self::FIELD_UPDATED_AT => 'timestamp'
    ];

    /**
     * find admin users
     *
     * @param bool $includeStaff
     * @param bool $withTelegram
     *
     * @return Collection|Builder[]|User[]
     */
    public static function findTelegramAdminUsers(bool $includeStaff = true, bool $withTelegram = true)
    {
        $users = self::where(function ($query) use ($includeStaff) {
            $query->where('is_admin', 1);
            if ($includeStaff) {
                $query->orWhere('is_staff', $includeStaff);
            }
        });

        if ($withTelegram) {
            $users->where('telegram_id', '>', 0);
        }

        return $users->get();
    }

    /**
     * count Month Register
     *
     * @return int
     */
    public static function countMonthRegister(): int
    {
        return User::where(self::FIELD_CREATED_AT, '>=', strtotime(date('Y-m-1')))
            ->where(self::FIELD_CREATED_AT, '<', time())->count();
    }

    /**
     * count effective plan users
     *
     * @param $planId
     * @return int
     */
    public static function countEffectivePlanUsers($planId): int
    {
        return self::where(self::FIELD_PLAN_ID, $planId)->where(function ($query) {
            $query->orWhere(self::FIELD_EXPIRED_AT, NULL)->orWhere(self::FIELD_EXPIRED_AT, '>=', time());
        })->count();
    }
    
    
    /**
      * count online users
      *
      * @return int
      */
     public static function countOnlineUsers(): int
     {
         return self::where(self::FIELD_PLAN_ID, '>', 0)->where(function ($query) {
             $query->orWhere(self::FIELD_EXPIRED_AT, NULL)->orWhere(self::FIELD_EXPIRED_AT, '>=', time());
         })->where(self::FIELD_UPDATED_AT, '>=', time() - 300)->count();
     }
     

    /**
     * find user by email
     *
     * @param string $email
     * @return Builder|Model|object|User|null
     */
    public static function findByEmail(string $email)
    {
        return self::where(self::FIELD_EMAIL, $email)->first();
    }

    /**
     * find user by token
     *
     * @param string $token
     * @return Builder|Model|object|User|null
     */
    public static function findByToken(string $token)
    {
        return self::where(self::FIELD_TOKEN, $token)->first();
    }

    /**
     * find user by telegram id
     *
     * @param int $telegramId
     * @return Builder|Model|object|User|null
     */
    public static function findByTelegramId(int $telegramId)
    {
        return self::where(self::FIELD_TELEGRAM_ID, $telegramId)->first();
    }

    /**
     * get unused invite codes
     *
     * @return Builder[]|Collection|InviteCode[]
     */
    public function getUnusedInviteCodes()
    {
        return InviteCode::where(InviteCode::FIELD_USER_ID, $this->getKey())->
        where(InviteCode::FIELD_STATUS, InviteCode::STATUS_UNUSED)->get();
    }


    /**
     * check available
     *
     * @param bool $updateTransferEnable
     *
     * @return bool
     */
    public function isAvailable(bool $updateTransferEnable = false): bool
    {
        if ($this->isBanned()) {
            return false;
        }

        if ($this->isExpired()) {
            return false;
        }

        /**
         * @var Plan $plan
         */
        $plan = $this->plan();
        if ($plan === null) {
            return false;
        }

        if (!$plan->isTransferEnabled()) {
            return false;
        }
        if ($updateTransferEnable) {
            $this->setAttribute(PLan::FIELD_TRANSFER_ENABLE_VALUE, $plan->getAttribute(Plan::FIELD_TRANSFER_ENABLE_VALUE));
        }
        return true;
    }

    /**
     * check user banned
     *
     * @return bool
     */
    public function isBanned(): bool
    {
        return (bool)$this->getAttribute(self::FIELD_BANNED) != 0;
    }


    /**
     * check user expired
     *
     * @return bool
     */
    public function isExpired(): bool
    {
        $expiredAt = $this->getAttribute(self::FIELD_EXPIRED_AT);
        if ($expiredAt > time() || $expiredAt === null) {
            return false;
        }
        return true;
    }

    /**
     * get plan
     *
     * @return Model|BelongsTo|object|null
     */
    public function plan()
    {
        return $this->belongsTo('App\Models\Plan')->first();
    }

    /**
     * check user not completed order
     *
     * @return bool
     */
    public function isNotCompletedOrders(): bool
    {
        return Order::whereIn(Order::FIELD_STATUS, [Order::STATUS_UNPAID, Order::STATUS_PENDING])->where(Order::FIELD_USER_ID,
                $this->getKey())->count() > 0;
    }

    /**
     * count valid orders
     *
     * @return int
     */
    public function countValidOrders(): int
    {
        return Order::where(Order::FIELD_USER_ID, $this->getKey())
            ->whereNotIn('status', [Order::STATUS_UNPAID, Order::STATUS_CANCELLED])
            ->count();
    }

    /**
     * count valid order amount
     *
     * @return int
     */
    public function countValidOrdersTotalAmount(): int
    {
        return Order::where(Order::FIELD_USER_ID, $this->getKey())
            ->whereNotIn('status', [Order::STATUS_UNPAID, Order::STATUS_CANCELLED])
            ->sum(Order::FIELD_TOTAL_AMOUNT);
    }

    /**
     * count invite users
     *
     * @return int
     */
    public function countInviteUsers(): int
    {
        return User::whereInviteUserId($this->getKey())->count();
    }

    /**
     * check admin
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->getAttribute(self::FIELD_IS_ADMIN) != 0;
    }

    /**
     * check staff
     *
     * @return bool
     */
    public function isStaff(): bool
    {
        return $this->getAttribute(self::FIELD_IS_STAFF) != 0;
    }

    /**
     * stat commission balance
     *
     * @param int $orderStatus
     * @param int $commissionStatus
     *
     * @return int
     */
    public function statCommissionBalance(int $orderStatus, int $commissionStatus): int
    {
        return (int)Order::where(Order::FIELD_STATUS, $orderStatus)
            ->where(Order::FIELD_COMMISSION_STATUS, $commissionStatus)
            ->where(Order::FIELD_INVITE_USER_ID, $this->getKey())
            ->sum(Order::FIELD_COMMISSION_BALANCE);
    }

    /**
     * get invited order details
     *
     * @param array $orderStatus
     *
     * @return Collection|Builder[]|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection|Order[]
     */
    public function getInvitedOrderDetails(array $orderStatus)
    {
        return Order::where(Order::FIELD_INVITE_USER_ID, $this->getKey())
            ->select([
                Order::FIELD_ID,
                Order::FIELD_COMMISSION_BALANCE,
                Order::FIELD_COMMISSION_STATUS,
                Order::FIELD_CREATED_AT,
                Order::FIELD_UPDATED_AT
            ])
            ->where(Order::FIELD_COMMISSION_BALANCE, '>', 0)
            ->whereIn(Order::FIELD_STATUS, $orderStatus)->get();

    }

    /**
     * reset traffic
     *
     * @return void
     */
    public function resetTraffic()
    {
        $this->setAttribute(User::FIELD_U, 0);
        $this->setAttribute(User::FIELD_D, 0);
    }

    /**
     * buy plan with onetime
     *
     * @param Plan $plan
     * @param int|null $expiredAt
     * @param int|null $orderDay
     * @return void
     */
    public function buyPlan(Plan $plan, int $expiredAt = null, int $orderDay = null)
    {
        $this->setAttribute(User::FIELD_PLAN_ID, $plan->getAttribute(Plan::FIELD_ID));
        $this->setAttribute(User::FIELD_EXPIRED_AT, $expiredAt);
        $this->setAttribute(User::FIELD_ORDER_DAY, $orderDay);
    }


    /**
     * add balance
     *
     * @param int $balance
     * @return bool
     */
    public function addBalance(int $balance): bool
    {
        $this->setAttribute(self::FIELD_BALANCE, ($this->getAttribute(self::FIELD_BALANCE) + $balance));
        return true;
    }

    /**
     * add traffic
     *
     * @param int $u
     * @param int $d
     * @return bool
     */
    public function addTraffic(int $u, int $d): bool
    {
        $this->increment(self::FIELD_U, $u);
        $this->increment(self::FIELD_D, $d);
        $this->setAttribute(User::FIELD_T, time());
        return true;
    }

    /**
     * gets the number of invited users
     *
     * @return int
     */
    public function countInvitedUsers(): int
    {
        return self::where(self::FIELD_INVITE_USER_ID, $this->getKey())->count();
    }

    /**
     * get the number of invite codes
     *
     * @return int
     */
    public function countUnusedInviteCodes(): int
    {
        return $this->hasMany("App\Models\InviteCode", InviteCode::FIELD_USER_ID)
            ->where(InviteCode::FIELD_STATUS, InviteCode::STATUS_UNUSED)->count();
    }

    /**
     * Get the number of unprocessed tickets
     *
     * @return int
     */
    public function countUnprocessedTickets(): int
    {
        return Ticket::where(Ticket::FIELD_STATUS, Ticket::STATUS_UNPROCESSED)
            ->where(Ticket::FIELD_USER_ID, $this->getKey())
            ->count();
    }

    /**
     * Get the number of Unpaid orders
     *
     * @return int
     */
    public function countUnpaidOrders(): int
    {
        return Order::where(Order::FIELD_STATUS, Order::STATUS_UNPAID)
            ->where(Order::FIELD_USER_ID, $this->getKey())
            ->count();
    }

    /**
     * Get reset day
     *
     * @return int|null
     */
    public function getResetDay(): ?int
    {
        /**
         * @var Plan $userPlan
         */
        $userPlan = $this->plan();
        if ($userPlan === null) {
            return null;
        }

        $userPlanResetMethod = $userPlan->getAttribute(Plan::FIELD_RESET_TRAFFIC_METHOD);

        if ($userPlanResetMethod === null) {
            $systemTrafficMethod = (int)config('v2board.reset_traffic_method');
            $userPlanResetMethod = $systemTrafficMethod;
        }


        if ($userPlanResetMethod === null || !in_array($userPlanResetMethod, Plan::$resetTrafficMethods)) {
            return null;
        }

        if ($userPlanResetMethod === Plan::RESET_TRAFFIC_METHOD_NOT_RESET) {
            return null;
        }

        if ($userPlanResetMethod === Plan::RESET_TRAFFIC_METHOD_EVERY_DAY) {
            return 1;
        }

        $today = (int)date('d');
        $lastDay = (int)date('d', strtotime('last day of +0 months'));

        if ($userPlanResetMethod === Plan::RESET_TRAFFIC_METHOD_MONTH_FIRST_DAY) {
            $orderDay = 1;
        } else {
            $orderDay = $this->getAttribute(self::FIELD_ORDER_DAY);
        }

        if ($orderDay === null) {
            return null;
        }

        if ($orderDay > $lastDay) {
            $orderDay = 1;
        }

        if ($orderDay > $today) {
            return $orderDay - $today;
        } else if ($orderDay < $today) {
            return $lastDay - $today + $orderDay;
        }
        return (int)(strtotime("next month") - time()) / 86400;
    }

    /**
     * drop
     *
     *
     * @return bool
     * @throws Throwable
     */
    public function drop(): bool
    {
        Db::beginTransaction();
        try {
            $this->orders()->delete();
            $this->tickets()->delete();
            $this->inviteCodes()->delete();
            $this->ticketMessages()->delete();
            $this->trafficUserLogs()->delete();
            $this->delete();
        } catch (Exception $e) {
            DB::rollBack();
        }
        Db::commit();
        return true;
    }

    /**
     * get orders
     *
     * @return HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany('App\Models\Order', Order::FIELD_USER_ID);
    }

    /**
     * get tickets
     *
     * @return HasMany
     */
    public function tickets(): HasMany
    {
        return $this->hasMany('App\Models\Ticket', Ticket::FIELD_USER_ID);
    }

    /**
     * get invite codes
     *
     * @return HasMany
     */
    public function inviteCodes(): HasMany
    {
        return $this->hasMany('App\Models\InviteCode', InviteCode::FIELD_USER_ID);
    }

    /**
     * get ticket messages
     *
     * @return HasMany
     */
    public function ticketMessages(): HasMany
    {
        return $this->hasMany('App\Models\TicketMessage', Ticket::FIELD_USER_ID);
    }

    /**
     * get user traffic logs
     *
     * @return HasMany
     */
    public function trafficUserLogs(): HasMany
    {
        return $this->hasMany('App\Models\TrafficUserLog', TrafficUserLog::FIELD_USER_ID);
    }

    /**
     * suspend
     *
     * @param int $duration
     */
    public function suspend(int $duration)
    {
        switch ($duration) {
            case self::SUSPEND_DURATION_FIVE_MIN:
                $ttl = 60 * 5;
                break;
            case self::SUSPEND_DURATION_FIFTEEN_MIN:
                $ttl = 60 * 15;
                break;
            case self::SUSPEND_DURATION_HALF_HOUR:
                $ttl = 60 * 30;
                break;
            case self::SUSPEND_DURATION_SIX_HOUR:
                $ttl = 60 * 60 * 6;
                break;
            case self::SUSPEND_DURATION_TWELVE_HOUR:
                $ttl = 60 * 60 * 12;
                break;
            case self::SUSPEND_DURATION_ONE_DAY:
                $ttl = 60 * 60 * 24;
                break;
            case self::SUSPEND_DURATION_ONE_HOUR:
            default:
                $ttl = 60 * 60;
                break;
        }

        $recoveryTime = time() + $ttl;
        $this->setAttribute(self::FIELD_SUSPEND_AT, $recoveryTime);
    }

    /**
     * recovery
     */
    public function recovery()
    {
        $this->setAttribute(self::FIELD_SUSPEND_AT, null);
    }

    /**
     * recovery time
     *
     * @return int|null
     */
    public function recoveryTime(): ?int
    {
        return $this->getAttribute(self::FIELD_SUSPEND_AT);
    }

    /**
     * check user suspend status
     *
     * @return bool
     */
    public function isSuspend(): bool
    {
        return (int)$this->getAttribute(self::FIELD_SUSPEND_AT) > time();
    }


}