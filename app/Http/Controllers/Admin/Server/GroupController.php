<?php

namespace App\Http\Controllers\Admin\Server;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServerGroupSave;
use App\Models\BaseServer;
use App\Models\Plan;
use App\Models\ServerGroup;
use App\Models\ServerShadowsocks;
use App\Models\ServerTrojan;
use App\Models\ServerVmess;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GroupController extends Controller
{
    /**
     * fetch
     *
     * @param Request $request
     * @return ResponseFactory|Response
     */
    public function fetch(Request $request)
    {
        $reqGroupId = (int)$request->input('group_id');
        if ($reqGroupId > 0) {
            $data = ServerGroup::find($reqGroupId);
        } else {
            $serverGroups = ServerGroup::get();
            /**
             * @var ServerGroup $serverGroup
             */
            foreach ($serverGroups as $serverGroup) {
                $serverGroup->setAttribute('user_count', $serverGroup->countUsers());
                $serverGroup->setAttribute('valid_user_count', $serverGroup->countNotExpiredUsers());
                $serverGroup->setAttribute('server_count', $serverGroup->countServers());
            }
            $data = $serverGroups;
        }

        return response([
            'data' => $data
        ]);
    }

    /**
     * save
     *
     * @param ServerGroupSave $request
     * @return ResponseFactory|Response
     */
    public function save(ServerGroupSave $request)
    {
        $reqId = (int)$request->input('id');
        $reqName = $request->input('name');
        if (empty($reqName)) {
            abort(500, '组名不能为空');
        }

        if ($reqId > 0) {
            $serverGroup = ServerGroup::find($reqId);
        } else {
            $serverGroup = new ServerGroup();
        }

        $serverGroup->setAttribute(ServerGroup::FIELD_NAME, $reqName);
        if (!$serverGroup->save()) {
            abort(500, "保存失败");
        }

        return response([
            'data' => true
        ]);
    }

    /**
     * drop
     *
     * @param Request $request
     * @return ResponseFactory|Response
     * @throws Exception
     */
    public function drop(Request $request)
    {
        $reqId = (int)$request->input('id');

        if ($reqId <= 0) {
            abort(500, "参数不正确");
        }

        /**
         * @var ServerGroup $serverGroup
         */
        $serverGroup = ServerGroup::find($reqId);
        if ($serverGroup == null) {
            abort(500, '组不存在');
        }

        $vmessServers = ServerVmess::all();
        $trojanServers = ServerTrojan::all();
        $shadowsocksServers = ServerShadowsocks::all();
        $servers = collect($vmessServers)->merge($trojanServers)->merge($shadowsocksServers);
        foreach ($servers as $server) {
            if (in_array($reqId, $server->getAttribute(BaseServer::FIELD_GROUP_ID))) {
                abort(500, '该组已被节点所使用，无法删除');
            }
        }

        if (Plan::where(Plan::FIELD_GROUP_ID, $reqId)->count() > 0) {
            abort(500, '该组已被订阅所使用，无法删除');
        }


        if (User::where(Plan::FIELD_GROUP_ID, $reqId)->count() > 0) {
            abort(500, '该组已被用户所使用，无法删除');
        }
        return response([
            'data' => $serverGroup->delete()
        ]);
    }
}