<?php

namespace App\Http\Controllers\Passport;

use App\Http\Controllers\Controller;
use App\Http\Requests\Passport\CommSendEmailVerify;
use App\Jobs\SendEmailJob;
use App\Utils\CacheKey;
use App\Utils\Dict;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use ReCaptcha\ReCaptcha;
use Scyllaly\HCaptcha\HCaptcha;

class CommController extends Controller
{
    /**
     * send email verify
     *
     * @param CommSendEmailVerify $request
     * @return Application|ResponseFactory|Response
     */
    public function sendEmailVerify(CommSendEmailVerify $request)
    {

        $reqEmail = $request->input('email');
        $reqCaptchaData = $request->input('captcha_data');

        if ((int)config('v2board.captcha_enable', 0)) {
            if (config('v2board.captcha_type') === 0) {
                $recaptcha = new ReCaptcha(config('v2board.recaptcha_key'));
                $recaptchaResp = $recaptcha->verify($reqCaptchaData);
                if (!$recaptchaResp->isSuccess()) {
                    abort(500, __('Invalid code is incorrect'));
                }
            } else if (config('v2board.captcha_type') === 1) {
                $hcaptcha = new HCaptcha(config('v2board.hcaptcha_key'), config('v2board.hcaptcha_site_key'));
                if (!$hcaptcha->verifyResponse($reqCaptchaData)) {
                    abort(500, __('Invalid code is incorrect'));
                }
            }
        }

        if ((int)config('v2board.email_gmail_limit_enable', 0)) {
            $prefix = explode('@', $reqEmail)[0];
            $suffix = explode('@', $reqEmail)[1];
            if (strpos($prefix, '+') !== false && strtolower($suffix) === "gmail.com") {
                abort(500, __('Gmail alias is not supported'));
            }
        }

        if (Cache::get(CacheKey::get(CacheKey::LAST_SEND_EMAIL_VERIFY_TIMESTAMP, $reqEmail))) {
            abort(500, __('Email verification code has been sent, please request again later'));
        }
        $code = rand(100000, 999999);
        $subject = config('v2board.app_name', 'V2Board') . __('Email verification code');

        SendEmailJob::dispatch([
            'email' => $reqEmail,
            'subject' => $subject,
            'template_name' => 'verify',
            'template_value' => [
                'name' => config('v2board.app_name', 'V2Board'),
                'code' => $code,
                'url' => config('v2board.app_url')
            ]
        ]);

        Cache::put(CacheKey::get(CacheKey::EMAIL_VERIFY_CODE, $reqEmail), $code, 300);
        Cache::put(CacheKey::get(CacheKey::LAST_SEND_EMAIL_VERIFY_TIMESTAMP, $reqEmail), time(), 60);
        return response([
            'data' => true
        ]);
    }

    /**
     * get email suffix
     *
     * @return array|false|Repository|Application|string[]
     */
    private function _getEmailSuffix()
    {
        $suffix = config('v2board.email_whitelist_suffix', Dict::EMAIL_WHITELIST_SUFFIX_DEFAULT);
        if (!is_array($suffix)) {
            return preg_split('/,/', $suffix);
        }
        return $suffix;
    }
}