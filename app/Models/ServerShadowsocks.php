<?php

namespace App\Models;

use App\Models\Traits\Serialize;
use App\Utils\CacheKey;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;


/**
 * App\Models\ServerShadowsocks
 *
 * @property int $id
 * @property array $plan_id
 * @property int|null $parent_id
 * @property int $area_id
 * @property array|null $tags
 * @property array|null $ips
 * @property string $name
 * @property string $rate
 * @property string $host
 * @property int $port
 * @property int $server_port
 * @property string $cipher
 * @property int $show
 * @property int $check
 * @property int|null $sort
 * @property int $created_at
 * @property int $updated_at
 * @method static Builder|ServerShadowsocks newModelQuery()
 * @method static Builder|ServerShadowsocks newQuery()
 * @method static Builder|ServerShadowsocks query()
 * @method static Builder|ServerShadowsocks whereAreaId($value)
 * @method static Builder|ServerShadowsocks whereCheck($value)
 * @method static Builder|ServerShadowsocks whereCipher($value)
 * @method static Builder|ServerShadowsocks whereCreatedAt($value)
 * @method static Builder|ServerShadowsocks whereHost($value)
 * @method static Builder|ServerShadowsocks whereId($value)
 * @method static Builder|ServerShadowsocks whereIps($value)
 * @method static Builder|ServerShadowsocks whereName($value)
 * @method static Builder|ServerShadowsocks whereParentId($value)
 * @method static Builder|ServerShadowsocks wherePlanId($value)
 * @method static Builder|ServerShadowsocks wherePort($value)
 * @method static Builder|ServerShadowsocks whereRate($value)
 * @method static Builder|ServerShadowsocks whereServerPort($value)
 * @method static Builder|ServerShadowsocks whereShow($value)
 * @method static Builder|ServerShadowsocks whereSort($value)
 * @method static Builder|ServerShadowsocks whereTags($value)
 * @method static Builder|ServerShadowsocks whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ServerShadowsocks extends BaseServer
{
    use Serialize;

    const FIELD_CIPHER = "cipher"; //密文
    const TYPE = "shadowsocks";
    protected $table = 'server_shadowsocks';
    protected $dateFormat = 'U';


    protected $casts = [
        self::FIELD_CREATED_AT => 'timestamp',
        self::FIELD_UPDATED_AT => 'timestamp',
        self::FIELD_PLAN_ID => 'array',
        self::FIELD_TAGS => 'array',
        self::FIELD_IPS => 'array'
    ];


    /**
     * nodes
     *
     * @return Collection
     */
    public static function nodes(): Collection
    {
        return parent::baseNodes(self::TYPE, CacheKey::SERVER_SHADOWSOCKS_ONLINE_USER,
            CacheKey::SERVER_SHADOWSOCKS_LAST_CHECK_AT, CacheKey::SERVER_SHADOWSOCKS_LAST_PUSH_AT);
    }


    /**
     * fault nodes
     *
     * @return array
     */
    public static function faultNodeNames(): array
    {
        return parent::baseFaultNodeNames(CacheKey::SERVER_SHADOWSOCKS_LAST_CHECK_AT, CacheKey::SERVER_SHADOWSOCKS_LAST_PUSH_AT);
    }

    /**
     * configs
     *
     * @param User $user
     * @param bool $show
     * @param bool $needExtra
     * @return Collection
     */
    public static function configs(User $user, bool $show = true, bool $needExtra = false): Collection
    {
        return parent::baseConfigs($user, self::TYPE, CacheKey::SERVER_SHADOWSOCKS_LAST_CHECK_AT, $show, $needExtra);
    }


}