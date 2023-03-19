<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Utils\Dict;

class CommController extends Controller
{
    public function config()
    {
        return response([
            'data' => [
                'tos_url' => config('v2board.tos_url'),
                'is_email_verify' => (bool)config('v2board.email_verify', 0),
                'is_invite_force' => (bool)config('v2board.invite_force', 0),
                'email_whitelist_suffix' => (bool)config('v2board.email_whitelist_enable', 0)
                    ? $this->_getEmailSuffix()
                    : null,
                'is_captcha_enable' => (bool)config('v2board.captcha_enable', 0),
                'captcha_type' => (int)config('v2board.captcha_type', 0),
                'recaptcha_site_key' => config('v2board.recaptcha_site_key'),
                'hcaptcha_site_key' => config('v2board.hcaptcha_site_key'),
                'app_description' => config('v2board.app_description'),
                'app_url' => config('v2board.app_url')
            ]
        ]);
    }


    private function _getEmailSuffix()
    {
        $suffix = config('v2board.email_whitelist_suffix', Dict::EMAIL_WHITELIST_SUFFIX_DEFAULT);
        if (!is_array($suffix)) {
            return preg_split('/,/', $suffix);
        }
        return $suffix;
    }
}