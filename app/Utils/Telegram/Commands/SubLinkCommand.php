<?php

namespace App\Utils\Telegram\Commands;

use App\Models\Plan;
use App\Models\User;
use App\Utils\Helper;
use Telegram\Bot\Commands\Command;

class SubLinkCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "subLink";

    /**
     * @var string Command Description
     */
    protected $description = "Xem liên kết đăng ký";


    /**
     * @inheritdoc
     */
    public function handle()
    {
        $chatId = $this->getUpdate()->getChat()->id;
        /**
         * @var User $user
         */
        $user = User::where(User::FIELD_TELEGRAM_ID, $chatId)->first();
        if ($user === null) {
            $this->triggerCommand('help');
            $this->replyWithMessage([
                'text' => 'Không thể kiểm tra link đăng ký, vui lòng liên kết tài khoản',
            ]);
            return;
        }

        /**
         * @var Plan $plan
         */
        $plan = Plan::find($user->getAttribute(User::FIELD_PLAN_ID));
        if ($plan === null) {
            $this->replyWithMessage([
                'text' => 'Bạn chưa mua gói dịch vụ',
            ]);
            return;
        }

        $subscribe_url = Helper::getSubscribeUrl("/api/v1/client/subscribe?token={$user['token']}");
        $this->replyWithMessage([
            'text' => "✨Link liên kết của bạn： \n————————————\n$subscribe_url",
            'parse_mode' => 'Markdown'
        ]);
    }
}