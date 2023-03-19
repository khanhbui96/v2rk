<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Jobs\TrafficFetchJob;
use App\Jobs\TrafficServerLogJob;
use App\Jobs\TrafficUserLogJob;
use App\Models\ServerTrojan;
use App\Models\ServerVmess;
use App\Models\User;
use App\Utils\CacheKey;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;


class TrojanController extends Controller
{
    /**
     * user
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function users(Request $request)
    {
        $reqNodeId = $request->input('node_id');
        $clientIP = $request->getClientIp();
        if ($reqNodeId <= 0) {
            abort(500, 'parameter error');
        }

        $server = ServerTrojan::find($reqNodeId);
        /**
         * @var ServerTrojan $server
         */
        if ($server === null) {
            abort(500, 'server not found');
        }

        $result = [];
        $users = $server->findAvailableUsers();
        foreach ($users as $user) {
            /**
             * @var User $user
             */
            array_push($result, [User::FIELD_ID => $user->getKey(), User::FIELD_UUID => $user->getAttribute(User::FIELD_UUID)]);
        }

        Redis::hset(CacheKey::get(CacheKey::SERVER_TROJAN_LAST_CHECK_AT, $server->getKey()), $clientIP, time());
        Redis::hset(CacheKey::SERVER_TROJAN_LAST_CHECK_AT, $server->getKey(), time());
        return response([
            'data' => $result,
        ]);
    }

    // 后端提交数据
    public function submit(Request $request)
    {
        $reqNodeId = (int)$request->input('node_id');
        $clientIP = $request->getClientIp();

        if ($reqNodeId <= 0) {
            abort(500, 'parameter error');
        }

        $server = ServerTrojan::find($reqNodeId);

        /**
         * @var ServerTrojan $server
         */
        if ($server === null) {
            abort(500, 'server not found');
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
            $rate = $server->getAttribute(ServerTrojan::FIELD_RATE);
            $u = $item[User::FIELD_U] * $rate;
            $d = $item[User::FIELD_D] * $rate;
            $n = $item['n'] ?? 0;
            $userId = $item['user_id'];
            array_push($userIds, $userId);
            if ($n) {
                $userRequests[$userId] = $n;
            }
            TrafficFetchJob::dispatch($u, $d, $userId);
            TrafficServerLogJob::dispatch($item[User::FIELD_U], $item[User::FIELD_D], $n, $server->getKey(), ServerTrojan::TYPE);
            TrafficUserLogJob::dispatch($u, $d, $n, $userId);
        }

        Redis::hset(CacheKey::get(CacheKey::SERVER_TROJAN_LAST_PUSH_AT, $server->getKey()), $clientIP, time());
        Redis::hset(CacheKey::SERVER_TROJAN_LAST_PUSH_AT, $server->getKey(), time());
        Redis::hset(CacheKey::get(CacheKey::SERVER_TROJAN_ONLINE_USER, $server->getKey()),
            $clientIP, json_encode(['time' => time(), 'count' => count($data), 'user_ids' => $userIds, 'user_requests' => $userRequests]));

        return response([
            'data' => true
        ]);
    }


    /**
     * config
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function config(Request $request)
    {
        $reqNodeId = (int)$request->input('node_id');
        if ($reqNodeId <= 0) {
            abort(500, 'parameter error');
        }

        /**
         * @var ServerTrojan $server
         */
        $server = ServerTrojan::find($reqNodeId);
        if ($server === null) {
            abort(500, 'server not found');
        }

        $data = $server->makeHidden([
            ServerTrojan::FIELD_PLAN_ID, ServerTrojan::FIELD_PARENT_ID, ServerTrojan::FIELD_SHOW,
            ServerTrojan::FIELD_NAME, ServerTrojan::FIELD_RATE, ServerTrojan::FIELD_SORT,
            ServerTrojan::FIELD_CREATED_AT, ServerTrojan::FIELD_UPDATED_AT, ServerTrojan::FIELD_TAGS,
            ServerTrojan::FIELD_PORT, ServerTrojan::FIELD_HOST, ServerTrojan::FIELD_CHECK, ServerTrojan::FIELD_IPS,
            ServerTrojan::FIELD_NETWORK_SETTINGS, ServerTrojan::FIELD_AREA_ID
        ]);

        $network = $server->getAttribute(ServerVmess::FIELD_NETWORK);
        if ($network) {
            $networkAttribute = sprintf("%s_settings", $server->getAttribute(ServerVmess::FIELD_NETWORK));
            $server->setAttribute($networkAttribute, $server->getAttribute(ServerVmess::FIELD_NETWORK_SETTINGS));
        }

        return response([
            'data' => $data,
        ]);
    }
}