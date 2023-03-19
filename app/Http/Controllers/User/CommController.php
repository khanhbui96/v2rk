<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Utils\Dict;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class CommController extends Controller
{
    /**
     * profile config
     *
     * @return ResponseFactory|Response
     */
    public function profileConfig()
    {
        return response([
            'data' => [
                'is_telegram' => (int)config('v2board.telegram_bot_enable', 0),
                'telegram_discuss_link' => config('v2board.telegram_discuss_link'),
                'withdraw_methods' => config('v2board.commission_withdraw_method', Dict::WITHDRAW_METHOD_WHITELIST_DEFAULT),
                'recharge_close' => (int)config('v2board.recharge_close', 0),
                'withdraw_close' => (int)config('v2board.withdraw_close', 0),
                'transfer_balance_close' => (int)config('v2board.transfer_balance_close', 0),
                'min_recharge_amount' => (int)config('v2board.min_recharge_amount', 10000),
                'max_recharge_amount' => (int)config('v2board.max_recharge_amount', 1000),
            ]
        ]);
    }

    /**
     * invite config
     *
     * @return ResponseFactory|Response
     */
    public function inviteConfig()
    {
        return response([
            'data' => [
                'invite_gen_limit' => (int)config('v2board.invite_gen_limit', 0)
            ]
        ]);
    }

}