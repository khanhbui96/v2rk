<?php

namespace App\Http\Controllers\Admin\Stat;

use App\Http\Controllers\Controller;
use App\Models\ServerShadowsocks;
use App\Models\ServerTrojan;
use App\Models\ServerVmess;
use App\Models\TrafficServerLog;
use App\Utils\Helper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;


class ServerController extends Controller
{
    /**
     * server rank
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function rank(Request $request)
    {
        $reqDate = $request->get('date') ?? date('Y-m-d', time());
        $reqCurrent = (int)$request->get('current') ?? 1;
        $reqPageSize = (int)$request->get('pageSize') ?? 10;

        $servers = [
            'shadowsocks' => ServerShadowsocks::where(ServerShadowsocks::FIELD_PARENT_ID, 0)->orWhere(ServerShadowsocks::FIELD_PARENT_ID)->get(),
            'vmess' => ServerVmess::where(ServerVmess::FIELD_PARENT_ID, 0)->orWhere(ServerShadowsocks::FIELD_PARENT_ID)->get(),
            'trojan' => ServerTrojan::where(ServerVmess::FIELD_PARENT_ID, 0)->orWhere(ServerShadowsocks::FIELD_PARENT_ID)->get()
        ];

        $timestamp = strtotime($reqDate);
        $offset = ($reqCurrent - 1) * $reqPageSize;
        $total = TrafficServerLog::where(TrafficServerLog::FIELD_LOG_AT, '=', $timestamp)->
        groupBy(TrafficServerLog::FIELD_UNIQUE_ID)->selectRaw('count(*) as total')
            ->get()->count();

        $statistics = TrafficServerLog::select([
            TrafficServerLog::FIELD_SERVER_ID,
            TrafficServerLog::FIELD_SERVER_TYPE,
            TrafficServerLog::FIELD_U,
            TrafficServerLog::FIELD_D,
            DB::raw('(u+d) as total')
        ])
            ->where(TrafficServerLog::FIELD_LOG_AT, '=', $timestamp)
            ->offset($offset)
            ->limit($reqPageSize)
            ->orderBy('total', "DESC")
            ->get();


        foreach ($statistics as $stats) {
            /**
             * @var TrafficServerLog $stats
             */
            foreach ($servers[$stats->getAttribute(TrafficServerLog::FIELD_SERVER_TYPE)] as $server) {
                /**
                 * @var ServerVmess $server
                 */
                if ($server->getKey() === $stats->getAttribute(TrafficServerLog::FIELD_SERVER_ID)) {
                    $stats['server_name'] = $server->getAttribute(ServerVmess::FIELD_NAME);
                }
            }
            $stats['total'] = floatval(number_format($stats['total'] / 1073741824, 3, '.', ''));
        }
        $statsData = $statistics->toArray();
        return response([
            'data' => [
                'items' => $statsData,
                'total' => $total
            ],
        ]);
    }

    /**
     * monthly overview
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function monthlyOverview(Request $request)
    {
        $reqDate = $request->get('date') ?? date('Y-m', time());
        $monthTime = Helper::getMonthBeginAndEnd(strtotime($reqDate));
        $startTs = $monthTime['begin'];
        $endTs = $monthTime['end'];

        $result = TrafficServerLog::where(TrafficServerLog::FIELD_LOG_AT, '>=', $startTs)
            ->where(TrafficServerLog::FIELD_LOG_AT, '<=', $endTs)->selectRaw('COUNT(DISTINCT unique_id) as total, CAST(SUM(u) AS char) as total_u  ,
         CAST(SUM(d) as char) as total_d, CAST(SUM(u+d) as char) as total_traffic')->first();

        return response([
            'data' => [
                'total' => $result->getAttribute('total'),
                'total_traffic' => $result->getAttribute('total_traffic') ?? '0',
                'total_u' => $result->getAttribute('total_u') ?? '0',
                'total_d' => $result->getAttribute('total_d') ?? '0'
            ]
        ]);
    }


    /**
     * monthly traffic areas
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function monthlyTrafficAreas(Request $request)
    {
        $reqDate = $request->get('date') ?? date('Y-m', time());
        $monthTime = Helper::getMonthBeginAndEnd(strtotime($reqDate));
        $startTs = $monthTime['begin'];
        $endTs = $monthTime['end'];
        $defaultMaxCount = 15;
        $defaultChunk = 1;

        $servers = [
            'shadowsocks' => ServerShadowsocks::get(),
            'vmess' => ServerVmess::get(),
            'trojan' => ServerTrojan::get()
        ];

        $normalUniqueIds = TrafficServerLog::where(TrafficServerLog::FIELD_LOG_AT, '>=', $startTs)
            ->where(TrafficServerLog::FIELD_LOG_AT, '<=', $endTs)
            ->select([TrafficServerLog::FIELD_UNIQUE_ID])
            ->groupBy(TrafficServerLog::FIELD_UNIQUE_ID)->orderByDesc(TrafficServerLog::FIELD_D)->limit($defaultMaxCount)->get()->map(function ($item, $key) {
                return $item->unique_id;
            })->toArray();

        $trafficServerLogsQuery = TrafficServerLog::where(TrafficServerLog::FIELD_LOG_AT, '>=', $startTs)
            ->selectRaw("unique_id, log_at, u+d  as total_traffic")
            ->where(TrafficServerLog::FIELD_LOG_AT, '<=', $endTs)->whereIn(TrafficServerLog::FIELD_UNIQUE_ID, $normalUniqueIds);
        $trafficServerLogs = $trafficServerLogsQuery->get();

        $data = [];
        $trafficServerLogs->groupBy(TrafficServerLog::FIELD_UNIQUE_ID)->map(function ($items, $key) use ($defaultChunk) {
            /**
             * @var $items Collection
             */
            return $items->chunk($defaultChunk);
        })->each(function ($items, $uniqueId) use ($servers, &$data) {
            /**
             * @var $items Collection
             */
            list($serverType, $serverId) = explode('-', $uniqueId);
            $itemData = [
                'value' => 0
            ];
            foreach ($servers[$serverType] as $server) {
                if ($server->getKey() === (int)$serverId) {
                    $itemData['server_name'] = $server->getAttribute(ServerVmess::FIELD_NAME);
                }
            }

            if (!isset($itemData['server_name'])) {
                return false;
            }

            foreach ($items as $innerItems) {
                foreach ($innerItems as $trafficServerLog) {
                    /**
                     * @var TrafficServerLog $trafficServerLog
                     */
                    if (!isset($itemData['log_at'])) {
                        $itemData['log_at'] = date('y-m-d', $trafficServerLog->getAttribute(TrafficServerLog::FIELD_LOG_AT));
                    }
                    $itemData['value'] += round($trafficServerLog->getAttribute('total_traffic') / (1024 * 1024), 2);
                }
                if (isset($itemData['log_at'])) {
                    array_push($data, $itemData);
                    unset($itemData['log_at']);
                }
            }
        });

        if (count($normalUniqueIds) === $defaultMaxCount) {
            $otherTrafficServerLogsQuery = TrafficServerLog::where(TrafficServerLog::FIELD_LOG_AT, '>=', $startTs)
                ->selectRaw("log_at, sum(u+d)  as total_traffic")
                ->where(TrafficServerLog::FIELD_LOG_AT, '<=', $endTs)->whereNotIn(TrafficServerLog::FIELD_UNIQUE_ID, $normalUniqueIds)
                ->groupBy(TrafficServerLog::FIELD_LOG_AT);
            $otherTrafficServerLogs = $otherTrafficServerLogsQuery->get();
            foreach ($otherTrafficServerLogs->chunk($defaultChunk) as $innerItems) {
                $itemData = [
                    'server_name' => 'other',
                    'value' => 0
                ];
                foreach ($innerItems as $trafficServerLog) {
                    /**
                     * @var TrafficServerLog $trafficServerLog
                     */
                    if (!isset($itemData['log_at'])) {
                        $itemData['log_at'] = date('y-m-d', $trafficServerLog->getAttribute(TrafficServerLog::FIELD_LOG_AT));
                    }
                    $itemData['value'] += round($trafficServerLog->getAttribute('total_traffic') / (1024 * 1024), 2);
                }

                if (isset($itemData['log_at'])) {
                    array_push($data, $itemData);
                    unset($itemData['log_at']);
                }
            }
        }

        return response([
            'data' => $data
        ]);
    }


    /**
     *  monthly traffic are
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function monthlyRankBars(Request $request)
    {
        $reqDate = $request->get('date') ?? date('Y-m', time());
        $monthTime = Helper::getMonthBeginAndEnd(strtotime($reqDate));
        $startTs = $monthTime['begin'];
        $endTs = $monthTime['end'];

        $servers = [
            'shadowsocks' => ServerShadowsocks::where(ServerShadowsocks::FIELD_PARENT_ID, 0)->orWhere(ServerShadowsocks::FIELD_PARENT_ID)->get(),
            'vmess' => ServerVmess::where(ServerVmess::FIELD_PARENT_ID, 0)->orWhere(ServerShadowsocks::FIELD_PARENT_ID)->get(),
            'trojan' => ServerTrojan::where(ServerVmess::FIELD_PARENT_ID, 0)->orWhere(ServerShadowsocks::FIELD_PARENT_ID)->get()
        ];

        $statistics = TrafficServerLog::where(TrafficServerLog::FIELD_LOG_AT, '>=', $startTs)
            ->selectRaw("server_type,server_id, sum(u) as u, sum(d) as d, sum(u+d)  as total")
            ->where(TrafficServerLog::FIELD_LOG_AT, '<=', $endTs)
            ->groupBy(TrafficServerLog::FIELD_UNIQUE_ID)
            ->orderByDesc('total')
            ->get();


        foreach ($statistics as $stats) {
            /**
             * @var TrafficServerLog $stats
             */
            foreach ($servers[$stats->getAttribute(TrafficServerLog::FIELD_SERVER_TYPE)] as $server) {
                /**
                 * @var ServerVmess $server
                 */
                if ($server->getKey() === $stats->getAttribute(TrafficServerLog::FIELD_SERVER_ID)) {
                    $stats['server_name'] = $server->getAttribute(ServerVmess::FIELD_NAME);
                }
            }
            $stats['total'] = floatval(number_format($stats['total'] / 1073741824, 3, '.', ''));
        }
        $statsData = $statistics->toArray();
        return response([
            'data' => array_slice($statsData, 0, 32),
        ]);
    }
}