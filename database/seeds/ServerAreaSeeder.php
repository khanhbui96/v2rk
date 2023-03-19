<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServerAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('server_area')->truncate();
        DB::table('server_area')->from(1);
        DB::table('server_area')->insert([
            [
                'flag' => '🇭🇰',
                'country' => '中国',
                'country_code' => 'CN',
                'city' => '香港',
                'lat' => 22.26,
                'lng' => 114.08,
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'flag' => '🇨🇳',
                'country' => '中国',
                'country_code' => 'CN',
                'city' => '台北',
                'lat' => 25.02,
                'lng' => 121.38,
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'flag' => '🇺🇸',
                'country' => '美国',
                'country_code' => 'US',
                'city' => '洛杉矶',
                'lat' => 34.05,
                'lng' => -118.22,
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'flag' => '🇺🇸',
                'country' => '美国',
                'country_code' => 'US',
                'city' => '西雅图',
                'lat' => 47.38,
                'lng' => -122.2,
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'flag' => '🇺🇸',
                'country' => '美国',
                'country_code' => 'US',
                'city' => '芝加哥',
                'lat' => 41.51,
                'lng' => -87.41,
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'flag' => '🇺🇸',
                'country' => '美国',
                'country_code' => 'US',
                'city' => '达拉斯',
                'lat' => 32.47,
                'lng' => -96.47,
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'flag' => '🇰🇷',
                'country' => '韩国',
                'country_code' => 'KR',
                'city' => '首尔',
                'lat' => 37.35,
                'lng' => 127.03,
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'flag' => '🇯🇵',
                'country' => '日本',
                'country_code' => 'JP',
                'city' => '东京',
                'lat' => 35.41,
                'lng' => 139.44,
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'flag' => '🇯🇵',
                'country' => '日本',
                'country_code' => 'JP',
                'city' => '大板',
                'lat' => 34.4,
                'lng' => 135.3,
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'flag' => '🇸🇬',
                'country' => '新加坡',
                'country_code' => 'SG',
                'city' => '',
                'lat' => 1.22,
                'lng' => 103.45,
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'flag' => '🇻🇳',
                'country' => '越南',
                'country_code' => 'VN',
                'city' => '河内',
                'lat' => 21.01,
                'lng' => 105.53,
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'flag' => '🇻🇳',
                'country' => '越南',
                'country_code' => 'VN',
                'city' => '胡志明',
                'lat' => 10.46,
                'lng' => 106.43,
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'flag' => '🇷🇺',
                'country' => '俄罗斯',
                'country_code' => 'RU',
                'city' => '莫斯科',
                'lat' => 55.45,
                'lng' => 37.37,
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'flag' => '🇬🇧',
                'country' => '英国',
                'country_code' => 'GB',
                'city' => '伦敦',
                'lat' => 51.3,
                'lng' => -0.07,
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'flag' => '🇮🇳',
                'country' => '印度',
                'country_code' => 'IN',
                'city' => '新德里',
                'lat' => 28.37,
                'lng' => 77.13,
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'flag' => '🇦🇪',
                'country' => '阿联酋',
                'country_code' => 'AE',
                'city' => '迪拜',
                'lat' => 25.13,
                'lng' => 55.17,
                'created_at' => time(),
                'updated_at' => time(),
            ],

        ]);
    }
}