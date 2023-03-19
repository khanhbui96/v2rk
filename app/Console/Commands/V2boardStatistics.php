<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\OrderStat;
use Illuminate\Console\Command;
use Symfony\Component\Console\Output\ConsoleOutput;

class V2boardStatistics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'v2board:statistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '统计任务';
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
        $this->_out = new ConsoleOutput();
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->_statOrder();
    }

    /**
     * stat order
     */
    private function _statOrder()
    {
        $endAt = strtotime(date('Y-m-d'));
        $startAt = strtotime('-1 day', $endAt);
        $builder = Order::where(Order::FIELD_PAID_AT, '>=', $startAt)
            ->where(Order::FIELD_PAID_AT, '<', $endAt)
            ->whereNotIn(Order::FIELD_STATUS, [Order::STATUS_UNPAID, Order::STATUS_CANCELLED]);
        $orderCount = $builder->count();
        $orderAmount = $builder->sum('total_amount');
        $this->_out->writeln("order count: " . $orderCount);
        $this->_out->writeln("order amount: " . $orderAmount);

        $builder = $builder->where(Order::FIELD_COMMISSION_BALANCE, '!=', 0);
        $commissionCount = $builder->count();
        $commissionAmount = $builder->sum(Order::FIELD_COMMISSION_BALANCE);

        $this->_out->writeln("order commission count: " . $commissionCount);
        $this->_out->writeln("order commission amount: " . $commissionAmount);

        /**
         * @var OrderStat $stat
         */
        $orderStat = OrderStat::where(OrderStat::FIELD_RECORD_AT, $startAt)
            ->where(OrderStat::FIELD_RECORD_TYPE, OrderStat::RECORD_TYPE_D)
            ->first();

        if ($orderStat === null) {
            $this->_out->writeln("order stat record not found");
            $orderStat = new OrderStat();
            $orderStat->setAttribute(OrderStat::FIELD_RECORD_TYPE, OrderStat::RECORD_TYPE_D);
            $orderStat->setAttribute(OrderStat::FIELD_RECORD_AT, $startAt);
        }

        $orderStat->setAttribute(OrderStat::FIELD_ORDER_COUNT, $orderCount);
        $orderStat->setAttribute(OrderStat::FIELD_ORDER_AMOUNT, $orderAmount);
        $orderStat->setAttribute(OrderStat::FIELD_COMMISSION_COUNT, $commissionCount);
        $orderStat->setAttribute(OrderStat::FIELD_COMMISSION_AMOUNT, $commissionAmount);

        if (!$orderStat->save()) {
            $this->_out->writeln("order stats save failed");
        } else {
            $this->_out->writeln("order status save success");
        }
    }
}