<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ConfigSave;
use App\Utils\Dict;
use Artisan;
use Config;
use Exception;
use File;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Telegram\Bot\Api;
use Telegram\Bot\Exceptions\TelegramSDKException;


class ConfigController extends Controller
{
    /**
     * get email template
     *
     * @return ResponseFactory|Response
     */
    public function emailTemplate()
    {
        $path = resource_path('views/mail/');
        $files = array_map(function ($item) use ($path) {
            return str_replace($path, '', $item);
        }, glob($path . '*'));
        return response([
            'data' => $files
        ]);
    }

    public function getThemeTemplate()
    {
        $path = public_path('theme/');
        $files = array_map(function ($item) use ($path) {
            return str_replace($path, '', $item);
        }, glob($path . '*'));
        return response([
            'data' => $files
        ]);
    }


    /**
     * setTelegramWebhook
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     * @noinspection PhpUnused
     * @throws TelegramSDKException
     */
    public function setTelegramWebhook(Request $request)
    {
        $reqBotToken = $request->input('telegram_bot_token');
        $token = $reqBotToken ?? config('v2board.telegram_bot_token');

        try {
            $telegramAPI = new Api($token, false);
            $telegramAPI->setWebhook(['url' => url(
                '/api/v1/guest/telegram/webhook?access_token=' . md5($token)
            )]);
        } catch (TelegramSDKException $e) {
            abort(500, $e->getMessage());
        }
        return response([
            'data' => true
        ]);
    }

    /**
     * @return ResponseFactory|Response
     */
    public function fetch()
    {
        // TODO: default should be in Dict
        return response([
            'data' => [
                'invite' => [
                    'invite_force' => (int)config('v2board.invite_force', 0),
                    'invite_commission' => config('v2board.invite_commission', 10),
                    'invite_gen_limit' => config('v2board.invite_gen_limit', 5),
                    'invite_never_expire' => config('v2board.invite_never_expire', 0),
                    'commission_first_time_enable' => config('v2board.commission_first_time_enable', 1),
                    'commission_auto_check_enable' => config('v2board.commission_auto_check_enable', 1),
                    'commission_withdraw_limit' => config('v2board.commission_withdraw_limit', 100),
                    'commission_withdraw_method' => config('v2board.commission_withdraw_method', Dict::WITHDRAW_METHOD_WHITELIST_DEFAULT),
                    'recharge_close' => config('v2board.recharge_close', 0),
                    'withdraw_close' => config('v2board.withdraw_close', 0),
                    'transfer_balance_close' => config('v2board.transfer_balance_close', 0),
                    'min_recharge_amount' => config('v2board.min_recharge_amount', 1),
                    'max_recharge_amount' => config('v2board.max_recharge_amount', 1000)
                ],
                'site' => [
                    'safe_mode_enable' => (int)config('v2board.safe_mode_enable', 0),
                    'stop_register' => (int)config('v2board.stop_register', 0),
                    'email_verify' => (int)config('v2board.email_verify', 0),
                    'app_name' => config('v2board.app_name', 'V2Board'),
                    'app_description' => config('v2board.app_description', 'V2Board is best!'),
                    'app_url' => config('v2board.app_url'),
                    'subscribe_url' => config('v2board.subscribe_url'),
                    'try_out_plan_id' => (int)config('v2board.try_out_plan_id', 0),
                    'try_out_hour' => (int)config('v2board.try_out_hour', 1),
                    'email_whitelist_enable' => (int)config('v2board.email_whitelist_enable', 0),
                    'email_whitelist_suffix' => config('v2board.email_whitelist_suffix', Dict::EMAIL_WHITELIST_SUFFIX_DEFAULT),
                    'email_gmail_limit_enable' => config('v2board.email_gmail_limit_enable', 0),
                    'captcha_enable' => (int)config('v2board.captcha_enable', 0),
                    'captcha_type' => config('v2board.captcha_type', 0),
                    'recaptcha_key' => config('v2board.recaptcha_key'),
                    'recaptcha_site_key' => config('v2board.recaptcha_site_key'),
                    'hcaptcha_key' => config('v2board.hcaptcha_key'),
                    'hcaptcha_site_key' => config('v2board.hcaptcha_site_key'),
                    'tos_url' => config('v2board.tos_url')
                ],
                'subscribe' => [
                    'plan_change_enable' => (int)config('v2board.plan_change_enable', 1),
                    'reset_traffic_method' => (int)config('v2board.reset_traffic_method', 0),
                    'rate_limit_per_minute' => (int)config('v2board.rate_limit_per_minute', 10),
                    'subscribe_cache_enable' => (int)config('v2board.subscribe_cache_enable', 1)
                ],
                'frontend' => [
                    'frontend_theme' => config('v2board.frontend_theme', 'v2board'),
                    'frontend_theme_sidebar' => config('v2board.frontend_theme_sidebar', 'light'),
                    'frontend_theme_header' => config('v2board.frontend_theme_header', 'dark'),
                    'frontend_theme_color' => config('v2board.frontend_theme_color', 'default'),
                    'frontend_background_url' => config('v2board.frontend_background_url'),
                    'frontend_admin_path' => config('v2board.frontend_admin_path', 'admin'),
                    'frontend_customer_service_method' => config('v2board.frontend_customer_service_method', 0),
                    'frontend_customer_service_id' => config('v2board.frontend_customer_service_id'),
                    'frontend_world_fill_color' => config('v2board.frontend_world_fill_color', '#2196f3'),
                    'frontend_world_marker_color' => config('v2board.frontend_world_marker_color', '#8bc34a'),
                ],
                'server' => [
                    'server_token' => config('v2board.server_token'),
                ],
                'email' => [
                    'email_template' => config('v2board.email_template', 'default'),
                    'email_host' => config('v2board.email_host'),
                    'email_port' => config('v2board.email_port'),
                    'email_username' => config('v2board.email_username'),
                    'email_password' => config('v2board.email_password'),
                    'email_encryption' => config('v2board.email_encryption'),
                    'email_from_address' => config('v2board.email_from_address'),
                    'email_rate_limit' => config('v2board.email_rate_limit', 30)
                ],
                'telegram' => [
                    'telegram_bot_enable' => config('v2board.telegram_bot_enable', 0),
                    'telegram_bot_token' => config('v2board.telegram_bot_token'),
                    'telegram_discuss_link' => config('v2board.telegram_discuss_link')
                ]
            ]
        ]);
    }


