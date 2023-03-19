<?php

namespace App\Http\Controllers\Admin\Server;

use App\Http\Controllers\Controller;
use App\Models\ServerShadowsocks;
use App\Models\ServerTrojan;
use App\Models\ServerVmess;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Throwable;


class ManageController extends Controller
{
    /**
     * get nodes
     *
     * @return Application|ResponseFactory|Response
     */
    public function getNodes()
    {
        //get shadowSocks servers
        $shadowServers = ServerShadowsocks::nodes();
        $vmessServers = ServerVmess::nodes();
        $trojanServers = ServerTrojan::nodes();

        $servers = array_merge(
            $shadowServers->toArray(),
            $vmessServers->toArray(),
            $trojanServers->toArray()
        );

        array_multisort(array_column($servers, 'sort'), SORT_ASC, SORT_NUMERIC, $servers);
        return response([
            'data' => $servers
        ]);
    }

    /**
     * sort
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     * @throws Throwable
     */
    public function sort(Request $request)
    {
        $reqSorts = $request->input('sorts');
        DB::beginTransaction();
        foreach ($reqSorts as $index => $item) {
            $method = $item['key'];
            $serverID = $item['value'];
            /**
             * @var ServerVmess $server
             */
            $server = null;
            switch ($method) {
                case ServerShadowsocks::TYPE:
                    $server = ServerShadowsocks::find($serverID);
                    break;
                case ServerVmess::TYPE:
                    $server = ServerVmess::find($serverID);
                    break;
                case ServerTrojan::TYPE:
                    $server = ServerTrojan::find($serverID);
                    break;
            }

            if ($server === null) {
                DB::rollBack();
                abort(500, '服务器未找到');
            }
            $server->setAttribute(ServerVmess::FIELD_SORT, $index);
            if (!$server->save()) {
                DB::rollBack();
                abort(500, '保存失败');
            }
        }
        DB::commit();

        return response([
            'data' => true
        ]);
    }

}