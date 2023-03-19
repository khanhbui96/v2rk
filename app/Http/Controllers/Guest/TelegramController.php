<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Utils\Telegram\Commands\BindCommand;
use App\Utils\Telegram\Commands\HelpCommand;
use App\Utils\Telegram\Commands\LatestURLCommand;
use App\Utils\Telegram\Commands\ReplyTicketCommand;
use App\Utils\Telegram\Commands\SubLinkCommand;
use App\Utils\Telegram\Commands\TrafficCommand;
use App\Utils\Telegram\Commands\UnbindCommand;
use Illuminate\Http\Request;
use Telegram\Bot\Api;
use Telegram\Bot\Exceptions\TelegramResponseException;
use Telegram\Bot\Exceptions\TelegramSDKException;
use Illuminate\Support\Facades\Log;

class TelegramController extends Controller
{
    /**
     * TelegramController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        if ($request->input('access_token') !== md5(config('v2board.telegram_bot_token'))) {
            abort(401, 'authentication failed');
        }
    }


    /**
     * webhook
     *
     * @throws TelegramSDKException
     */
    public function webhook(): string
    {
        $token = config('v2board.telegram_bot_token');
        $telegram = new Api($token, false);

        $update = $telegram->getWebhookUpdate();

        if ($update->getMessage()->isNotEmpty()) {
            if ($update->getMessage()->replyToMessage) {
                $telegram->addCommands([
                    ReplyTicketCommand::class
                ]);
                $telegram->triggerCommand('replyTicket', $update);
            } else {

                try {
                    $telegram->addCommands([
                        HelpCommand::class,
                        BindCommand::class,
                        TrafficCommand::class,
                        LatestURLCommand::class,
                        SubLinkCommand::class,
                        UnbindCommand::class,
                    ]);
                    $telegram->commandsHandler(true);
                } catch (TelegramResponseException $e) {
                    Log::warning($e->getMessage());
                    return "user has been blocked!";
                }
            }
        }
        return "ok";
    }
}