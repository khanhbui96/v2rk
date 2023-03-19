<?php

namespace App\Models;

use App\Utils\CacheKey;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Throwable;


abstract class BaseServer extends Model
{
    const FIELD_ID = "id";
    const FIELD_NAME = "name";
    const FIELD_PLAN_ID = 'plan_id';
    const FIELD_PARENT_ID = "parent_id";
    const FIELD_AREA_ID = "area_id";
    const FIELD_HOST = "host";
    const FIELD_PORT = "port";
    const FIELD_SERVER_PORT = "server_port";
    const FIELD_TAGS = "tags";
    const FIELD_IPS = "ips";
    const FIELD_RATE = "rate";
    const FIELD_SHOW = "show";
    const FIELD_CHECK = "check";
    const FIELD_SORT = "sort";
    const FIELD_CREATED_AT = "created_at";
    const FIELD_UPDATED_AT = "updated_at";

    const SHOW_ON = 1;
    const SHOW_OFF = 0;
    const CHECK_ON = 1;
    const TYPE = "";

    const ONLINE_LIMIT_TIME = 1200;

    /**
     * all tags
     *
     * @returnn array
     */
    public static function allTags(): array
    {
        $result = [];
        $servers = self::where(self::FIELD_SHOW, self::SHOW_ON)->get();
        foreach ($servers as $server) {
            $tags = (array)$server->getAttribute(self::FIELD_TAGS);
            $result = array_merge($result, $tags);
        }
        return array_unique($result);
    }

    /**
     * base fault node names
     *
     * @param string $checkKey
     * @param string $pushKey
     *
     * @return array
     */
    public static function baseFaultNodeNames(string $checkKey, string $pushKey): array
    {
        $result = [];
        $servers = self::where(self::FIELD_CHECK, self::CHECK_ON)->get();
        foreach ($servers as $server) {
            $parentId = $server->getAttribute(self::FIELD_PARENT_ID);
            $nodeId = $parentId > 0 ? $server->getAttribute(self::FIELD_PARENT_ID) : $server->getKey();
            $lastCheckAt = (int)Redis::hget($checkKey, $nodeId);
            if ($lastCheckAt < (time() - self::ONLINE_LIMIT_TIME)) {
                array_push($result, $server->getAttribute(self::FIELD_NAME));
            }

            if ($parentId === 0) {
                $ips = (array)$server->getAttribute(self::FIELD_IPS);
                foreach ($ips as $ip) {
                    $ipLastCheckAt = Redis::hget(CacheKey::get($checkKey, $server->getKey()), $ip);
                    if ($ipLastCheckAt < (time() - self::ONLINE_LIMIT_TIME)) {
                        array_push($result, sprintf("%s  IP:%s ", $server->getAttribute(self::FIELD_NAME), $ip));
                    }
                }
            }
        }
        return $result;
    }

    /**
     * base configs
     *
     * @param User $user
     * @param string $type
     * @param string $checkKey
     * @param bool $show
     * @param bool $needExtra
     * @return Collection
     */
    public static function baseConfigs(User $user, string $type, string $checkKey, bool $show = true, bool $needExtra = false): Collection
    {
        $planId = $user->getAttribute(User::FIELD_PLAN_ID);
        if ($planId <= 0) {
            return collect([]);
        }

        $servers = self::orderBy(self::FIELD_SORT, "ASC")->
        whereJsonContains(BaseServer::FIELD_PLAN_ID, $planId)
            ->where(self::FIELD_SHOW, (int)$show)->get();
        foreach ($servers as $server) {
            /**
             * @var ServerVmess $server
             */
            $server->setAttribute("type", $type);
            if ($needExtra) {
                if ($server->getAttribute(self::FIELD_PARENT_ID) > 0) {
                    $server->setAttribute('last_check_at', Redis::hget($checkKey,
                        $server->getAttribute(self::FIELD_PARENT_ID)));
                } else {
                    $server->setAttribute('last_check_at', Redis::hget($checkKey,
                        $server->getKey()));
                }
            }
        }

        return $servers;
    }

