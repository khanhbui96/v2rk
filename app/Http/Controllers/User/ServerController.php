<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BaseServer;
use App\Models\ServerArea;
use App\Models\ServerShadowsocks;
use App\Models\ServerTrojan;
use App\Models\ServerVmess;
use App\Models\User;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    public function fetch(Request $request)
    {
        $sessionId = $request->session()->get('id');
        /**
         * @var User $user
         */
        $user = User::find($sessionId);
        if ($user === null) {
            abort(500, __('The user does not exist'));
        }

        $servers = null;
        if ($user->isAvailable()) {
            $shadowServers = ServerShadowsocks::configs($user, true, true);
            $vmessServers = ServerVmess::configs($user, true, true);
            $trojanServers = ServerTrojan::configs($user, true, true);
            $servers = $shadowServers->mergeRecursive($vmessServers)->mergeRecursive($trojanServers)->sortBy('sort');
        }
        return response([
            'data' => $servers ? $servers->values() : []
        ]);
    }

    public function overview()
    {
        $shadowServers = ServerShadowsocks::nodes();
        $vmessServers = ServerVmess::nodes();
        $trojanServers = ServerTrojan::nodes();

        $data = [];
        $items = [];
        /*
         * @var BaseServer $server
         */
        $groupAreaServers = collect($shadowServers)->merge($vmessServers)->merge($trojanServers)->filter(function ($server) {
            /**
             * @var BaseServer $server
             */
            return $server->isShow() && $server->getAttribute(BaseServer::FIELD_AREA_ID) > 0;

        })->groupBy(BaseServer::FIELD_AREA_ID);


        $areaIds = $groupAreaServers->keys()->all();
        $areas = ServerArea::whereIn(ServerArea::FIELD_ID, $areaIds)->get();


        foreach ($areas as $area) {
            /**
             * @var ServerArea $area
             */
            $area->makeHidden([ServerArea::FIELD_ID, ServerArea::FIELD_CREATED_AT, ServerArea::FIELD_UPDATED_AT]);
            $areaServers = $groupAreaServers->get($area->getKey());
            $serverTotal = 0;
            $serverUsers = 0;
            foreach ($areaServers as $areaServer) {
                /**
                 * @var BaseServer $areaServer
                 */
                $ips = (array)$areaServer->getAttribute(BaseServer::FIELD_IPS);
                $serverTotal += count($ips) > 0 ? count($ips) : 1;
                $serverUsers += $areaServer->getAttribute('online');
            }
            $area->setAttribute('server_total', $serverTotal);
            $area->setAttribute('server_load', $serverUsers / $serverTotal / 100);
            $items[] = $area;
        }

        $fillColor = config('v2board.frontend_world_fill_color', '#2196f3');
        $markerColor = config('v2board.frontend_world_marker_color', '#8dc34a');

        return [
            'data' => [
                'map_config' => ['fill_color' => $fillColor, 'marker_color' => $markerColor],
                'items' => $items
            ]
        ];
    }


}