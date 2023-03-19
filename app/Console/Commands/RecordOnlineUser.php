<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Utils\CacheKey;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\Console\Output\ConsoleOutput;


class RecordOnlineUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'record:onlineUser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '记录在线用户数据';

    const MAX_COUNT = 2048;

    /**
     * @var ConsoleOutput
     */
    private $_out;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->_out = new ConsoleOutput();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $curMin = (int)date('i', time());
        if ($curMin % 5 === 0) {
            $this->_record();
        }
        return 0;
    }


    private function _record()
    {
        $cacheKey = CacheKey::get(CacheKey::STATS_USER_ONLINE, self::MAX_COUNT);
        $count = User::countOnlineUsers();
        if (Redis::llen($cacheKey) === self::MAX_COUNT) {
            Redis::lpop($cacheKey);
        }
        Redis::rpush($cacheKey, json_encode(['time' => time(), 'count' => $count]));
    }
}