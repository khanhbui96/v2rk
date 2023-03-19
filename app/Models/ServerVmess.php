<?php

namespace App\Models;

use App\Models\Traits\Serialize;
use App\Utils\CacheKey;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use StdClass;


/**
 * App\Models\ServerVmess
 *
 * @property int $id
 * @property array $plan_id
 * @property string $name
 * @property int|null $parent_id
 * @property int $area_id
 * @property string $host
 * @property int $port
 * @property int $server_port
 * @property array|null $tags
 * @property array|null $ips
 * @property string $rate
 * @property string $network
 * @property int $tls
 * @property int $alter_id
 * @property array|null $network_settings
 * @property array|null $tls_settings
 * @property array|null $rule_settings
 * @property array|null $dns_settings
 * @property int $show
 * @property int $check
 * @property int|null $sort
 * @property int $created_at
 * @property int $updated_at
 * @method static Builder|ServerVmess newModelQuery()
 * @method static Builder|ServerVmess newQuery()
 * @method static Builder|ServerVmess query()
 * @method static Builder|ServerVmess whereAlterId($value)
 * @method static Builder|ServerVmess whereAreaId($value)
 * @method static Builder|ServerVmess whereCheck($value)
 * @method static Builder|ServerVmess whereCreatedAt($value)
 * @method static Builder|ServerVmess whereDnsSettings($value)
 * @method static Builder|ServerVmess whereHost($value)
 * @method static Builder|ServerVmess whereId($value)
 * @method static Builder|ServerVmess whereIps($value)
 * @method static Builder|ServerVmess whereName($value)
 * @method static Builder|ServerVmess whereNetwork($value)
 * @method static Builder|ServerVmess whereNetworkSettings($value)
 * @method static Builder|ServerVmess whereParentId($value)
 * @method static Builder|ServerVmess wherePlanId($value)
 * @method static Builder|ServerVmess wherePort($value)
 * @method static Builder|ServerVmess whereRate($value)
 * @method static Builder|ServerVmess whereRuleSettings($value)
 * @method static Builder|ServerVmess whereServerPort($value)
 * @method static Builder|ServerVmess whereShow($value)
 * @method static Builder|ServerVmess whereSort($value)
 * @method static Builder|ServerVmess whereTags($value)
 * @method static Builder|ServerVmess whereTls($value)
 * @method static Builder|ServerVmess whereTlsSettings($value)
 * @method static Builder|ServerVmess whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ServerVmess extends BaseServer
{
    use Serialize;

    const FIELD_TLS = "tls";
    const FIELD_RATE = "rate";
    const FIELD_NETWORK = "network";
    const FIELD_ALTER_ID = "alter_id"; //变更ID
    const FIELD_SETTINGS = "settings";
    const FIELD_NETWORK_SETTINGS = "network_settings";
    const FIELD_TLS_SETTINGS = "tls_settings";
    const FIELD_RULE_SETTINGS = "rule_settings";
    const FIELD_DNS_SETTINGS = "dns_settings";

    const TYPE = "vmess";
    protected $table = 'server_vmess';
    protected $dateFormat = 'U';


    protected $casts = [
        self::FIELD_CREATED_AT => 'timestamp',
        self::FIELD_UPDATED_AT => 'timestamp',
        self::FIELD_PLAN_ID => 'array',
        self::FIELD_TLS_SETTINGS => 'array',
        self::FIELD_NETWORK_SETTINGS => 'array',
        self::FIELD_DNS_SETTINGS => 'array',
        self::FIELD_RULE_SETTINGS => 'array',
        self::FIELD_TAGS => 'array',
        self::FIELD_IPS => 'array'
    ];

    /**
     * vmess config
     *
     * @param int $localPort
     * @return mixed
     */
    public function config(int $localPort)
    {
        $configText = '{"api":{"services":["HandlerService","StatsService"],"tag":"api"},"dns":{},"stats":{},"inbound":{"port":443,"protocol":"vmess","settings":{"clients":[]},"sniffing":{"enabled":true,"destOverride":["http","tls"]},"streamSettings":{"network":"tcp"},"tag":"proxy"},"inboundDetour":[{"listen":"127.0.0.1","port":23333,"protocol":"dokodemo-door","settings":{"address":"0.0.0.0"},"tag":"api"}],"log":{"loglevel":"debug","access":"access.log","error":"error.log"},"outbound":{"protocol":"freedom","settings":{}},"outboundDetour":[{"protocol":"blackhole","settings":{},"tag":"block"}],"routing":{"rules":[{"inboundTag":"api","outboundTag":"api","type":"field"}]},"policy":{"levels":{"0":{"handshake":4,"connIdle":300,"uplinkOnly":5,"downlinkOnly":30,"statsUserUplink":true,"statsUserDownlink":true}}}}';

        $json = json_decode($configText);
        $json->log->loglevel = 'none';
        $json->inboundDetour[0]->port = $localPort;
        $json->inbound->port = (int)$this->getAttribute(self::FIELD_SERVER_PORT);
        $json->inbound->streamSettings->network = $this->getAttribute(self::FIELD_NETWORK);

        if ($this->getAttribute(self::FIELD_DNS_SETTINGS)) {
            $dns = $this->getAttribute(self::FIELD_DNS_SETTINGS);
            if (isset($dns->servers)) {
                array_push($dns->servers, '1.1.1.1');
                array_push($dns->servers, 'localhost');
            }
            $json->dns = $dns;
            $json->outbound->settings->domainStrategy = 'UseIP';
        }


        if ($this->getAttribute(self::FIELD_NETWORK_SETTINGS)) {
            $networkSettings = $this->getAttribute(self::FIELD_NETWORK_SETTINGS);
            switch ($this->getAttribute(self::FIELD_NETWORK)) {
                case 'tcp':
                    $json->inbound->streamSettings->tcpSettings = $networkSettings;
                    break;
                case 'kcp':
                    $json->inbound->streamSettings->kcpSettings = $networkSettings;
                    break;
                case 'ws':
                    $json->inbound->streamSettings->wsSettings = $networkSettings;
                    break;
                case 'http':
                    $json->inbound->streamSettings->httpSettings = $networkSettings;
                    break;
                case 'domainsocket':
                    $json->inbound->streamSettings->dsSettings = $networkSettings;
                    break;
                case 'quic':
                    $json->inbound->streamSettings->quicSettings = $networkSettings;
                    break;
                case 'grpc':
                    $json->inbound->streamSettings->grpcSettings = $networkSettings;
                    break;
            }
        }

        $domainRules = [];
        $protocolRules = [];

        if ($this->getAttribute(self::FIELD_RULE_SETTINGS)) {
            $ruleSettings = $this->getAttribute(self::FIELD_RULE_SETTINGS);
        }
        // domain
        if (isset($ruleSettings->domain)) {
            $ruleSettings->domain = array_filter($ruleSettings->domain);
            if (!empty($ruleSettings->domain)) {
                $domainRules = array_merge($domainRules, $ruleSettings->domain);
            }
        }
        // protocol
        if (isset($ruleSettings->protocol)) {
            $ruleSettings->protocol = array_filter($ruleSettings->protocol);
            if (!empty($ruleSettings->protocol)) {
                $protocolRules = array_merge($protocolRules, $ruleSettings->protocol);
            }
        }

        if (!empty($domainRules)) {
            $domainObj = new StdClass();
            $domainObj->type = 'field';
            $domainObj->domain = $domainRules;
            $domainObj->outboundTag = 'block';
            array_push($json->routing->rules, $domainObj);
        }

        if (!empty($protocolRules)) {
            $protocolObj = new StdClass();
            $protocolObj->type = 'field';
            $protocolObj->protocol = $protocolRules;
            $protocolObj->outboundTag = 'block';
            array_push($json->routing->rules, $protocolObj);
        }
        if (empty($domainRules) && empty($protocolRules)) {
            $json->inbound->sniffing->enabled = false;
        }


        if ((int)$this->getAttribute(self::FIELD_TLS)) {
            $tlsSettings = $this->getAttribute(self::FIELD_TLS_SETTINGS);
            $json->inbound->streamSettings->security = 'tls';
            $tls = (object)[
                'certificateFile' => '/root/.cert/server.crt',
                'keyFile' => '/root/.cert/server.key'
            ];
            $json->inbound->streamSettings->tlsSettings = new StdClass();
            if (isset($tlsSettings->serverName)) {
                $json->inbound->streamSettings->tlsSettings->serverName = (string)$tlsSettings->serverName;
            }
            if (isset($tlsSettings->allowInsecure)) {
                $json->inbound->streamSettings->tlsSettings->allowInsecure = (bool)((int)$tlsSettings->allowInsecure);
            }
            $json->inbound->streamSettings->tlsSettings->certificates[0] = $tls;
        }
        return $json;
    }

    /**
     * nodes
     *
     * @return Collection
     */
    public static function nodes(): Collection
    {
        return parent::baseNodes(self::TYPE, CacheKey::SERVER_VMESS_ONLINE_USER,
            CacheKey::SERVER_VMESS_LAST_CHECK_AT, CacheKey::SERVER_VMESS_LAST_PUSH_AT);
    }


    /**
     * fault nodes
     *
     * @return array
     */
    public static function faultNodeNames(): array
    {
        return parent::baseFaultNodeNames(CacheKey::SERVER_VMESS_LAST_CHECK_AT, CacheKey::SERVER_VMESS_LAST_PUSH_AT);
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
        return parent::baseConfigs($user, self::TYPE, CacheKey::SERVER_VMESS_LAST_CHECK_AT, $show, $needExtra);
    }

}