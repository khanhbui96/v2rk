<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ServerShadowsocks;
use App\Models\ServerTrojan;
use App\Models\ServerVmess;
use App\Models\User;
use App\Utils\CacheKey;
use App\Utils\Client\Factory as ClientFactory;
use App\Utils\Client\Protocol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Psr\SimpleCache\InvalidArgumentException;


class ClientController extends Controller
{
    const DEFAULT_FLAG = "v2rayn";

    /**
     * subscribe
     *
     * @param Request $request
     * @throws InvalidArgumentException
     */
    public function subscribe(Request $request)
    {
        $reqFlag = $request->input('flag') ?? ($_SERVER['HTTP_USER_AGENT'] ?? '');
        $flag = $reqFlag ? strtolower($reqFlag) : self::DEFAULT_FLAG;

        if (empty($flag)) {
            abort(500, "参数错误");
        }

        /**
         * @var User $user
         */
        $user = $request->user;
        // account not expired and is not banned.
        if (!$user->isAvailable(true)) {
            abort(500, "用户不可用");
        }

        $configSubCacheEnable = (bool)config('v2board.subscribe_cache_enable', 0);
        $subscribeCacheKey = CacheKey::get(CacheKey::CLIENT_SUBSCRIBE, sprintf("%s_%d", $reqFlag, $user->getKey()));
        $data = "";
        if ($configSubCacheEnable) {
            $data = Cache::get($subscribeCacheKey);
        }
        if ($configSubCacheEnable === false || empty($data)) {
            $servers = array_merge(
                ServerVmess::configs($user)->toArray(),
                ServerShadowsocks::configs($user)->toArray(),
                ServerTrojan::configs($user)->toArray()
            );

            array_multisort(array_column($servers, 'sort'), SORT_ASC, SORT_NUMERIC, $servers);
            $protocolInstance = ClientFactory::getInstance($servers, $user, $flag);
            /**
             * @var Protocol $protocolInstance
             */

            if ($protocolInstance === null) {
                $protocolInstance = ClientFactory::getInstance($servers, $user, self::DEFAULT_FLAG);
            }
            $data = $protocolInstance->handle();
            if ($configSubCacheEnable) {
                Cache::set($subscribeCacheKey, $data, 60);
            }
        }
        die($data);
    }
}