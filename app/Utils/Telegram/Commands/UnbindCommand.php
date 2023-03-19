<?php

namespace App\Utils\Telegram\Commands;

use App\Models\User;
use Telegram\Bot\Commands\Command;

class UnbindCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "unbind";

    /**
     * @var string Command Description
     */
    protected $description = "Huỷ liên kết với bot";


    /**
     * @inheritdoc
     */
    public function handle()
    {
        $chatId = $this->getUpdate()->getChat()->id;
        /**
         * @var User $user
         */
        $user = User::findByTelegramId($chatId);
        if ($user === null) {
            $this->triggerCommand('help');
            $message = 'Không tìm thấy thông tin người dùng, Hãy liên kêt tài khoản của bạn.';
        } else {
            $user->setAttribute(User::FIELD_TELEGRAM_ID, 0);
            if (!$user->save()) {
                abort(500, 'Huỷ liên kết không thành công');
            }
            $message = 'Huỷ liên kết thành công';
        }

        $this->replyWithMessage(['text' => $message]);
    }
}