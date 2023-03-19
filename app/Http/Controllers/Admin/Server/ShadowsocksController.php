<?php

namespace App\Http\Controllers\Admin\Server;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServerShadowsocksSave;
use App\Http\Requests\Admin\ServerShadowsocksUpdate;
use App\Models\ServerShadowsocks;
use App\Models\ServerVmess;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShadowsocksController extends Controller
{
    /**
     * save
     *
     * @param ServerShadowsocksSave $request
     * @return Application|ResponseFactory|Response
     */
    public function save(ServerShadowsocksSave $request)
    {
        $reqPlanId = (array)$request->input('plan_id');
        $reqTags = (array)$request->input('tags');
        $reqId = (int)$request->input('id');
        $reqName = $request->input('name');
        $reqParentId = $request->input('parent_id');
        $reqAreaId = $request->input('area_id');
        $reqHost = $request->input('host');
        $reqPort = $request->input('port');
        $reqServerPort = $request->input('server_port');
        $reqCipher = $request->input('cipher');
        $reqRate = $request->input('rate');
        $reqShow = $request->input('show');
        $reqIps = $request->input('ips');

        if ($reqId > 0) {
            /**
             * @var ServerShadowsocks $server
             */
            $server = ServerShadowsocks::find($reqId);
            if ($server === null) {
                abort(500, '服务器不存在');
            }

        } else {

            $server = new ServerShadowsocks();
        }

        $server->setAttribute(ServerShadowsocks::FIELD_NAME, $reqName);
        $server->setAttribute(ServerShadowsocks::FIELD_PLAN_ID, $reqPlanId);
        $server->setAttribute(ServerShadowsocks::FIELD_AREA_ID, $reqAreaId);
        $server->setAttribute(ServerShadowsocks::FIELD_HOST, $reqHost);
        $server->setAttribute(ServerShadowsocks::FIELD_PORT, $reqPort);
        $server->setAttribute(ServerShadowsocks::FIELD_SERVER_PORT, $reqServerPort);
        $server->setAttribute(ServerShadowsocks::FIELD_CIPHER, $reqCipher);
        $server->setAttribute(ServerShadowsocks::FIELD_RATE, $reqRate);
        $server->setAttribute(ServerShadowsocks::FIELD_PARENT_ID, (int)$reqParentId);
        $server->setAttribute(ServerShadowsocks::FIELD_TAGS, $reqTags);
        $server->setAttribute(ServerShadowsocks::FIELD_IPS, $reqIps);

        if ($reqShow !== null) {
            $server->setAttribute(ServerShadowsocks::FIELD_SHOW, $reqShow);
        }

        if (!$server->save()) {
            abort(500, '保存失败');
        }

        return response([
            'data' => true
        ]);
    }

    /**
     * drop
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function drop(Request $request)
    {
        $reqId = (int)$request->input('id');
        if ($reqId <= 0) {
            abort(500, "参数无效");
        }


        $server = ServerShadowsocks::find($reqId);
        if ($server === null) {
            abort(500, '节点ID不存在');
        }

        try {
            $server->drop();
        } catch (Exception  $e) {
            abort(500, "删除失败" . $e->getMessage());
        }

        return response([
            'data' => true
        ]);
    }

    /**
     * update
     *
     * @param ServerShadowsocksUpdate $request
     * @return Application|ResponseFactory|Response
     */
    public function update(ServerShadowsocksUpdate $request)
    {
        $reqShow = $request->input('show');
        $reqId = $request->input('id');
        $reqCheck = $request->input('check');

        if ($reqShow === null && $reqCheck === null) {
            abort(500, "参数错误");
        }

        $server = ServerShadowsocks::find($reqId);

        /**
         * @var ServerVmess $server
         */
        if ($server === null) {
            abort(500, '该服务器不存在');
        }

        if ($reqShow !== null) {
            $server->setAttribute(ServerShadowsocks::FIELD_SHOW, $reqShow);
        }

        if ($reqCheck !== null) {
            $server->setAttribute(ServerShadowsocks::FIELD_CHECK, $reqCheck);
        }


        if (!$server->save()) {
            abort(500, '保存失败');
        }

        return response([
            'data' => true
        ]);
    }

    /**
     * copy
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function copy(Request $request)
    {
        $reqId = $request->input('id');

        /**
         * @var ServerShadowsocks $server
         */
        $server = ServerShadowsocks::find($reqId);
        if ($server === null) {
            abort(500, '服务器不存在');
        }

        $newServer = $server->replicate();

        $newServer->setAttribute(ServerShadowsocks::FIELD_SHOW, ServerShadowsocks::SHOW_OFF);

        if (!$newServer->save()) {
            abort(500, '复制失败');
        }

        return response([
            'data' => true
        ]);
    }
}