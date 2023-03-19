<?php


namespace App\Models;

use App\Models\Traits\Serialize;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Plan
 *
 * @property int $id
 * @property int $transfer_enable
 * @property int $transfer_enable_value
 * @property string $name
 * @property int $show
 * @property int|null $sort
 * @property int $renew
 * @property string|null $content
 * @property int|null $end_sec
 * @property int|null $start_sec
 * @property int $time_limit
 * @property int|null $reset_traffic_method
 * @property array|null $allow_ids
 * @property \Illuminate\Support\Collection|null $prices
 * @property int $created_at
 * @property int $updated_at
 * @method static Builder|Plan newModelQuery()
 * @method static Builder|Plan newQuery()
 * @method static Builder|Plan query()
 * @method static Builder|Plan whereAllowIds($value)
 * @method static Builder|Plan whereContent($value)
 * @method static Builder|Plan whereCreatedAt($value)
 * @method static Builder|Plan whereEndSec($value)
 * @method static Builder|Plan whereId($value)
 * @method static Builder|Plan whereName($value)
 * @method static Builder|Plan wherePrices($value)
 * @method static Builder|Plan whereRenew($value)
 * @method static Builder|Plan whereResetTrafficMethod($value)
 * @method static Builder|Plan whereShow($value)
 * @method static Builder|Plan whereSort($value)
 * @method static Builder|Plan whereStartSec($value)
 * @method static Builder|Plan whereTimeLimit($value)
 * @method static Builder|Plan whereTransferEnable($value)
 * @method static Builder|Plan whereTransferEnableValue($value)
 * @method static Builder|Plan whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Plan extends Model
{
    use Serialize;

    const FIELD_ID = "id";
    const FIELD_TRANSFER_ENABLE = "transfer_enable";
    const FIELD_TRANSFER_ENABLE_VALUE = "transfer_enable_value";
    const FIELD_NAME = "name";
    const FIELD_SHOW = "show"; //销售状态
    const FIELD_SORT = "sort";
    const FIELD_RENEW = "renew";  //是否可续费
    const FIELD_CONTENT = "content";
    const FIELD_PRICES = "prices";
    const FIELD_RESET_TRAFFIC_METHOD = 'reset_traffic_method';
    const FIELD_ALLOW_IDS = 'allow_ids';
    const FIELD_TIME_LIMIT = 'time_limit';
    const FIELD_START_SEC = "start_sec";
    const FIELD_END_SEC = "end_sec";
    const FIELD_CREATED_AT = "created_at";
    const FIELD_UPDATED_AT = "updated_at";

    const SUB_FIELD_PRICE_ID = "id";
    const SUB_FIELD_PRICE_NAME = "name";
    const SUB_FIELD_PRICE_TYPE = "type";
    const SUB_FIELD_PRICE_VALUE = "value";
    const SUB_FIELD_PRICE_EXPIRE_TYPE = "expire_type";
    const SUB_FIELD_PRICE_EXPIRE_VALUE = "expire_value";
    const SUB_FIELD_PRICE_TIP = "tip";
    const SUB_FIELD_PRICE_OFF_TIP = "off_tip";

    const PRICE_TYPE_LOOP_LIMIT = 1;
    const PRICE_TYPE_ONETIME = 2;
    const PRICE_TYPE_RESET = 3;

    const PRICE_EXPIRE_TYPE_DAY = 'day';
    const PRICE_EXPIRE_TYPE_MONTH = 'month';
    const PRICE_EXPIRE_TYPE_YEAR = 'year';

    const SHOW_OFF = 0;
    const SHOW_ON = 1;

    const RENEW_OFF = 0;
    const RENEW_ON = 1;

    const RESET_TRAFFIC_METHOD_SYSTEM = null;
    const RESET_TRAFFIC_METHOD_MONTH_FIRST_DAY = 0;
    const RESET_TRAFFIC_METHOD_ORDER_DAY = 1;
    const RESET_TRAFFIC_METHOD_EVERY_DAY = 2;
    const RESET_TRAFFIC_METHOD_NOT_RESET = -1;

    protected $table = 'plan';
    protected $dateFormat = 'U';

    public static $resetTrafficMethods = [
        self::RESET_TRAFFIC_METHOD_MONTH_FIRST_DAY,
        self::RESET_TRAFFIC_METHOD_ORDER_DAY,
        self::RESET_TRAFFIC_METHOD_EVERY_DAY,
        self::RESET_TRAFFIC_METHOD_NOT_RESET
    ];

    protected $casts = [
        self::FIELD_PRICES => 'collection',
        self::FIELD_ALLOW_IDS => 'array',
        self::FIELD_CREATED_AT => 'timestamp',
        self::FIELD_UPDATED_AT => 'timestamp'
    ];

    /**
     * get show plans
     *
     * @return Builder[]|Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection|Plan[]
     */
    public static function getShowPlans(User $user)
    {
        $plans = self::where(self::FIELD_SHOW, self::SHOW_ON)->orderBy(self::FIELD_SORT, "ASC")->get();
        return $plans->filter(function ($plan) use ($user) {
            /**
             * @var Plan $plan
             */
            $allowIds = $plan->getAttribute(Plan::FIELD_ALLOW_IDS);
            $userPlanId = $user->getAttribute(User::FIELD_PLAN_ID);
            if (is_array($allowIds)) {
                return in_array($userPlanId, $allowIds);
            }
            return $plan;
        });
    }

    /**
     * 格式化时间
     *
     * @param string $type
     * @param int $value
     * @param mixed $timestamp
     * @return false|int
     */
    public static function expiredTime(string $type, int $value, $timestamp = null)
    {
        if ($timestamp === null || $timestamp < time()) {
            $timestamp = time();
        }
        switch ($type) {
            case self::PRICE_EXPIRE_TYPE_YEAR:
            case self::PRICE_EXPIRE_TYPE_DAY:
            case self::PRICE_EXPIRE_TYPE_MONTH:
                $timeFormatter = sprintf("+%d %s", $value, $type);
                $time = strtotime($timeFormatter, $timestamp);
                break;
            default:
                $time = null;
                break;
        }

        return $time;
    }

    /**
     * users
     *
     * @return Collection
     */
    public function users(): Collection
    {
        return $this->hasMany("App\Models\User")->get();
    }

    /**
     * check show
     *
     * @return bool
     */
    public function isShowOn(): bool
    {
        return $this->getAttribute(self::FIELD_SHOW) == self::SHOW_ON;
    }

    /**
     * check allow ID
     *
     * @param int $userPlanId
     * @return bool
     */
    public function isAllowID(int $userPlanId): bool
    {
        if ($userPlanId === $this->getKey()) {
            return true;
        }
        $allowIds = $this->getAttribute(self::FIELD_ALLOW_IDS);
        if (empty($allowIds)) {
            return true;
        }
        return in_array($userPlanId, (array)$allowIds);
    }


    /**
     * check user transfer enabled
     *
     * return bool
     */
    public function isTransferEnabled(): bool
    {
        return (bool)$this->getAttribute(self::FIELD_TRANSFER_ENABLE) > 0;
    }


    /**
     * check renew
     *
     * @return bool
     */
    public function isRenewOn(): bool
    {
        return $this->getAttribute(self::FIELD_RENEW) == self::RENEW_ON;
    }

    /**
     * count users
     *
     * @return int
     */
    public function countUsers(): int
    {
        return User::wherePlanId($this->getKey())->count();
    }


    /**
     * count not expired users
     *
     * @return int
     */
    public function countNotExpiredUsers(): int
    {
        return User::wherePlanId($this->getKey())->where((function ($query) {
            $query->where(User::FIELD_EXPIRED_AT, '>', time())
                ->orWhere(User::FIELD_EXPIRED_AT, null);
        }))->count();
    }

    /**
     * count servers
     *
     * @return int
     */
    public function countServers(): int
    {
        $serverCount = ServerVmess::whereJsonContains(ServerVmess::FIELD_PLAN_ID, $this->getKey())->count();
        $serverTrojanCount = ServerTrojan::whereJsonContains(ServerVmess::FIELD_PLAN_ID, $this->getKey())->count();
        $serverShadowsocksCount = ServerShadowsocks::whereJsonContains(ServerVmess::FIELD_PLAN_ID, $this->getKey())->count();
        return $serverCount + $serverTrojanCount + $serverShadowsocksCount;
    }

}