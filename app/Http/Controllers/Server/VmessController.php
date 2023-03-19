<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Jobs\TrafficFetchJob;
use App\Jobs\TrafficServerLogJob;
use App\Jobs\TrafficUserLogJob;
use App\Models\ServerVmess;
use App\Models\User;
use App\Utils\CacheKey;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;


class VmessController extends Controller
{
    /**
     * 后端获取用户User
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function users(Request $request)
    {
        $reqNodeId = $request->input('node_id');
        $clientIP = $request->getClientIp();

        /**
         * @var ServerVmess $server
         */
        $server = ServerVmess::find($reqNodeId);
        if ($server === null) {
            return response([
                'data' => 'server is not found',
            ]);
        }

        $result = [];
        $users = $server->findAvailableUsers();
        foreach ($users as $user) {
            /**
             * @var User $user
             */
            array_push($result, [User::FIELD_ID => $user->getKey(), User::FIELD_UUID => $user->getAttribute(User::FIELD_UUID)]);
        }
        Redis::hset(CacheKey::get(CacheKey::SERVER_VMESS_LAST_CHECK_AT, $server->getKey()), $clientIP, time());
        Redis::hset(CacheKey::SERVER_VMESS_LAST_CHECK_AT, $server->getKey(), time());

        return response([
            'data' => $result,
        ]);
    }

    /**
     * submit
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function submit(Request $request)
    {
        $reqNodeId = $request->input('node_id');
        $clientIP = $request->getClientIp();

        /**
         * @var ServerVmess $server
         */
        $server = ServerVmess::find($reqNodeId);
        if ($server === null) {
            abort(500, "server not found");
        }
        $data = file_get_contents('php://input');
        $data = json_decode($data, true);
        if ($data === null) {
            abort(500, 'parse_error');
        }

        if (empty($data) || !is_array($data)) {
            abort(500, 'invalid data');
        }

        $userIds = [];
        $userRequests = [];
        foreach ($data as $item) {
            $rate = $server->getAttribute(ServerVmess::FIELD_RATE);
            $u = $item[User::FIELD_U] * $rate;
            $d = $item[User::FIELD_D] * $rate;
            $n = $item['n'] ?? 0;
            $userId = $item['user_id'];
            array_push($userIds, $userId);
            if ($n) {
                $userRequests[$userId] = $n;
            }
            TrafficFetchJob::dispatch($u, $d, $userId);
            TrafficServerLogJob::dispatch($item[User::FIELD_U], $item[User::FIELD_D], $n, $server->getKey(), ServerVmess::TYPE);
            TrafficUserLogJob::dispatch($u, $d, $n, $userId);
        }

        Redis::hset(CacheKey::get(CacheKey::SERVER_VMESS_LAST_PUSH_AT, $server->getKey()), $clientIP, time());
        Redis::hset(CacheKey::SERVER_VMESS_LAST_PUSH_AT, $server->getKey(), time());
        Redis::hset(CacheKey::get(CacheKey::SERVER_VMESS_ONLINE_USER, $server->getKey()), $clientIP,
            json_encode(['time' => time(), 'count' => count($data), 'user_ids' => $userIds, 'user_requests' => $userRequests]));

        return response([
            'data' => 'ok'
        ]);
    }

    /**
     * config
     *
     * @param Request $request
     */
    public function config(Request $request)
    {
        $reqNodeId = (int)$request->input('node_id');

        if ($reqNodeId <= 0) {
            abort(500, 'parameter error');
        }
        /**
         * @var ServerVmess $server
         */
        $server = ServerVmess::find($reqNodeId);
        if ($server === null) {
            abort(500, 'server is not found');
        }

        $data = $server->makeHidden([
            ServerVmess::FIELD_SORT, ServerVmess::FIELD_PLAN_ID, ServerVmess::FIELD_HOST, ServerVmess::FIELD_PORT,
            ServerVmess::FIELD_RATE, ServerVmess::FIELD_SHOW, ServerVmess::FIELD_CREATED_AT, ServerVmess::FIELD_UPDATED_AT,
            ServerVmess::FIELD_TAGS, ServerVmess::FIELD_NAME, ServerVmess::FIELD_PARENT_ID, ServerVmess::FIELD_NETWORK_SETTINGS,
            ServerVmess::FIELD_RULE_SETTINGS, ServerVmess::FIELD_CHECK, ServerVmess::FIELD_IPS, ServerVmess::FIELD_AREA_ID
        ]);

        $networkAttribute = sprintf("%s_settings", $server->getAttribute(ServerVmess::FIELD_NETWORK));
        $server->setAttribute($networkAttribute, $server->getAttribute(ServerVmess::FIELD_NETWORK_SETTINGS));

        $ruleSettings = $server->getAttribute(ServerVmess::FIELD_RULE_SETTINGS);
        if ($ruleSettings) {
            $rules = [];
            $ruleDomains = $ruleSettings['domain'] ?? [];
            $ruleProtocols = $ruleSettings['protocol'] ?? [];

            foreach ($ruleDomains as $domain) {
                if (strlen($domain) > 0) {
                    $rule = [];
                    $rule['type'] = "field";
                    $rule['outboundTag'] = "block";
                    $rule['domain'] = [$domain];
                    array_push($rules, $rule);
                }
            }

            foreach ($ruleProtocols as $protocol) {
                if (strlen($protocol) > 0) {
                    $rule = [];
                    $rule['type'] = "field";
                    $rule['outboundTag'] = "block";
                    $rule['protocol'] = [$protocol];
                    array_push($rules, $rule);
                }
            }

            $server->setAttribute("router_settings", [
                "rules" => $rules
            ]);
        }

        $dnsSettings = $server->getAttribute(ServerVmess::FIELD_DNS_SETTINGS);
        if ($dnsSettings) {
            $server->setAttribute(ServerVmess::FIELD_DNS_SETTINGS, [
                "servers" => $dnsSettings
            ]);
        }
        return response([
            'data' => $data,
        ]);
    }
}