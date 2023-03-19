<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;
use Symfony\Component\Console\Output\ConsoleOutput;

class RepairOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'repair:order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '修复订单数据';


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
        $this->_repairPriceName();
        return 0;
    }


    /**
     * repair price name
     */
    private function _repairPriceName()
    {
        //根据用户有效期置换订单日
        Order::where(Order::FIELD_PRICE_NAME, "month_price")->update([Order::FIELD_PRICE_NAME => '月付']);
        Order::where(Order::FIELD_PRICE_NAME, "quarter_price")->update([Order::FIELD_PRICE_NAME => '季付']);
        Order::where(Order::FIELD_PRICE_NAME, "half_year_price")->update([Order::FIELD_PRICE_NAME => '半年付']);
        Order::where(Order::FIELD_PRICE_NAME, "year_price")->update([Order::FIELD_PRICE_NAME => '年付']);
        Order::where(Order::FIELD_PRICE_NAME, "two_year_price")->update([Order::FIELD_PRICE_NAME => '两年付']);
        Order::where(Order::FIELD_PRICE_NAME, "three_year_price")->update([Order::FIELD_PRICE_NAME => '三年付']);
        Order::where(Order::FIELD_PRICE_NAME, "onetime_price")->update([Order::FIELD_PRICE_NAME => '一次性']);
        Order::where(Order::FIELD_PRICE_NAME, "reset_price")->update([Order::FIELD_PRICE_NAME => '重置流量包']);
        $this->_out->writeln("success");
    }

}