<?php

namespace App\Console\Commands;

use App\Models\TrafficServerLog;
use Illuminate\Console\Command;
use Symfony\Component\Console\Output\ConsoleOutput;

class RepairTrafficServerLog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'repair:trafficServerLog';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '修复节点流量日志数据';


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
        $this->_repairUniqueId();
        return 0;
    }


    /**
     * repair price name
     */
    private function _repairUniqueId()
    {
        //根据用户有效期置换订单日
        $pageSize = 100;
        $model = TrafficServerLog::where(TrafficServerLog::FIELD_ID, '>', 0);
        $count = $model->count();
        $page = 1;
        $pageTotal = intval(ceil($count / $pageSize));
        $this->_out->writeln("total logs: " . $count);
        while ($page <= $pageTotal) {
            $logs = $model->forPage($page, $pageSize)->get();
            foreach ($logs as $log) {
                /**
                 * @var TrafficServerLog $log
                 */
                $serverId = (int)$log->getAttribute(TrafficServerLog::FIELD_SERVER_ID);
                $serverType = $log->getAttribute(TrafficServerLog::FIELD_SERVER_TYPE);
                $log->setAttribute(TrafficServerLog::FIELD_UNIQUE_ID, sprintf("%s-%d", $serverType, $serverId));
                $log->save();
            }
            $page++;
        }
        $this->_out->writeln("success");
    }

}