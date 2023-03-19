<?php

namespace Database\Seeders;

use App\Console\Commands\RecordOnlineUser;
use App\Utils\CacheKey;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Redis;

class StatUserOnlineResetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cacheKey = CacheKey::get(CacheKey::STATS_USER_ONLINE, RecordOnlineUser::MAX_COUNT);
        Redis::del($cacheKey);
    }
}