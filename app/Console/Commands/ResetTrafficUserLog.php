<?php

namespace App\Console\Commands;

use App\Models\TrafficUserLog;
use Illuminate\Console\Command;
use Symfony\Component\Console\Output\ConsoleOutput;

class ResetTrafficUserLog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:trafficUserLog';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '用户流量日志重置';

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
     * @return void
     */
    public function handle()
    {
        TrafficUserLog::truncate();
        $this->_out->writeln("success");
    }
}