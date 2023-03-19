<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class StatController extends Controller
{
    /**
     * overview
     *
     * @return ResponseFactory|Response
     */
    public function overview()
    {
        return response([
            'data' => [
                'month_income' => Order::sumMonthIncome(),
                'month_register_total' => User::countMonthRegister(),
                'ticket_pending_total' => Ticket::countTicketPending(),
                'commission_pending_total' => Order::countCommissionPending(),
                'day_income' => Order::sumDayIncome(),
                'last_month_income' => Order::sumLastMonthIncome()
            ]
        ]);
    }
}