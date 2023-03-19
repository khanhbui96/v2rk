<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api;
use Telegram\Bot\Exceptions\TelegramSDKException;


class SendTelegramJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    protected $telegramId;
    protected $text;

    public $tries = 3;
    public $timeout = 5;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $telegramId, string $text)
    {
        $this->onQueue('send_telegram');
        $this->telegramId = $telegramId;
        $this->text = $text;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $token = config('v2board.telegram_bot_token');
        try {
            $telegramAPI = new Api($token, false);
            $telegramAPI->sendMessage([
                'text' => $this->text,
                'chat_id' => $this->telegramId
            ]);
        } catch (TelegramSDKException $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * send message with admin users
     *
     * @param string $message
     * @param bool $includeStaff
     * @return int
     */
    public static function generateJobWithAdminMessages(string $message, bool $includeStaff = false): int
    {
        $adminUsers = User::findTelegramAdminUsers($includeStaff);
        $totalUsers = count($adminUsers);
        if (count($adminUsers) == 0) {
            return 0;
        }
        foreach ($adminUsers as $user) {
            self::dispatch($user->getAttribute(User::FIELD_TELEGRAM_ID), $message);
        }
        return $totalUsers;
    }
}