<?php

namespace App\Utils\Client\Protocols;

use App\Utils\Client\Protocol;

class Shadowrocket extends Protocol
{
    public $flag = 'shadowrocket';

    public function handle()
    {
        $servers = $this->servers;
        $user = $this->user;

        $uri = '';
        //display remaining traffic and expire date
        $upload = round($user['u'] / (1024 * 1024 * 1024), 2);
        $download = round($user['d'] / (1024 * 1024 * 1024), 2);
        $totalTraffic = round($user['transfer_enable_value'] / (1024 * 1024 * 1024), 2);
        if ($user['expired_at'] === null) {
            $uri .= "STATUS=🚀↑:{$upload}GB,↓:{$download}GB,Tổng:{$totalTraffic}GB\r\n";
        } else {
            $expiredDate = date('d-m-Y', $user['expired_at']);
            $uri .= "STATUS=🚀↑:{$upload}GB,↓:{$download}GB,Tổng:{$totalTraffic}GB💡HSD:$expiredDate\r\n";
        }

        foreach ($servers as $item) {
            if ($item['type'] === 'shadowsocks') {
                $uri .= self::buildShadowsocks($user['uuid'], $item);
            }
            if ($item['type'] === 'vmess') {
                $uri .= self::buildVmess($user['uuid'], $item);
            }
            if ($item['type'] === 'trojan') {
                $uri .= self::buildTrojan($user['uuid'], $item);
            }
            if ($item['type'] === 'hysteria') {
                $uri .= self::buildHysteria($user['uuid'], $item);
            }
        }
        return base64_encode($uri);
    }


    public static function buildShadowsocks($password, $server): string
    {
        $name = rawurlencode($server['name']);
        $str = str_replace(
            ['+', '/', '='],
            ['-', '_', ''],
            base64_encode("{$server['method']}:$password")
        );
        $config = [];
        $config['udp'] = 1;
        $query = http_build_query($config);
        return "ss://$str@{$server['host']}:{$server['port']}?$query#$name\r\n";
    }

    public static function buildVmess($uuid, $server): string
    {
        $userinfo = base64_encode('auto:' . $uuid . '@' . $server['host'] . ':' . $server['port']);
        $config = [
            'tfo' => 1,
            'udp' => 1,
            'remark' => $server['name'],
            'alterId' => $server['alter_id']
        ];
        if ($server['tls']) {
            $config['tls'] = 1;
            if (isset($server['tls_settings'])) {
                $tlsSettings = $server['tls_settings'];
                if (isset($tlsSettings['allowInsecure'])) {
                    $config['allowInsecure'] = (int)$tlsSettings['allowInsecure'];
                }
                if (isset($tlsSettings['serverName']) && !empty($tlsSettings['serverName'])) {
                    $config['peer'] = $tlsSettings['serverName'];
                }
            }
        }
        if ($server['network'] === 'ws') {
            $config['obfs'] = "websocket";
            if (isset($server['network_settings'])) {
                $wsSettings = $server['network_settings'];
                if (isset($wsSettings['path']) && !empty($wsSettings['path'])) {
                    $config['path'] = $wsSettings['path'];
                }
                if (isset($wsSettings['headers']['Host']) && !empty($wsSettings['headers']['Host'])) {
                    $config['obfsParam'] = $wsSettings['headers']['Host'];
                }
            }
        }
        if ($server['network'] === 'grpc') {
            $config['obfs'] = "grpc";
            if (isset($server['network_settings'])) {
                $grpcSettings = $server['network_settings'];
                if (isset($grpcSettings['serviceName'])) {
                    $config['path'] = $grpcSettings['serviceName'];
                }
            }
            if (isset($tlsSettings['serverName']) && !empty($tlsSettings['serverName'])) {
                $config['host'] = $tlsSettings['serverName'];
            } else {
                $config['host'] = $server['host'];
            }
        }
        $query = http_build_query($config, '', '&', PHP_QUERY_RFC3986);
        $uri = "vmess://$userinfo?$query";
        $uri .= "\r\n";
        return $uri;
    }

    public static function buildTrojan($uuid, $server): string
    {
        $name = rawurlencode($server['name']);
        $data = [
            'allowInsecure' => $server['allow_insecure'],
            'peer' => $server['server_name'],
            'udp' =>  $server['udp_over_tcp']
        ];

        if ($server['network'] === 'grpc') {
            if (isset($server['network_settings']['serviceName'])) {
                $data['obfs'] = 'grpc';
                $data['path'] = $server['network_settings']['serviceName'];
            }
        }

        if ($server['network'] === 'ws') {
            if (isset($server['network_settings']['path'])) {
                $data['obfs'] = 'websocket';
                $data['plugin'] = "obfs-local";
                $data['obfs-uri'] = $server['network_settings']['path'];
                $data['path'] = $server['network_settings']['path'];
            }

            if (isset($server['network_settings']['headers']['Host'])) {
                $data['obfsParam'] = $server['network_settings']['headers']['Host'];
            }
        }

        $query = http_build_query($data);
        $uri = "trojan://$uuid@{$server['host']}:{$server['port']}?$query&tfo=1#$name";
        $uri .= "\r\n";
        return $uri;
    }


    public static function buildHysteria($uuid, $server): string
    {
        $name = rawurlencode($server['name']);
        $data = [
            'allowInsecure' => $server['allow_insecure'],
            'peer' => $server['server_name'],
        ];

        $data['alpn'] = 'h3';
        $data['auth'] = $uuid;
        $data['upmbps']  =   $server['up_mbps'];
        $data['downmbps']  =   $server['down_mbps'];
        $data['proto']  = $server['protocol'];
        $data['udp'] = 1;
        if ($server['obfs'])  {
            $data['obfs']  = 'xplus';
            $data['obfsParam']  = $server['obfs'];
        } else {
            $data['obfs']  = 'none';
        }

        $query = http_build_query($data);
        $uri = "hysteria://{$server['host']}:{$server['port']}?$query#$name";
        $uri .= "\r\n";
        return $uri;
    }
}