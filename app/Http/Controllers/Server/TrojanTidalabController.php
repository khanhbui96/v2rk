<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Jobs\TrafficFetchJob;
use App\Jobs\TrafficServerLogJob;
use App\Jobs\TrafficUserLogJob;
use App\Models\ServerTrojan;
use App\Models\User;
use App\Utils\CacheKey;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;

/*
 * Tidal Lab Trojan
 * Github: https://github.com/tokumeikoi/tidalab-trojan
 */

class TrojanTidalabController extends Controller
{
    /**
     * user
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function user(Request $request)
    {
        $reqNodeId = $request->input('node_id');
        $server = ServerTrojan::find($reqNodeId);
        $clientIP = $request->getClientIp();

        /**
         * @var ServerTrojan $server
         */
        if ($server === null) {
            abort(500, 'fail');
        }

        $result = [];
        $users = $server->findAvailableUsers();
        foreach ($users as $user) {
            /**
             * @var User $user
             */
            $user->setAttribute("trojan_user", [
                "password" => $user->getAttribute(User::FIELD_UUID),
            ]);
            unset($user['uuid']);
            unset($user['email']);
            array_push($result, $user);
        }
        Redis::hset(CacheKey::get(CacheKey::SERVER_TROJAN_LAST_CHECK_AT, $server->getKey()), $clientIP, time());
        Redis::hset(CacheKey::SERVER_TROJAN_LAST_CHECK_AT, $server->getKey(), time());

        return response([
            'msg' => 'ok',
            'data' => $result,
        ]);
    }

    // 后端提交数据
    public function submit(Request $request)
    {
        // Log::info('serverSubmitData:' . $request->input('node_id') . ':' . file_get_contents('php://input'));
        $reqNodeId = $request->input('node_id');
        $server = ServerTrojan::find($reqNodeId);
        $clientIP = $request->getClientIp();

        /**
         * @var ServerTrojan $server
         */
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
                'msg' => 'params error'
            ]);
        }

        $userIds = [];
        foreach ($data as $item) {
            $rate = $server->getAttribute(ServerTrojan::FIELD_RATE);
            $u = $item[User::FIELD_U] * $rate;
            $d = $item[User::FIELD_D] * $rate;
            $userId = $item['user_id'];
            array_push($userIds, $userId);
            TrafficFetchJob::dispatch($u, $d, $userId);
            TrafficServerLogJob::dispatch($item[User::FIELD_U], $item[User::FIELD_D], 0, $server->getKey(), ServerTrojan::TYPE);
            TrafficUserLogJob::dispatch($u, $d, 0, $userId);
        }

        Redis::hset(CacheKey::get(CacheKey::SERVER_TROJAN_LAST_PUSH_AT, $server->getKey()), $clientIP, time());
        Redis::hset(CacheKey::SERVER_TROJAN_LAST_PUSH_AT, $server->getKey(), time());
        Redis::hset(CacheKey::get(CacheKey::SERVER_TROJAN_ONLINE_USER, $server->getKey()),
            $clientIP, json_encode(['time' => time(), 'count' => count($data), 'user_ids' => $userIds]));
        return response([
            'ret' => 1,
            'msg' => 'ok'
        ]);
    }

    /**
     * config
     *
     * @param Request $request
     */
    public function config(Request $request)
    {
        $reqNodeId = $request->input('node_id');
        $reqLocalPort = $request->input('local_port');
        if (empty($reqNodeId) || empty($reqLocalPort)) {
            abort(500, 'parameter error');
        }
        /**
         * @var ServerTrojan $server
         */
        $server = ServerTrojan::find($reqNodeId);
        if ($server === null) {
            abort(500, 'server not found');
        }

        try {
            $json = $server->config($reqLocalPort);
            die(json_encode($json, JSON_UNESCAPED_UNICODE));
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }
}