<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\InviteCode;
use App\Models\Order;
use App\Models\User;
use App\Utils\Helper;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InviteController extends Controller
{
    /**
     * save
     *
     * @param Request $request
     * @return ResponseFactory|Response
     */
    public function save(Request $request)
    {
        $sessionId = $request->session()->get('id');
        /**
         * @var User $user
         */
        $user = User::find($sessionId);
        if ($user === null) {
            abort(500, __('The user does not exist'));
        }

        $inviteCodesCount = $user->countUnusedInviteCodes();
        $inviteGenLimit = config('v2board.invite_gen_limit', 5);


        if ($inviteCodesCount >= $inviteGenLimit) {
            abort(500, __('The maximum number of creations has been reached'));
        }
        $inviteCode = new InviteCode();
        $inviteCode->setAttribute(InviteCode::FIELD_USER_ID, $sessionId);
        $inviteCode->setAttribute(InviteCode::FIELD_CODE, Helper::randomChar(8));
        return response([
            'data' => $inviteCode->save()
        ]);
    }

    /**
     * details
     *
     * @param Request $request
     * @return ResponseFactory|Response
     */
    public function details(Request $request)
    {
        $sessionId = $request->session()->get('id');
        $reqCurrent = (int)$request->input('current') ? $request->input('current') : 1;
        $reqPageSize = (int)$request->input('pageSize') >= 10 ? $request->input('pageSize') : 10;

        /**
         * @var User $user
         */
        $user = User::find($sessionId);
        if ($user === null) {
            abort(500, __('The user does not exist'));
        }

        $inviteOrderModal = Order::where(Order::FIELD_INVITE_USER_ID, $user->getKey())
            ->select([
                Order::FIELD_ID,
                Order::FIELD_TOTAL_AMOUNT,
                Order::FIELD_COMMISSION_RATE,
                Order::FIELD_COMMISSION_BALANCE,
                Order::FIELD_COMMISSION_STATUS,
                Order::FIELD_CREATED_AT,
                Order::FIELD_UPDATED_AT
            ])
            ->where(Order::FIELD_COMMISSION_BALANCE, '>', 0)
            ->whereIn(Order::FIELD_STATUS, [Order::STATUS_COMPLETED]);


        $total = $inviteOrderModal->count();
        $res = $inviteOrderModal->forPage($reqCurrent, $reqPageSize)->get();

        return response([
            'data' => $res,
            'total' => $total
        ]);
    }

    /**
     * fetch
     *
     * @param Request $request
     * @return ResponseFactory|Response
     */
    public function fetch(Request $request)
    {
        $sessionId = $request->session()->get('id');
        /**
         * @var User $user
         */
        $user = User::find($sessionId);
        if ($user === null) {
            abort(500, __('The user does not exist'));
        }

        $unUsedCodes = $user->getUnusedInviteCodes();
        $defaultCommissionRate = config('v2board.invite_commission', 10);
        $commissionRate = $user->getAttribute(User::FIELD_COMMISSION_RATE) ?: $defaultCommissionRate;


        $stat = [
            //已注册用户数
            $user->countInvitedUsers(),
            //有效的佣金
            $user->statCommissionBalance(Order::STATUS_COMPLETED, Order::COMMISSION_STATUS_VALID),
            //确认中的佣金
            $user->statCommissionBalance(Order::STATUS_COMPLETED, Order::COMMISSION_STATUS_NEW),
            //佣金比例
            (int)$commissionRate,
            //可用佣金
            (int)$user->getAttribute(User::FIELD_COMMISSION_BALANCE)
        ];

        return response([
            'data' => [
                'codes' => $unUsedCodes,
                'stat' => $stat
            ]
        ]);
    }
}