<?php

namespace Database\Seeders;

use App\Console\Commands\RecordOnlineUser;
use App\Utils\CacheKey;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Redis;


class StatUserOnlineSeeder extends Seeder
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
        $data = ['time' =>strtotime('2022-08-29  00:00'), 'count'=> 10];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' =>strtotime('2022-08-29  00:05'), 'count'=> 15];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' =>strtotime('2022-08-29  00:10'), 'count'=> 20];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' =>strtotime('2022-08-29  00:15'), 'count'=> 35];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' =>strtotime('2022-08-29  00:20'), 'count'=> 30];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' =>strtotime('2022-08-29  00:25'), 'count'=> 60];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' => strtotime('2022-08-29  00:30'), 'count'=> 100];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' => strtotime('2022-08-29  00:35'), 'count'=> 95];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' => strtotime('2022-08-29  00:40'), 'count'=> 70];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' => strtotime('2022-08-29  00:45'), 'count'=> 80];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' => strtotime('2022-08-29  00:50'), 'count'=> 50];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' => strtotime('2022-08-29  00:55'), 'count'=> 55];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' =>strtotime('2022-08-29  01:00'), 'count'=> 85];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' => strtotime('2022-08-29  01:05'), 'count'=> 15];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' => strtotime('2022-08-29  01:10'), 'count'=> 20];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' => strtotime('2022-08-29  01:15'), 'count'=> 35];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' => strtotime('2022-08-29  01:20'), 'count'=> 30];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' => strtotime('2022-08-29  01:25'), 'count'=> 60];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' => strtotime('2022-08-29  01:30'), 'count'=> 100];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' => strtotime('2022-08-29  01:35'), 'count'=> 95];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' => strtotime('2022-08-29  01:40'), 'count'=> 70];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' => strtotime('2022-08-29  01:45'), 'count'=> 80];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' => strtotime('2022-08-29  01:50'), 'count'=> 50];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' => strtotime('2022-08-29  01:55'), 'count'=> 55];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' => strtotime('2022-08-29  02:00'), 'count'=> 85];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' => strtotime('2022-08-29  02:05'), 'count'=> 15];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' =>strtotime('2022-08-29  02:10'), 'count'=> 20];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' => strtotime('2022-08-29  02:15'), 'count'=> 35];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' => strtotime('2022-08-29  02:20'), 'count'=> 30];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' =>  strtotime('2022-08-29  02:25'), 'count'=> 60];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' => strtotime('2022-08-29  02:30'), 'count'=> 100];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' => strtotime('2022-08-29  02:35'), 'count'=> 95];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' => strtotime('2022-08-29  02:40'), 'count'=> 70];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' => strtotime('2022-08-29  02:45'), 'count'=> 80];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' => strtotime('2022-08-29  02:50'), 'count'=> 50];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' => strtotime('2022-08-29  02:55'), 'count'=> 55];
        Redis::Rpush($cacheKey, json_encode($data));

        $data = ['time' => strtotime('2022-08-29  03:00'), 'count'=> 85];
        Redis::Rpush($cacheKey, json_encode($data));
    }
}