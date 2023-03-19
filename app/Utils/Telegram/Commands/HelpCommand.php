<?php

namespace App\Utils\Telegram\Commands;

use Telegram\Bot\Commands\HelpCommand as BaseHelperCommand;

class HelpCommand extends BaseHelperCommand
{
    /**
     * @var string Command Name
     */
    protected $name = "help";

    /**
     * @var string Command Description
     */
    protected $description = "Danh sách các lệnh cho bot";
}