<?php

namespace App\Models;

use App\Models\Traits\Serialize;
use App\Utils\CacheKey;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;


/**
 * App\Models\ServerTrojan
 *
 * @property int $id 节点ID
 * @property array $plan_id
 * @property int|null $parent_id 父节点
 * @property int $area_id
 * @property array|null $tags 节点标签
 * @property array|null $ips
 * @property string $name 节点名称
 * @property string $rate 倍率
 * @property string $host 主机名
 * @property int $port 连接端口
 * @property int $server_port 服务端口
 * @property int $allow_insecure 是否允许不安全
 * @property string|null $server_name
 * @property string|null $network
 * @property array|null $network_settings
 * @property int $show 是否显示
 * @property int $check
 * @property int|null $sort
 * @property int $created_at
 * @property int $updated_at
 * @method static Builder|ServerTrojan newModelQuery()
 * @method static Builder|ServerTrojan newQuery()
 * @method static Builder|ServerTrojan query()
 * @method static Builder|ServerTrojan whereAllowInsecure($value)
 * @method static Builder|ServerTrojan whereAreaId($value)
 * @method static Builder|ServerTrojan whereCheck($value)
 * @method static Builder|ServerTrojan whereCreatedAt($value)
 * @method static Builder|ServerTrojan whereHost($value)
 * @method static Builder|ServerTrojan whereId($value)
 * @method static Builder|ServerTrojan whereIps($value)
 * @method static Builder|ServerTrojan whereName($value)
 * @method static Builder|ServerTrojan whereNetwork($value)
 * @method static Builder|ServerTrojan whereNetworkSettings($value)
 * @method static Builder|ServerTrojan whereParentId($value)
 * @method static Builder|ServerTrojan wherePlanId($value)
 * @method static Builder|ServerTrojan wherePort($value)
 * @method static Builder|ServerTrojan whereRate($value)
 * @method static Builder|ServerTrojan whereServerName($value)
 * @method static Builder|ServerTrojan whereServerPort($value)
 * @method static Builder|ServerTrojan whereShow($value)
 * @method static Builder|ServerTrojan whereSort($value)
 * @method static Builder|ServerTrojan whereTags($value)
 * @method static Builder|ServerTrojan whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ServerTrojan extends BaseServer
{
    use Serialize;

    const FIELD_ALLOW_INSECURE = "allow_insecure";
    const FIELD_SERVER_NAME = "server_name";
    const FIELD_NETWORK = "network";
    const FIELD_NETWORK_SETTINGS = "network_settings";

    const TYPE = "trojan";

    protected $table = 'server_trojan';
    protected $dateFormat = 'U';


    protected $casts = [
        self::FIELD_CREATED_AT => 'timestamp',
        self::FIELD_UPDATED_AT => 'timestamp',
        self::FIELD_NETWORK_SETTINGS => 'array',
        self::FIELD_PLAN_ID => 'array',
        self::FIELD_TAGS => 'array',
        self::FIELD_IPS => 'array'
    ];

    /**
     * config
     *
     * @param int $localPort
     * @return mixed
     */
    public function config(int $localPort)
    {
        $configText = '{"run_type":"server","local_addr":"0.0.0.0","local_port":443,"remote_addr":"www.taobao.com","remote_port":80,"password":[],"ssl":{"cert":"server.crt","key":"server.key","sni":"domain.com"},"api":{"enabled":true,"api_addr":"127.0.0.1","api_port":10000}}';
        $json = json_decode($configText);
        $json->local_port = $this->getAttribute(self::FIELD_SERVER_PORT);
        $json->ssl->sni = $this->getAttribute(self::FIELD_SERVER_NAME) ?: $this->getAttribute(self::FIELD_HOST);
        $json->ssl->cert = "/root/.cert/server.crt";
        $json->ssl->key = "/root/.cert/server.key";
        $json->api->api_port = $localPort;
        return $json;
    }

    /**
     * nodes
     *
     * @return Collection
     */
    public static function nodes(): Collection
    {
        return parent::baseNodes(self::TYPE, CacheKey::SERVER_TROJAN_ONLINE_USER,
            CacheKey::SERVER_TROJAN_LAST_CHECK_AT, CacheKey::SERVER_TROJAN_LAST_PUSH_AT);
    }

    /**
     * fault nodes
     *
     * @return array
     */
    public static function faultNodeNames(): array
    {
        return parent::baseFaultNodeNames(CacheKey::SERVER_TROJAN_LAST_CHECK_AT, CacheKey::SERVER_TROJAN_LAST_PUSH_AT);
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
        return parent::baseConfigs($user, self::TYPE, CacheKey::SERVER_TROJAN_LAST_CHECK_AT, $show, $needExtra);
    }
}