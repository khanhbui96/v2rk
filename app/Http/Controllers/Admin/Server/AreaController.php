<?php

namespace App\Http\Controllers\Admin\Server;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServerAreaSave;
use App\Models\BaseServer;
use App\Models\ServerArea;
use App\Models\ServerShadowsocks;
use App\Models\ServerTrojan;
use App\Models\ServerVmess;
use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AreaController extends Controller
{

    /**
     * fetch
     *
     * @param Request $request
     * @return ResponseFactory|Response
     */
    public function fetch(Request $request)
    {
        $reqAreaId = (int)$request->input('area_id');
        if ($reqAreaId > 0) {
            $data = ServerArea::find($reqAreaId);
        } else {
            $data = ServerArea::get();
        }

        return response([
            'data' => $data
        ]);
    }

    /**
     * save
     *
     * @param ServerAreaSave $request
     * @return ResponseFactory|Response
     */
    public function save(ServerAreaSave $request)
    {
        $reqId = (int)$request->input('id');
        $reqFlag = $request->input('flag');
        $reqCountry = $request->input('country');
        $reqCountryCode = $request->input('country_code');
        $reqCity = $request->input('city');
        $reqLng = $request->input('lng');
        $reqLat = $request->input('lat');

        if ($reqId > 0) {
            $serverArea = ServerArea::find($reqId);
        } else {
            $serverArea = new ServerArea();
        }

        $serverArea->setAttribute(ServerArea::FIELD_FLAG, $reqFlag);
        $serverArea->setAttribute(ServerArea::FIELD_COUNTRY, $reqCountry);
        $serverArea->setAttribute(ServerArea::FIELD_COUNTRY_CODE, $reqCountryCode);
        $serverArea->setAttribute(ServerArea::FIELD_CITY, $reqCity);
        $serverArea->setAttribute(ServerArea::FIELD_LNG, $reqLng);
        $serverArea->setAttribute(ServerArea::FIELD_LAT, $reqLat);

        if (!$serverArea->save()) {
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
         * @var ServerArea $serverArea
         */
        $serverArea = ServerArea::find($reqId);
        if ($serverArea == null) {
            abort(500, '区域不存在');
        }


        $vmessServers = ServerVmess::all();
        $trojanServers = ServerTrojan::all();
        $shadowsocksServers = ServerShadowsocks::all();
        $servers = collect($vmessServers)->merge($trojanServers)->merge($shadowsocksServers);
        foreach ($servers as $server) {
            if ($reqId === (int)$server->getAttribute(BaseServer::FIELD_AREA_ID)) {
                abort(500, '该区域已被节点所使用，无法删除');
            }
        }

        return response([
            'data' => $serverArea->delete()
        ]);
    }
}