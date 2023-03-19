<?php

namespace App\Console\Commands;

use Artisan;
use Illuminate\Console\Command;

class V2boardUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'v2board:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'v2board 更新';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('清除缓存。');
        Artisan::call('config:cache');
        $this->info('检查数据库更新。');
        Artisan::call('migrate');
        $this->info('更新完毕，请重新启动队列服务。');
    }
}