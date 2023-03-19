<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Jobs\ServerLogJob;
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

/*
 * Tidal Lab Shadowsocks
 * Github: https://github.com/tokumeikoi/tidalab-ss
 */

class ShadowsocksTidalabController extends Controller
{
    /**
     * User
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function user(Request $request)
    {
        $reqNodeId = $request->input('node_id');
        $clientIP = $request->getClientIp();
        /**
         * @var ServerShadowsocks $server
         */
        $server = ServerShadowsocks::find($reqNodeId);
        if ($server === null) {
            abort(500, 'fail');
        }

        $result = [];
        $users = $server->findAvailableUsers();
        foreach ($users as $user) {
            /**
             * @var User $user
             */
            array_push($result, [
                'id' => $user->getKey(),
                'port' => $server->getAttribute(ServerShadowsocks::FIELD_SERVER_PORT),
                'cipher' => $server->getAttribute(ServerShadowsocks::FIELD_CIPHER),
                'secret' => $user->getAttribute(User::FIELD_UUID)
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
        $server = ServerShadowsocks::find($reqNodeId);
        $clientIP = $request->getClientIp();

        if ($server === null) {
            return response([
                'ret' => 0,
                'msg' => 'server is not found'
            ]);
        }
        $data = file_get_contents('php://input');

        $data = json_decode($data, true);
        if ($data === null || !is_array($data)) {
            return response([
                'ret' => 0,
                'msg' => 'parameter error'
            ]);
        }

        $userIds = [];
        foreach ($data as $item) {
            $rate = $server->getAttribute(ServerVmess::FIELD_RATE);
            $u = $item[User::FIELD_U] * $rate;
            $d = $item[User::FIELD_D] * $rate;
            $userId = $item['user_id'];
            array_push($userIds, $userId);
            TrafficFetchJob::dispatch($u, $d, $userId);
            TrafficServerLogJob::dispatch($item[User::FIELD_U], $item[User::FIELD_D], 0, $server->getKey(), ServerShadowsocks::TYPE);
            TrafficUserLogJob::dispatch($u, $d, 0, $userId);
        }

        Redis::hset(CacheKey::get(CacheKey::SERVER_SHADOWSOCKS_LAST_PUSH_AT, $server->getKey()), $clientIP, time());
        Redis::hset(CacheKey::SERVER_SHADOWSOCKS_LAST_PUSH_AT, $server->getKey(), time());
        Redis::hset(CacheKey::get(CacheKey::SERVER_SHADOWSOCKS_ONLINE_USER, $server->getKey()),
            $clientIP, json_encode(['time' => time(), 'count' => count($data), 'user_ids' => $userIds]));

        return response([
            'ret' => 1,
            'msg' => 'ok'
        ]);
    }
}