<?php

namespace App\Services;

use App\Jobs\SendEmailJob;
use App\Jobs\SendTelegramJob;
use App\Models\Order;
use App\Models\Plan;
use App\Models\Ticket;
use App\Models\TicketMessage;
use App\Models\User;
use App\Utils\CacheKey;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class NoticeService
{
    /**
     * 提醒用户流量
     * @param User $user
     *
     * @return void
     */
    public static function remindTraffic(User $user)
    {
        $remindTraffic = $user->getAttribute(User::FIELD_REMIND_TRAFFIC);
        if ($remindTraffic == 0) {
            return;
        }

        $u = $user->getAttribute(User::FIELD_U);
        $d = $user->getAttribute(User::FIELD_D);

        /**
         * @var Plan $plan
         */
        $plan = $user->plan();
        if ($plan === null) {
            return;
        }

        $transferEnableValue = $user->getAttribute(Plan::FIELD_TRANSFER_ENABLE_VALUE);
        if (!self::_remindTrafficIsWarnValue(($u + $d), $transferEnableValue)) {
            return;
        }

        $userId = $user->getAttribute(User::FIELD_ID);
        $flag = CacheKey::get(CacheKey::LAST_SEND_EMAIL_REMIND_TRAFFIC, $userId);

        if (Cache::get($flag)) {
            return;
        }

        $cacheExpireTTL = 24 * 3600;
        if (!Cache::put($flag, 1, $cacheExpireTTL)) {
            return;
        }

        SendEmailJob::dispatch([
            'email' => $user->getAttribute(User::FIELD_EMAIL),
            'subject' => __('The traffic usage in :app_name has reached 80%', [
                'app_name' => config('v2board.app_name', 'V2board')
            ]),
            'template_name' => 'remindTraffic',
            'template_value' => [
                'name' => config('v2board.app_name', 'V2Board'),
                'url' => config('v2board.app_url')
            ]
        ]);
    }


    /**
     * remind expire
     *
     * @param User $user
     */
    public static function remindExpire(User $user)
    {
        $userExpiredAt = $user->getAttribute(User::FIELD_EXPIRED_AT);
        if ($userExpiredAt !== NULL && ($userExpiredAt - 86400) < time() && $userExpiredAt > time()) {
            SendEmailJob::dispatch([
                'email' => $user->getAttribute(User::FIELD_EMAIL),
                'subject' => __('The service in :app_name is about to expire', [
                    'app_name' => config('v2board.app_name', 'V2board')
                ]),
                'template_name' => 'remindExpire',
                'template_value' => [
                    'name' => config('v2board.app_name', 'V2Board'),
                    'url' => config('v2board.app_url')
                ]
            ]);
        }
    }


    /**
     * ticket notify for user
     *
     * @param Ticket $ticket
     * @param TicketMessage $ticketMessage
     *
     * @return void
     */
    public static function ticketNotifyToUser(Ticket $ticket, TicketMessage $ticketMessage)
    {
        $userId = $ticket->getAttribute(Ticket::FIELD_USER_ID);
        $user = User::find($userId);
        if ($user === null) {
            return;
        }

        $cacheKey = 'ticket_notify_' . $userId;
        $userEmail = $user->getAttribute(User::FIELD_EMAIL);

        if (!Cache::get($cacheKey)) {
            Cache::put($cacheKey, 1, 1800);
            $subject = __("Your ticket received a reply on :website", ['website' => config('v2board.app_name', 'V2Board')]);
            $ticketSubject = __("Subject: :subject", ["subject" => $ticket->getAttribute(Ticket::FIELD_SUBJECT)]);
            $ticketReplyContent = __("reply content: :content", ["content" => $ticketMessage->getAttribute(TicketMessage::FIELD_MESSAGE)]);
            $content = "$ticketSubject \r\n $ticketReplyContent";
            SendEmailJob::dispatch([
                'email' => $userEmail,
                'subject' => $subject,
                'template_name' => 'notify',
                'template_value' => [
                    'name' => config('v2board.app_name', 'V2Board'),
                    'url' => config('v2board.app_url'),
                    'content' => $content
                ]
            ]);
        }
    }


    /**
     * ticket notify for admin
     *
     * @param Ticket $ticket
     * @param TicketMessage $ticketMessage
     * @return void
     */
    public static function ticketNotifyToAdmin(Ticket $ticket, TicketMessage $ticketMessage)
    {
        if (!config('v2board.telegram_bot_enable', 0)) {
            return;
        }

        $subject = $ticket->getAttribute(Ticket::FIELD_SUBJECT);
        $content = Str::limit($ticketMessage->getAttribute(TicketMessage::FIELD_MESSAGE));
        $message = "📮Thông báo hỗ trợ #{$ticket->getKey()}\n———————————————\nChủ đề：\n`$subject`\nNội dung：\n`$content`";
        SendTelegramJob::generateJobWithAdminMessages($message, true);
    }


    /**
     *  Node walled status notification to administrator
     *
     * @param int $walledNodesTotal
     * @param array $walledMessages
     */
    public static function nodeGFWNotifyToAdmin(int $walledNodesTotal, array $walledMessages)
    {
        if (!config('v2board.telegram_bot_enable', 0)) {
            return;
        }

        $message = "🧱Kiểm tra máy chủ：\n Máy chủ{$walledNodesTotal} đang bị GFW quét，vui lòng kiểm tra ngay: \n" . join("\n", $walledMessages);
        SendTelegramJob::generateJobWithAdminMessages($message);
    }


    /**
     * Node offline status notification to administrators
     *
     * @param int $faultNodesTotal
     * @param array $faultNodes
     */
     public static function nodeOfflineNotifyToAdmin(int $faultNodesTotal, array $faultNodes)
    {
        if (!config('v2board.telegram_bot_enable', 0)) {
            return;
        }
        $message = "📮Hãy kiểm tra máy chủ：\n Máy chủ {$faultNodesTotal} không hoạt động，vui lòng kiểm tra ngay lập tức: \n" . join("\n", $faultNodes);
        SendTelegramJob::generateJobWithAdminMessages($message);
    }


    /**
     * Email delivery failure notification to administrator
     *
     * @param int $faultEmailCount
     * @param string $latestLogError
     */
    public static function emailFailureNotifyAdmin(int $faultEmailCount, string $latestLogError)
    {
        if (!config('v2board.telegram_bot_enable', 0)) {
            return;
        }

        $message = "📮Thông báo gửi email thất bại：\n Không gửi được {$faultEmailCount} email trong nửa giờ qua, vui lòng kiểm tra ngay:\n ```$latestLogError```";
        SendTelegramJob::generateJobWithAdminMessages($message);
    }


    /**
     * suspend notify for user
     *
     * @param User $user
     * @param int $recoveryTime
     * @return void
     */
    public static function suspendNotifyToUser(User $user, int $recoveryTime)
    {
        $content = sprintf(
            "Hệ thống phát hiện bạn đang sử dụng VPN cho mục đích không tốt, Để duy trì tính ổn định cho hệ thống, tài khoản của bạn tạm thời sẽ bị khóa, trong khoản thời gian này bạn không thể truy cập VPN, thời gian mở khóa: %s",
            date('d-m-Y H:i:s', $recoveryTime)
        );
        $subject = config('v2board.app_name', 'V2Board') . " - Thông báo tạm khóa tài khoản";
        SendEmailJob::dispatch([
            'email' => $user->getAttribute(User::FIELD_EMAIL),
            'subject' => $subject,
            'template_name' => 'notify',
            'template_value' => [
                'name' => config('v2board.app_name', 'V2Board'),
                'url' => config('v2board.app_url'),
                'content' => $content
            ]
        ]);

        $telegramId = (int)$user->getAttribute(User::FIELD_TELEGRAM_ID);
        if ($telegramId === 0) {
            return;
        }
        $message = "🚨 $content \n";
        SendTelegramJob::dispatch($telegramId, $message);
    }


    /**
     * 支付通知管理员
     *
     * @param Order $order
     * @param User $user
     *
     * @return void
     */
    public static function paymentNotifyToAdmin(Order $order, User $user): void
    {
        if (!config('v2board.telegram_bot_enable', 0)) {
            return;
        }
        //通知
        $message = sprintf(
            "💰 Thanh toán thành công %s\n———————————————\nMã đơn hàng：%s\n———————————————\nEmail khách hàng: %s\n",
            $order->getAttribute(Order::FIELD_TOTAL_AMOUNT) / 100,
            $order->getAttribute(Order::FIELD_TRADE_NO),
            $user->getAttribute(User::FIELD_EMAIL)
        );
        SendTelegramJob::generateJobWithAdminMessages($message);
    }



    /**
     * 支付通知用户
     *
     * @param Order $order
     * @param User $user
     *
     * @return void
     */
    public static function paymentNotifyToUser(Order $order, User $user): void
    {
        $content = sprintf(
            "✨ Cảm ơn bạn đã thanh toán %s đồng, đơn hàng sẽ được  xử lý từ 1-3 phút\n———————————————\nMã đơn hàng: %s",
            $order->getAttribute(Order::FIELD_TOTAL_AMOUNT) / 100,
            $order->getAttribute(Order::FIELD_TRADE_NO)
        );
        $subject = config('v2board.app_name', 'V2Board') . "Thông báo thanh toán thành công";
        SendEmailJob::dispatch([
            'email' => $user->getAttribute(User::FIELD_EMAIL),
            'subject' => $subject,
            'template_name' => 'notify',
            'template_value' => [
                'name' => config('v2board.app_name', 'V2Board'),
                'url' => config('v2board.app_url'),
                'content' => $content
            ]
        ]);

        $telegramId = (int)$user->getAttribute(User::FIELD_TELEGRAM_ID);
        if ($telegramId === 0) {
            return;
        }
        $message = sprintf(
            "✨ Cảm ơn bạn đã thanh toán thành công đơn hàng giá %s đồng, đơn hàng sẽ được kích hoạt từ 1-3 phút\n———————————————\nMã đơn hàng: %s",
            $order->getAttribute(Order::FIELD_TOTAL_AMOUNT) / 100,
            $order->getAttribute(Order::FIELD_TRADE_NO)
        );
        SendTelegramJob::dispatch($telegramId, $message);
    }

    /**
     * 计算流量是否到了警戒值
     *
     * @param $ud
     * @param $transfer_enable
     * @return bool
     */
    private static function _remindTrafficIsWarnValue($ud, $transfer_enable): bool
    {
        if (!$ud) {
            return false;
        }

        if (!$transfer_enable) {
            return false;
        }

        $percentage = ($ud / $transfer_enable) * 100;

        if ($percentage < 80) {
            return false;
        }
        if ($percentage >= 100) return false;
        return true;
    }
}