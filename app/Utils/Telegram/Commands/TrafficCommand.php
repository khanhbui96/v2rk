<?php

namespace App\Utils\Telegram\Commands;

use App\Models\Plan;
use App\Models\User;
use App\Utils\Helper;
use Telegram\Bot\Commands\Command;

class TrafficCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "traffic";

    /**
     * @var string Command Description
     */
    protected $description = "Xem thông tin lưu lượng sử dụng";


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
            $message = 'Không tìm thấy thông tin người dùng của bạn, vui lòng liên kết trước khi sử dụng';
        } else {
            /**
             * @var Plan $plan
             */
            $plan = $user->plan();
            if ($plan === null || $user->isExpired()) {
                $message = 'Xin lỗi, không thể tìm thấy đăng ký hợp lệ của bạn, vui lòng đăng nhập vào trang web để kiểm tra trạng thái tài khoản của bạn';
            } else {
                $transferEnableValue = Helper::trafficConvert($plan->getAttribute(Plan::FIELD_TRANSFER_ENABLE_VALUE));
                $up = Helper::trafficConvert($user->getAttribute(User::FIELD_U));
                $down = Helper::trafficConvert($user->getAttribute(User::FIELD_D));
                $remaining = Helper::trafficConvert($plan->getAttribute(Plan::FIELD_TRANSFER_ENABLE_VALUE) - ($user->getAttribute(User::FIELD_U) + $user->getAttribute(User::FIELD_D)));
                $message = "🚥Lưu lượng sử dụng\n———————————————\nLưu lượng giới hạn：`$transferEnableValue`\nLưu lượng tải lên：`$up`\nLưu lượng tải xuống：`$down`\nLưu lượng còn lại：`$remaining`";
            }
        }

        $this->replyWithMessage([
            'text' => $message,
            'parse_mode' => 'Markdown'
        ]);
    }
}