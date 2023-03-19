<?php

namespace App\Http\Controllers\Admin\Stat;

use App\Http\Controllers\Controller;
use App\Models\BaseServer;
use App\Models\ServerShadowsocks;
use App\Models\ServerTrojan;
use App\Models\ServerVmess;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TerminalController extends Controller
{

    /**
     * 统计用户节点连接数量
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function connections(Request $request)
    {
        $reqCount = $request->get('count', 10);
        //get shadowSocks servers
        $shadowServers = ServerShadowsocks::nodes();
        $vmessServers = ServerVmess::nodes();
        $trojanServers = ServerTrojan::nodes();

        $servers = collect($shadowServers)->mergeRecursive($vmessServers)->mergeRecursive($trojanServers);
        $statistics = $servers->map(function (BaseServer $server) {
            return $server->getAttribute('ip_online_user_ids');
        })->flatten()->countBy()->sortDesc()->take($reqCount);

        $userIds = $statistics->keys()->all();
        $statsData = [];
        if ($userIds) {
            $users = User::whereIn(User::FIELD_ID, $userIds)->select([User::FIELD_ID, User::FIELD_EMAIL])->get();
            foreach ($users as $user) {
                /**
                 * @var User $user
                 */
                array_push($statsData, [
                    'id' => $user->getKey(),
                    'email' => $user->getAttribute(User::FIELD_EMAIL),
                    'connections' => $statistics->get($user->getKey())
                ]);
            }
            array_multisort(array_column($statsData, 'connections'), SORT_DESC, SORT_NUMERIC, $statsData);
        }

        return response([
            'data' => $statsData
        ]);
    }

    /**
     * 统计用户节点请求数量
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function requests(Request $request)
    {
        $reqCount = $request->get('count', 10);
        //get shadowSocks servers
        $shadowServers = ServerShadowsocks::nodes();
        $vmessServers = ServerVmess::nodes();
        $trojanServers = ServerTrojan::nodes();
        $servers = collect($shadowServers)->mergeRecursive($vmessServers)->mergeRecursive($trojanServers);

        $statistics = collect([]);
        $servers->each(function (BaseServer $server) use ($statistics) {
            $onlineUserRequests = $server->getAttribute('online_user_requests');
            foreach ($onlineUserRequests as $userId => $num) {
                if ($statistics->has($userId)) {
                    $statistics->put($userId, $statistics->get($userId) + $num);
                } else {
                    $statistics->put($userId, $num);
                }
            }
        });

        $userIds = $statistics->sortDesc()->take($reqCount)->keys();
        $statsData = [];
        if ($userIds) {
            $users = User::whereIn(User::FIELD_ID, $userIds)->select([User::FIELD_ID, User::FIELD_EMAIL])->get();
            foreach ($users as $user) {
                /**
                 * @var User $user
                 */
                array_push($statsData, [
                    'id' => $user->getKey(),
                    'email' => $user->getAttribute(User::FIELD_EMAIL),
                    'requests' => $statistics->get($user->getKey())
                ]);
            }
            array_multisort(array_column($statsData, 'requests'), SORT_DESC, SORT_NUMERIC, $statsData);
        }

        return response([
            'data' => $statsData
        ]);
    }
}