    /**
     * base nodes
     *
     * @param string $type
     * @param string $userKey
     * @param string $checkKey
     * @param string $pushKey
     * @return Collection
     */
    public static function baseNodes(string $type, string $userKey, string $checkKey, string $pushKey): Collection
    {
        $servers = self::orderBy('sort', "ASC")->get();
        foreach ($servers as $server) {
            /**
             * @var ServerVmess $server
             */
            $parentId = $server->getAttribute(self::FIELD_PARENT_ID);
            $nodeId = $parentId > 0 ? $parentId : $server->getKey();
            $cacheKeyOnline = CacheKey::get($userKey, $nodeId);
            $lastCheckAt = Redis::hget($checkKey, $nodeId);
            $lastPushAt = Redis::hget($pushKey, $nodeId);
            $onlineData = Redis::hgetall($cacheKeyOnline);

            $online = 0;
            $onlineUserIds = [];
            $ipOnline = [];
            $ipOnlineUserIds = [];
            $onlineUserRequests = [];
            $ipOnlineUserRequests = [];
            foreach ($onlineData as $ip => $onlineJSON) {
                $onlineItem = json_decode($onlineJSON);
                if (isset($onlineItem->time) && time() - $onlineItem->time <= self::ONLINE_LIMIT_TIME) {
                    $online += $onlineItem->count;
                    $ipOnline[$ip] = $onlineItem->count;
                    if (isset($onlineItem->user_ids)) {
                        $ipOnlineUserIds[$ip] = $onlineItem->user_ids;
                        $onlineUserIds = array_merge($onlineUserIds, $onlineItem->user_ids);
                    }
                    if (isset($onlineItem->user_requests)) {
                        $ipOnlineUserRequests[$ip] = $onlineItem->user_requests;
                        foreach ($onlineItem->user_requests as $userId => $num) {
                            if (isset($onlineUserRequests[$userId])) {
                                $onlineUserRequests[$userId] += $num;
                            } else {
                                $onlineUserRequests[$userId] = $num;
                            }
                        }
                    }
                }
            }

            if ((time() - self::ONLINE_LIMIT_TIME) >= $lastCheckAt) {
                $availableStatus = 0;
            } else if ((time() - self::ONLINE_LIMIT_TIME) >= $lastPushAt) {
                $availableStatus = 1;
            } else {
                $availableStatus = 2;
            }

            $ipStatus = [];
            $ips = (array)$server->getAttribute(self::FIELD_IPS);
            foreach ($ips as $ip) {
                $ipLastCheckAt = Redis::hget(CacheKey::get($checkKey, $server->getKey()), $ip);
                $ipLastPushAt = Redis::hget(CacheKey::get($pushKey, $server->getKey()), $ip);
                if ((time() - self::ONLINE_LIMIT_TIME) >= $ipLastCheckAt) {
                    $ipAvailableStatus = 0;
                } else if ((time() - self::ONLINE_LIMIT_TIME) >= $ipLastPushAt) {
                    $ipAvailableStatus = 1;
                } else {
                    $ipAvailableStatus = 2;
                }
                $ipStatus[$ip] = $ipAvailableStatus;
            }

            $server->setAttribute('type', $type);
            $server->setAttribute('online', $online);
            $server->setAttribute('online_user_ids', collect($onlineUserIds)->unique()->values());
            $server->setAttribute('ip_online', $ipOnline);
            $server->setAttribute('ip_online_user_ids', $ipOnlineUserIds);
            $server->setAttribute('online_user_requests', $onlineUserRequests);
            $server->setAttribute('ip_online_user_requests', $ipOnlineUserRequests);
            $server->setAttribute('available_status', $availableStatus);
            $server->setAttribute('ip_status', $ipStatus);
        }

        return $servers;
    }


    /**
     * get server area
     *
     * @return Model|BelongsTo|object|null
     */
    public function area()
    {
        return $this->belongsTo('App\Models\ServerArea')->first();
    }

    /**
     * check server show
     *
     * @return bool
     */
    public function isShow(): bool
    {
        return $this->getAttribute(self::FIELD_SHOW) === self::SHOW_ON;
    }

    /**
     * find available users
     *
     * @return Collection
     */
    public function findAvailableUsers(): Collection
    {
        $planIds = (array)$this->getAttribute(self::FIELD_PLAN_ID);
        if (empty($planIds)) {
            return collect([]);
        }
        $plans = Plan::whereIn(Plan::FIELD_ID, $planIds)->get()->groupBy('id');
        $users = User::whereIn(User::FIELD_PLAN_ID, $planIds)->where(User::FIELD_BANNED, User::BANNED_OFF)
            ->where(function ($query) {
                $query->where(User::FIELD_SUSPEND_AT, NULL)->orWhere(User::FIELD_SUSPEND_AT, '<', time());
            })
            ->where(function ($query) {
                $query->where(User::FIELD_EXPIRED_AT, '>=', time())
                    ->orWhere(User::FIELD_EXPIRED_AT, NULL)->orWhere(User::FIELD_EXPIRED_AT, 0);
            })->select([User::FIELD_ID, User::FIELD_PLAN_ID, User::FIELD_EMAIL, User::FIELD_T, User::FIELD_U, User::FIELD_D, User::FIELD_UUID])->get();


        return $users->filter(function (User $user) use ($plans) {

            $planId = $user->getAttribute(User::FIELD_PLAN_ID);
            /**
             * @var Plan $plan
             */
            $plan = $plans[$planId][0];

            $transferEnableValue = $plan->getAttribute(Plan::FIELD_TRANSFER_ENABLE_VALUE);
            $u = $user->getAttribute(User::FIELD_U);
            $d = $user->getAttribute(User::FIELD_D);
            if ($transferEnableValue <= ($u + $d)) {
                return false;
            }
            $timeLimit = (bool)$plan->getAttribute(Plan::FIELD_TIME_LIMIT);
            $startSec = $plan->getAttribute(Plan::FIELD_START_SEC);
            $endSec = $plan->getAttribute(Plan::FIELD_END_SEC);
            if ($timeLimit) {
                $seconds = time() - strtotime(date('Y-m-d', time()));
                if ($seconds < $startSec || $seconds > $endSec) {
                    return false;
                }
            }
            return true;
        });
    }

    /**
     * drop
     *
     * @return bool
     * @throws Throwable
     */
    public function drop(): bool
    {
        Db::beginTransaction();
        try {
            $this->delete();
            TrafficServerLog::where([TrafficServerLog::FIELD_SERVER_ID => $this->getKey(),
                TrafficServerLog::FIELD_SERVER_TYPE => self::TYPE])->delete();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e);
        }
        Db::commit();
        return true;
    }

    /**
     * get type
     *
     * @return string
     */
    public function getType(): string
    {
        return ltrim($this->getTable(), "server_");
    }
}