<?php

namespace App\Console\Commands;

use App\Models\Plan;
use Illuminate\Console\Command;
use Symfony\Component\Console\Output\ConsoleOutput;

class RepairPlan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'repair:plan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '修复订阅数据';


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
        $this->_repairPlanTransEnableValue();
        return 0;
    }


    /**
     * repair price name
     */
    private function _repairPlanTransEnableValue()
    {
        //根据用户有效期置换订单日
        $pageSize = 100;
        $planModel = Plan::where(Plan::FIELD_ID, '>', 0);
        $count = $planModel->count();
        $page = 1;
        $pageTotal = intval(ceil($count / $pageSize));
        $this->_out->writeln("total plan: " . $count);
        while ($page <= $pageTotal) {
            $plans = $planModel->forPage($page, $pageSize)->get();
            foreach ($plans as $plan) {
                /**
                 * @var Plan $plan
                 */
                $transferEnable = (int)$plan->getAttribute(Plan::FIELD_TRANSFER_ENABLE);
                if ($transferEnable > 0) {
                    $transferEnableValue = $transferEnable * 1024 * 1024 * 1024;
                    $plan->setAttribute(Plan::FIELD_TRANSFER_ENABLE_VALUE, $transferEnableValue);
                    $plan->save();
                }
            }
            $page++;
        }
        $this->_out->writeln("success");
    }

}