<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Jobs\TrafficFetchJob;
use App\Jobs\TrafficServerLogJob;
use App\Jobs\TrafficUserLogJob;
use App\Models\ServerVmess;
use App\Models\User;
use App\Utils\CacheKey;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;

/*
 * Vmess Aurora
 * Github: https://github.com/tokumeikoi/aurora
 */

class DeepbworkController extends Controller
{
    /**
     * 后端获取用户User
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function user(Request $request)
    {
        $reqNodeId = $request->input('node_id');
        $clientIP = $request->getClientIp();

        /**
         * @var ServerVmess $server
         */
        $server = ServerVmess::find($reqNodeId);
        if ($server === null) {
            return response([
                'msg' => 'false',
                'data' => 'server is not found',
            ]);
        }

        $result = [];
        $users = $server->findAvailableUsers();
        foreach ($users as $user) {
            /**
             * @var User $user
             */
            $user->setAttribute("v2ray_user", [
                "uuid" => $user->getAttribute(User::FIELD_UUID),
                "email" => sprintf("%s@v2board.user", $user->getAttribute(User::FIELD_UUID)),
                "alter_id" => $server->getAttribute(ServerVmess::FIELD_ALTER_ID),
                "level" => 0,
            ]);
            unset($user['uuid']);
            unset($user['email']);
            array_push($result, $user);
        }

        Redis::hset(CacheKey::get(CacheKey::SERVER_VMESS_LAST_CHECK_AT, $server->getKey()), $clientIP, time());
        Redis::hset(CacheKey::SERVER_VMESS_LAST_CHECK_AT, $server->getKey(), time());

        return response([
            'msg' => 'ok',
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
            $rate = $server->getAttribute(ServerVmess::FIELD_RATE);
            $u = $item[User::FIELD_U] * $rate;
            $d = $item[User::FIELD_D] * $rate;
            $userId = $item['user_id'];
            array_push($userIds, $userId);
            TrafficFetchJob::dispatch($u, $d, $userId);
            TrafficServerLogJob::dispatch($item[User::FIELD_U], $item[User::FIELD_D], 0, $server->getKey(), ServerVmess::TYPE);
            TrafficUserLogJob::dispatch($u, $d, 0, $userId);
        }

        Redis::hset(CacheKey::get(CacheKey::SERVER_VMESS_LAST_PUSH_AT, $server->getKey()), $clientIP, time());
        Redis::hset(CacheKey::SERVER_VMESS_LAST_PUSH_AT, $server->getKey(), time());
        Redis::hset(CacheKey::get(CacheKey::SERVER_VMESS_ONLINE_USER, $server->getKey()), $clientIP,
            json_encode(['time' => time(), 'count' => count($data), 'user_ids' => $userIds]));

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
         * @var ServerVmess $server
         */
        $server = ServerVmess::find($reqNodeId);
        if ($server === null) {
            abort(500, 'server is not found');
        }

        try {
            $json = $server->config($reqLocalPort);
            die(json_encode($json, JSON_UNESCAPED_UNICODE));

        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }

    }
}