<?php

namespace App\Utils\Telegram\Commands;

use Telegram\Bot\Commands\Command;

class LatestURLCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "latestURL";

    /**
     * @var string Command Description
     */
    protected $description = "Nhận thông tin mới nhất về địa chỉ truy cập";


    /**
     * @inheritdoc
     */
    public function handle()
    {
        $text = sprintf(
            "URL truy cập mới nhất：%s",
            config('v2board.app_url')
        );

        $this->replyWithMessage([
            'text' => $text,
            'parse_mode' => 'Markdown'
        ]);
    }
}