    /**
     * test send mail
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function testSendMail(Request $request)
    {
        $email = $request->session()->get('email');
        $subject = 'This is v2board test email';
        $templateName = 'mail.' . config('v2board.email_template', 'default') . '.notify';
        $templateValue = [
            'name' => config('v2board.app_name'),
            'content' => 'This is v2board test email',
            'url' => config('v2board.app_url')
        ];

        try {
            Mail::send(
                $templateName,
                $templateValue,
                function ($message) use ($email, $subject) {
                    $message->to($email)->subject($subject);
                }
            );
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }

        return response([
            'data' => true,
        ]);
    }


    /**
     * save
     *
     * @param ConfigSave $request
     * @return ResponseFactory|Response
     */
    public function save(ConfigSave $request)
    {
        $data = $request->validated();
        $array = Config::get('v2board');
        foreach ($data as $k => $v) {
            if (!in_array($k, array_keys($request->validated()))) {
                abort(500, '参数' . $k . '不在规则内，禁止修改');
            }
            $array[$k] = $v;
        }
        $data = var_export($array, 1);
        if (!File::put(base_path() . '/config/v2board.php', "<?php\n return $data ;")) {
            abort(500, '修改失败');
        }
        if (function_exists('opcache_reset')) {
            if (opcache_reset() === false) {
                abort(500, '缓存清除失败，请卸载或检查opcache配置状态');
            }
        }
        Artisan::call('config:cache');
        return response([
            'data' => true
        ]);
    }
}