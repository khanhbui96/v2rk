<?php

namespace App\Utils\Telegram\Commands;

use App\Models\User;
use Illuminate\Support\Str;
use Telegram\Bot\Commands\Command;

class BindCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "bind";

    /**
     * @var string Command Description
     */
    protected $description = "Liên kết tài khoản telegram";

    /**
     * @var string   Command Argument Pattern
     */
    protected $pattern = '.*+';

    /**
     * @inheritdoc
     */
    public function handle()
    {
        $subscribeURL = $this->arguments['custom'] ?? '';

        if (empty($subscribeURL)) {
            $this->replyWithMessage(['text' => 'Thông số sai, vui lòng gửi kèm theo link liên kết tài khoản']);
            return;
        }

        $url = parse_url($subscribeURL);
        $token = null;
         if (!empty($url['query'])) {
             parse_str($url['query'], $query);
             $token = $query['token'];
         } else {
             $paths = explode('/', $url['path']);
             if (count($paths) === 5)  {
                 $token = $paths[4];
             }
        }

        if ($token === null) {
            $this->replyWithMessage(['text' => 'Link liên kết không hợp lệ']);
            return;
        }

        /**
         * @var User $user
         */
        $user = User::findByToken($token);
        if ($user === null) {
            $this->replyWithMessage(['text' => 'Người dùng không tồn tại']);
            return;
        }

        if ($user->getAttribute(User::FIELD_TELEGRAM_ID)) {
            $this->replyWithMessage(['text' => 'Liên kết tài khoản thành công']);
            return;
        }

        $user->setAttribute(User::FIELD_TELEGRAM_ID, $this->getUpdate()->getChat()->id);
        if (!$user->save()) {
            $this->replyWithMessage(['text' => 'Thiết lập không thành công']);
            return;
        }

        $this->replyWithMessage(['text' => 'Liên kết thành công']);
    }
}