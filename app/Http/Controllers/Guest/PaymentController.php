<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use App\Services\NoticeService;
use App\Services\PaymentService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    /**
     * @throws Exception
     */
    public function notify($method, $uuid, Request $request)
    {
        try {

            $payment = Payment::findByUUID($uuid);
            if ($payment === null) {
                throw new Exception("payment not found");
            }

            $paymentService = new PaymentService($method, $payment);
            $verify = $paymentService->notify($request->input());
            if (!$verify) {
                throw new Exception("verify error");
            }

            $tradeNo = $verify['trade_no'];
            $callbackNo = $verify['callback_no'];
            /**
             * @var Order $order
             */
            $order = Order::findByTradeNo($tradeNo);
            if ($order === null) {
                throw new Exception("order not found");
            }

            /**
             * @var User $user
             */
            $user = $order->user();
            if ($user === null) {
                throw new Exception("user not found");
            }


            if ($order->getAttribute(Order::FIELD_STATUS) !== Order::STATUS_UNPAID) {
                Log::error("invalid order status", ['order' => $order->toArray(), "verify" => $verify]);
                throw new Exception("invalid order status");
            }

            $order->setAttribute(Order::FIELD_PAID_AT, time());
            $order->setAttribute(Order::FIELD_STATUS, Order::STATUS_PENDING);
            $order->setAttribute(Order::FIELD_CALLBACK_NO, $callbackNo);

            if (!$order->save()) {
                throw new Exception("order save failed");
            }

            NoticeService::paymentNotifyToAdmin($order, $user);
            NoticeService::paymentNotifyToUser($order, $user);
        } catch (Exception $e) {
            Log::error($e);
            abort(500, 'fail: ' . $e->getMessage());
        }

        die($paymentService->customResult ?? 'success');
    }

}