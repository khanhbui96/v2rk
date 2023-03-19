<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Jobs\TrafficFetchJob;
use App\Jobs\TrafficServerLogJob;
use App\Jobs\TrafficUserLogJob;
use App\Models\ServerShadowsocks;
use App\Models\ServerVmess;
use App\Models\User;
use App\Utils\CacheKey;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;


class ShadowsocksController extends Controller
{
    /**
     * User
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function users(Request $request)
    {
        $reqNodeId = (int)$request->input('node_id');
        $clientIP = $request->getClientIp();

        if ($reqNodeId <= 0) {
            abort(500, 'parameter error');
        }

        /**
         * @var ServerShadowsocks $server
         */
        $server = ServerShadowsocks::find($reqNodeId);
        if ($server === null) {
            abort(500, 'server not found');
        }

        $result = [];
        $users = $server->findAvailableUsers();
        foreach ($users as $user) {
            /**
             * @var User $user
             */
            array_push($result, [
                User::FIELD_ID => $user->getKey(),
                User::FIELD_UUID => $user->getAttribute(User::FIELD_UUID)
            ]);
        }

        Redis::hset(CacheKey::get(CacheKey::SERVER_SHADOWSOCKS_LAST_CHECK_AT, $server->getKey()), $clientIP, time());
        Redis::hset(CacheKey::SERVER_SHADOWSOCKS_LAST_CHECK_AT, $server->getKey(), time());

        return response([
            'data' => $result
        ]);
    }

    /**
     * 后端提交数据
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function submit(Request $request)
    {
        $reqNodeId = $request->input('node_id');
        $clientIP = $request->getClientIp();

        if ($reqNodeId <= 0) {
            abort(500, 'parameter error');
        }

        $server = ServerShadowsocks::find($reqNodeId);
        if ($server === null) {
            abort(500, 'server is not found');
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
            TrafficServerLogJob::dispatch($item[User::FIELD_U], $item[User::FIELD_D], $n, $server->getKey(), ServerShadowsocks::TYPE);
            TrafficUserLogJob::dispatch($u, $d, $n, $userId);
        }

        Redis::hset(CacheKey::get(CacheKey::SERVER_SHADOWSOCKS_LAST_PUSH_AT, $server->getKey()), $clientIP, time());
        Redis::hset(CacheKey::SERVER_SHADOWSOCKS_LAST_PUSH_AT, $server->getKey(), time());
        Redis::hset(CacheKey::get(CacheKey::SERVER_SHADOWSOCKS_ONLINE_USER, $server->getKey()),
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
         * @var ServerShadowsocks $server
         */
        $server = ServerShadowsocks::find($reqNodeId);
        if ($server === null) {
            abort(500, 'server not found');
        }

        $data = $server->makeHidden([
            ServerShadowsocks::FIELD_PLAN_ID, ServerShadowsocks::FIELD_PARENT_ID, ServerShadowsocks::FIELD_NAME,
            ServerShadowsocks::FIELD_TAGS, ServerShadowsocks::FIELD_CREATED_AT, ServerShadowsocks::FIELD_SHOW,
            ServerShadowsocks::FIELD_HOST, ServerShadowsocks::FIELD_PORT, ServerShadowsocks::FIELD_CREATED_AT,
            ServerShadowsocks::FIELD_UPDATED_AT, ServerShadowsocks::FIELD_RATE, ServerShadowsocks::FIELD_SORT,
            ServerShadowsocks::FIELD_IPS, ServerShadowsocks::FIELD_CHECK, ServerShadowsocks::FIELD_AREA_ID
        ]);

        return response([
            'data' => $data,
        ]);
    }
}