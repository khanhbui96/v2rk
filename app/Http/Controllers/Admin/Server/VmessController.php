<?php

namespace App\Http\Controllers\Admin\Server;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServerVmessSave;
use App\Http\Requests\Admin\ServerVmessUpdate;
use App\Models\ServerVmess;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class VmessController extends Controller
{
    /**
     * save
     *
     * @param ServerVmessSave $request
     * @return Application|ResponseFactory|Response
     */
    public function save(ServerVmessSave $request)
    {
        $reqId = (int)$request->input('id');
        $reqName = $request->input('name');
        $reqPlanId = (array)$request->input('plan_id');
        $reqParentId = $request->input('parent_id');
        $reqAreaId = $request->input('area_id');
        $reqHost = $request->input('host');
        $reqPort = $request->input('port');
        $reqServerPort = $request->input('server_port');
        $reqTls = $request->input('tls');
        $reqTags = (array)$request->input('tags');
        $reqRate = $request->input('rate');
        $reqAlterId = $request->input('alter_id');
        $reqNetwork = $request->input('network');
        $reqNetworkSettings = $request->input('networkSettings');
        $reqRuleSettings = $request->input('ruleSettings');
        $reqTlsSettings = $request->input('tlsSettings');
        $reqDnsSettings = $request->input('dnsSettings');
        $reqShow = $request->input('show');
        $reqIps = $request->input('ips');

        /**
         * @var ServerVmess $server
         */
        if ($reqId > 0) {
            $server = ServerVmess::find($reqId);
            if ($server === null) {
                abort(500, '服务器不存在');
            }
        } else {
            $server = new ServerVmess();
        }

        $server->setAttribute(ServerVmess::FIELD_PLAN_ID, $reqPlanId);
        $server->setAttribute(ServerVmess::FIELD_AREA_ID, $reqAreaId);
        $server->setAttribute(ServerVmess::FIELD_NAME, $reqName);
        $server->setAttribute(ServerVmess::FIELD_NETWORK, $reqNetwork);
        $server->setAttribute(ServerVmess::FIELD_TLS, $reqTls);
        $server->setAttribute(ServerVmess::FIELD_RATE, $reqRate);
        $server->setAttribute(ServerVmess::FIELD_ALTER_ID, $reqAlterId);
        $server->setAttribute(ServerVmess::FIELD_HOST, $reqHost);
        $server->setAttribute(ServerVmess::FIELD_PORT, $reqPort);
        $server->setAttribute(ServerVmess::FIELD_SERVER_PORT, $reqServerPort);
        $server->setAttribute(ServerVmess::FIELD_PARENT_ID, (int)$reqParentId);
        $server->setAttribute(ServerVmess::FIELD_NETWORK_SETTINGS, $reqNetworkSettings);
        $server->setAttribute(ServerVmess::FIELD_TAGS, $reqTags);
        $server->setAttribute(ServerVmess::FIELD_IPS, $reqIps);

        if ($reqShow) {
            $server->setAttribute(ServerVmess::FIELD_SHOW, $reqShow);
        }

        if ($reqDnsSettings) {
            $server->setAttribute(ServerVmess::FIELD_DNS_SETTINGS, $reqDnsSettings);
        }

        if ($reqRuleSettings) {
            $server->setAttribute(ServerVmess::FIELD_RULE_SETTINGS, $reqRuleSettings);
        }

        if ($reqTlsSettings) {
            $server->setAttribute(ServerVmess::FIELD_TLS_SETTINGS, $reqTlsSettings);
        }

        if (!$server->save()) {
            abort(500, '创建失败');
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
        /**
         * @var ServerVmess $server
         */
        $server = ServerVmess::find($reqId);
        if ($server === null) {
            abort(500, '节点ID不存在');
        }

        try {
            $server->drop();
        } catch (Exception  $e) {
            abort(500, "删除失败" . $e->getMessage());
        } catch (Throwable $e) {
        }

        return response([
            'data' => true
        ]);
    }

    /**
     * update
     *
     * @param ServerVmessUpdate $request
     * @return Application|ResponseFactory|Response
     */
    public function update(ServerVmessUpdate $request)
    {
        $reqId = $request->input('id');
        $reqShow = $request->input('show');
        $reqCheck = $request->input('check');

        if ($reqShow === null && $reqCheck === null) {
            abort(500, "参数错误");
        }

        /**
         * @var ServerVmess $server
         */
        $server = ServerVmess::find($reqId);

        if ($server === null) {
            abort(500, '该服务器不存在');
        }

        if ($reqShow !== null) {
            $server->setAttribute(ServerVmess::FIELD_SHOW, $reqShow);
        }

        if ($reqCheck !== null) {
            $server->setAttribute(ServerVmess::FIELD_CHECK, $reqCheck);
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
        $reqInputId = $request->input('id');

        /**
         * @var ServerVmess $server
         */
        $server = ServerVmess::find($reqInputId);
        if ($server === null) {
            abort(500, '服务器不存在');
        }

        $newServer = $server->replicate();
        $newServer->setAttribute(ServerVmess::FIELD_SHOW, ServerVmess::SHOW_OFF);

        if (!$newServer->save()) {
            abort(500, '复制失败');
        }

        return response([
            'data' => true
        ]);
    }

}