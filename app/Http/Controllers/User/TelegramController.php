<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api;
use Telegram\Bot\Exceptions\TelegramResponseException;
use Telegram\Bot\Exceptions\TelegramSDKException;


class TelegramController extends Controller
{
    public function getBotInfo()
    {
        $token = config('v2board.telegram_bot_token');

        try {
            $telegramAPI = new Api($token, false);
            $result = $telegramAPI->getMe();
        } catch (TelegramResponseException $e) {
            Log::warning($e->getMessage());
            return "user has been blocked!";
        } catch (TelegramSDKException $e) {
            abort(500, $e->getMessage());
        }

        return response([
            'data' => [
                'username' => $result->username
            ]
        ]);
    }
}