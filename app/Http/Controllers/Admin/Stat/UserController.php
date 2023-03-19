<?php

namespace App\Http\Controllers\Admin\Stat;

use App\Console\Commands\RecordOnlineUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRank;
use App\Models\TrafficServerLog;
use App\Models\TrafficUserLog;
use App\Models\User;
use App\Utils\CacheKey;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;


class UserController extends Controller
{
    /**
     * user rank
     *
     * @param UserRank $request
     * @return Application|ResponseFactory|Response
     */
    public function rank(UserRank $request)
    {
        $reqSort = $request->get('sort', 'total');
        $reqDate = $request->get('date') ?? date('Y-m-d', time());
        $timestamp = strtotime($reqDate);
        $statistics = TrafficUserLog::select([
            TrafficUserLog::FIELD_USER_ID,
            TrafficUserLog::FIELD_N,
            TrafficUserLog::FIELD_U,
            TrafficUserLog::FIELD_D,
            DB::raw('(u+d) as total')
        ])
            ->where(TrafficServerLog::FIELD_LOG_AT, '=', $timestamp)
            ->limit(10)
            ->orderByRaw("CAST($reqSort as UNSIGNED) DESC")
            ->get();

        $statsData = [];
        if ($statistics) {
            $userIds = $statistics->map(function ($item) {
                return $item->getAttribute(TrafficUserLog::FIELD_USER_ID);
            })->unique()->values()->all();
            $users = User::whereIn(User::FIELD_ID, $userIds)->get();
            foreach ($statistics as $stats) {
                /**
                 * @var TrafficUserLog $stats
                 */
                foreach ($users as $user) {
                    /**
                     * @var User $user
                     */
                    if ($user->getKey() === $stats->getAttribute(TrafficUserLog::FIELD_USER_ID)) {
                        $stats[User::FIELD_EMAIL] = $user->getAttribute(User::FIELD_EMAIL);
                    }
                }
            }
            $statsData = $statistics->toArray();
        }

        return response([
            'data' => $statsData
        ]);
    }


    /**
     * latest hour online data
     *
     * @return ResponseFactory|Response
     */
    public function latestHourOnline()
    {
        $cacheKey = CacheKey::get(CacheKey::STATS_USER_ONLINE, RecordOnlineUser::MAX_COUNT);
        $cacheKeyLen = Redis::llen($cacheKey);
        $onlineCacheData = $cacheKeyLen >= 13 ? (array)Redis::lrange($cacheKey, $cacheKeyLen - 13, -1) : (array)Redis::lrange($cacheKey, 0, $cacheKeyLen - 1);

        $data = collect($onlineCacheData)->map(function ($item, $key) {
            $data = json_decode($item, true);
            $data['time'] = date("H:i", $data['time']);
            return $data;
        })->toArray();

        return response([
            'data' => $data
        ]);
    }


    /**
     * latest day online data
     *
     * @return ResponseFactory|Response
     */
    public function latestDayOnline()
    {
        $cacheKey = CacheKey::get(CacheKey::STATS_USER_ONLINE, RecordOnlineUser::MAX_COUNT);

        $cacheKeyLen = Redis::llen($cacheKey);
        $onlineCacheData = $cacheKeyLen >= 288 ? (array)Redis::lrange($cacheKey, $cacheKeyLen - 288, -1) : (array)Redis::lrange($cacheKey, 0, $cacheKeyLen - 1);
        $data = collect($onlineCacheData)->map(function ($item, $key) {
            $data = json_decode($item, true);
            $data['time'] = date("H:i", $data['time']);
            return $data;
        })->toArray();

        return response([
            'data' => $data
        ]);
    }


    /**
     * latest day online data
     *
     * @return ResponseFactory|Response
     */
    public function latestWeekOnline()
    {
        $cacheKey = CacheKey::get(CacheKey::STATS_USER_ONLINE, RecordOnlineUser::MAX_COUNT);
        $cacheKeyLen = Redis::llen($cacheKey);
        $onlineCacheData = $cacheKeyLen >= 2016 ? (array)Redis::lrange($cacheKey, $cacheKeyLen - 2016, -1) : (array)Redis::lrange($cacheKey, 0, $cacheKeyLen - 1);

        $data = collect($onlineCacheData)->map(function ($item, $key) {
            $data = json_decode($item, true);
            $data['time'] = date("m-d H:i", $data['time']);
            return $data;
        })->toArray();

        return response([
            'data' => $data
        ]);
    }

}