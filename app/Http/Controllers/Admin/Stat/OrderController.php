<?php

namespace App\Http\Controllers\Admin\Stat;

use App\Http\Controllers\Controller;
use App\Models\OrderStat;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * order
     *
     * @return ResponseFactory|Response
     */
    public function overview()
    {
        $orderStats = OrderStat::where(OrderStat::FIELD_RECORD_TYPE, OrderStat::RECORD_TYPE_D)
            ->limit(31)
            ->orderBy(OrderStat::FIELD_RECORD_AT, "DESC")
            ->get();
        $result = [];

        /**
         * @var OrderStat $stat
         */
        foreach ($orderStats as $stat) {
            $date = date('m-d', $stat->getAttribute(OrderStat::FIELD_RECORD_AT));
            array_push($result, [
                'type' => '收款金额',
                'date' => $date,
                'value' => $stat->getAttribute(OrderStat::FIELD_ORDER_AMOUNT) / 100
            ]);

            array_push($result, [
                'type' => '收款笔数',
                'date' => $date,
                'value' => $stat->getAttribute(OrderStat::FIELD_ORDER_COUNT)
            ]);

            array_push($result, [
                'type' => '佣金金额',
                'date' => $date,
                'value' => $stat->getAttribute(OrderStat::FIELD_COMMISSION_AMOUNT) / 100
            ]);

            array_push($result, [
                'type' => '佣金笔数',
                'date' => $date,
                'value' => $stat->getAttribute(OrderStat::FIELD_COMMISSION_COUNT)
            ]);
        }
        return response([
            'data' => array_reverse($result)
        ]);
    }

}