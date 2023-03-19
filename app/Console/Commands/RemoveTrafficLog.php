<?php

namespace App\Console\Commands;

use App\Models\TrafficServerLog;
use App\Models\TrafficUserLog;
use Illuminate\Console\Command;
use Symfony\Component\Console\Output\ConsoleOutput;

class RemoveTrafficLog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:traffic_log';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '删除流量日志数据(数据保存一年)';


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
    public function handle()
    {
        TrafficUserLog::where(TrafficUserLog::FIELD_LOG_AT, '<', strtotime('-1 year 00:01', time()))->delete();
        TrafficServerLog::where(TrafficUserLog::FIELD_LOG_AT, '<', strtotime('-1 year 00:01', time()))->delete();
        $this->_out->writeln("success");
    }
}