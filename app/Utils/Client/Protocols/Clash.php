<?php

namespace App\Utils\Client\Protocols;

use App\Models\ServerShadowsocks;
use App\Models\ServerTrojan;
use App\Models\ServerVmess;
use App\Utils\Client\Protocol;
use File;
use Symfony\Component\Yaml\Yaml;

class Clash extends Protocol
{
    public $flag = 'clash';

    public function handle()
    {
        $servers = $this->servers;
        $user = $this->user;
        $reqFlags = $this->requestFlag;

        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? null;
        if ($userAgent && preg_match('/win/i', $userAgent)) {
            $appName = urlencode(config('v2board.app_name', 'V2Board'));
        } else {
            $appName = config('v2board.app_name', 'V2Board');
        }

        header("subscription-userinfo: upload={$user['u']}; download={$user['d']}; total={$user['transfer_enable_value']}; expire={$user['expired_at']}");
        header('profile-update-interval: 24');
        header("content-disposition:attachment; filename={$appName}");

        if (strpos($reqFlags, 'pro') !== false) {
            $defaultConfig = resource_path() . '/rules/default.clash.pro.yaml';
            $customConfig = resource_path() . '/rules/custom.clash.pro.yaml';
        } else {
            $defaultConfig = base_path() . '/resources/rules/default.clash.yaml';
            $customConfig = base_path() . '/resources/rules/custom.clash.yaml';
        }

        if (File::exists($customConfig)) {
            $config = Yaml::parseFile($customConfig);
        } else {
            $config = Yaml::parseFile($defaultConfig);
        }
        $proxy = [];
        $proxies = [];

        foreach ($servers as $item) {
            if ($item['type'] === 'shadowsocks') {
                array_push($proxy, self::buildShadowsocks($user['uuid'], $item));
                array_push($proxies, $item['name']);
            }
            if ($item['type'] === 'vmess') {
                array_push($proxy, self::buildVmess($user['uuid'], $item));
                array_push($proxies, $item['name']);
            }
            if ($item['type'] === 'trojan') {
                array_push($proxy, self::buildTrojan($user['uuid'], $item));
                array_push($proxies, $item['name']);
            }
        }

        $config['proxies'] = array_merge($config['proxies'] ?: [], $proxy);

        foreach ($config['proxy-groups'] as $k => $v) {
            if (!is_array($config['proxy-groups'][$k]['proxies'])) {
                continue;
            }
            $config['proxy-groups'][$k]['proxies'] = array_merge($config['proxy-groups'][$k]['proxies'], $proxies);
        }

        $serverAllTags = array_unique(array_merge(ServerVmess::allTags(), ServerShadowsocks::allTags(), ServerTrojan::allTags()));
        foreach ($serverAllTags as $tag) {
            $proxies = [];
            foreach ($servers as $item) {
                if ($item['tags'] === null) {
                    continue;
                }
                if (in_array($tag, $item['tags'])) {
                    array_push($proxies, $item['name']);
                }
            }
            if ($proxies) {
                array_push($config['proxy-groups'], ['name' => $tag, 'type' => 'select', 'proxies' => $proxies]);
            }
        }

        // Force the current subscription domain to be a direct rule
        //$subsDomain = $_SERVER['SERVER_NAME'];
        //$subsDomainRule = "DOMAIN,{$subsDomain},DIRECT";
        //array_unshift($config['rules'], $subsDomainRule);
        $yaml = Yaml::dump($config);
        return str_replace('$app_name', config('v2board.app_name', 'V2Board'), $yaml);
    }

    public static function buildShadowsocks($password, $server): array
    {
        $array = [];
        $array['name'] = $server['name'];
        $array['type'] = 'ss';
        $array['server'] = $server['host'];
        $array['port'] = $server['port'];
        $array['cipher'] = $server['cipher'];
        $array['password'] = $password;
        $array['udp'] = true;
        return $array;
    }

    public static function buildVmess($uuid, $server): array
    {
        $array = [];
        $array['name'] = $server['name'];
        $array['type'] = 'vmess';
        $array['server'] = $server['host'];
        $array['port'] = $server['port'];
        $array['uuid'] = $uuid;
        $array['alterId'] = $server['alter_id'];
        $array['cipher'] = 'auto';
        $array['udp'] = true;

        if ($server['tls']) {
            $array['tls'] = true;
            if (isset($server['tls_settings'])) {
                $tlsSettings = $server['tls_settings'];
                if (isset($tlsSettings['allowInsecure'])) {
                    $array['skip-cert-verify'] = (bool)$tlsSettings['allowInsecure'];
                }
                if (isset($tlsSettings['serverName']) && !empty($tlsSettings['serverName'])) {
                    $array['servername'] = $tlsSettings['serverName'];
                }
            }
        }
        if ($server['network'] === 'ws') {
            $array['network'] = 'ws';
            if (isset($server['network_settings'])) {
                $wsSettings = $server['network_settings'];
                $array['ws-opts'] = [];
                if (!empty($wsSettings['path'])) {
                    $array['ws-opts']['path'] = $wsSettings['path'];
                }
                if (!empty($wsSettings['headers']['Host'])) {
                    $array['ws-opts']['headers'] = ['Host' => $wsSettings['headers']['Host']];
                }
            }
        }
        if ($server['network'] === 'grpc') {
            $array['network'] = 'grpc';
            if (isset($server['network_settings'])) {
                $grpcObject = $server['network_settings'];
                $array['grpc-opts'] = [];
                if (isset($grpcObject['serviceName'])) {
                    $array['grpc-opts']['grpc-service-name'] = $grpcObject['serviceName'];
                }
            }
        }

        return $array;
    }

    public static function buildTrojan($password, $server): array
    {
        $array = [];
        $array['name'] = $server['name'];
        $array['type'] = 'trojan';
        $array['server'] = $server['host'];
        $array['port'] = $server['port'];
        $array['password'] = $password;
        $array['udp'] = true;
        if (!empty($server['server_name'])) {
            $array['sni'] = $server['server_name'];
        }
        if (!empty($server['allow_insecure'])) {
            $array['skip-cert-verify'] = (bool)$server['allow_insecure'];
        }

        if ($server['network'] === 'grpc') {
            $array['network'] = $server['network'];
            if (isset($server['network_settings']['serviceName'])) {
                $array['grpc-opts'] = [];
                $array['grpc-opts']['grpc-service-name'] = $server['network_settings']['serviceName'];
            }
        }

        if ($server['network'] === 'ws') {
            $array['network'] = $server['network'];
            if (isset($server['network_settings']['path'])) {
                $array['ws-opts'] = [];
                $array['ws-opts'][] = $server['network_settings']['path'];
                if (isset($server['network_settings']['headers']) && is_array($server['network_settings']['headers'])) {
                    $array['ws-opts']['headers'] = $server['network_settings']['headers'];
                }
            }
        }
        return $array;
    }
}