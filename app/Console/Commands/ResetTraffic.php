<?php

namespace App\Console\Commands;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Console\Command;
use Symfony\Component\Console\Output\ConsoleOutput;

class ResetTraffic extends Command
{
    protected $builder;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:traffic';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '流量清空';
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
        $this->builder = User::where(User::FIELD_EXPIRED_AT, '>', time());
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        ini_set('memory_limit', -1);
        $systemResetTrafficMethod = config('v2board.reset_traffic_method', 0);
        $this->_out->writeln("reset common traffic method: " . $systemResetTrafficMethod);

        $plans = Plan::all();
        $this->_out->writeln("reset plans count: " . count($plans));

        foreach ($plans as $plan) {
            $resetTrafficMethod = $plan->getAttribute(Plan::FIELD_RESET_TRAFFIC_METHOD);
            $planId = $plan->getKey();
            $this->_out->writeln("plan: " . $planId . ", reset method: " . ($resetTrafficMethod ?? 'system'));

            if ($resetTrafficMethod === null) {
                $resetTrafficMethod = $systemResetTrafficMethod;
            }
            if ($resetTrafficMethod === Plan::RESET_TRAFFIC_METHOD_MONTH_FIRST_DAY) {
                $this->_resetByMonthFirstDay($planId);
            } else if ($resetTrafficMethod === Plan::RESET_TRAFFIC_METHOD_ORDER_DAY) {
                $this->_resetByOrderDay($planId);
            } else if ($resetTrafficMethod === Plan::RESET_TRAFFIC_METHOD_EVERY_DAY) {
                $this->_resetByEveryDay($planId);
            } else {
                $this->_out->writeln("not reset");
            }
        }
    }

    /**
     * reset by month first day
     * @param $planId
     */
    private function _resetByMonthFirstDay($planId): void
    {
        $builder = clone($this->builder);
        $builder = $builder->where(User::FIELD_PLAN_ID, $planId);

        if ((string)date('d') === '01') {
            $result = $builder->update([
                'u' => 0,
                'd' => 0
            ]);
            $this->_out->writeln("updated count: " . $result);
        }
    }

    /**
     * reset by order day
     *
     * @param $planId
     */
    private function _resetByOrderDay($planId): void
    {
        $builder = clone($this->builder);
        $builder = $builder->where(User::FIELD_PLAN_ID, $planId);

        $lastDay = date('d', strtotime('last day of +0 months'));
        $users = [];
        /**
         * @var User $item
         */
        foreach ($builder->get() as $item) {
            $orderDay = (int)$item->getAttribute(User::FIELD_ORDER_DAY);
            $today = (int)date('d');
            if ($orderDay === $today) {
                array_push($users, $item->id);
            }

            if (($today === 1) && $orderDay >= $lastDay) {
                array_push($users, $item->id);
            }
        }
        $result = User::whereIn('id', $users)->update([
            'u' => 0,
            'd' => 0
        ]);
        $this->_out->writeln("updated count: " . $result);
    }

    /**
     * reset by every day
     *
     * @param $planId
     */
    private function _resetByEveryDay($planId): void
    {
        $builder = clone($this->builder);
        $builder = $builder->where(User::FIELD_PLAN_ID, $planId);
        $result = $builder->update([
            'u' => 0,
            'd' => 0
        ]);
        $this->_out->writeln("updated count: " . $result);
    }
}