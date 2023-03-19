<?php

namespace App\Http\Controllers\Passport;

use App\Http\Controllers\Controller;
use App\Http\Requests\Passport\AuthForget;
use App\Http\Requests\Passport\AuthLogin;
use App\Http\Requests\Passport\AuthRegister;
use App\Models\InviteCode;
use App\Models\Plan;
use App\Models\User;
use App\Utils\CacheKey;
use App\Utils\Dict;
use App\Utils\Helper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use ReCaptcha\ReCaptcha;
use Scyllaly\HCaptcha\HCaptcha;

class AuthController extends Controller
{
    /**
     * register
     *
     * @param AuthRegister $request
     * @return JsonResponse
     */
    public function register(AuthRegister $request): JsonResponse
    {
        $reqCaptchaData = $request->input('captcha_data');
        $reqEmail = $request->input('email');
        $reqEmailCode = $request->input('email_code');
        $reqPassword = $request->input('password');
        $reqInviteCode = $request->input('invite_code');

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

        if ((int)config('v2board.email_whitelist_enable', 0)) {
            if (!Helper::emailSuffixVerify(
                $reqEmail,
                config('v2board.email_whitelist_suffix', Dict::EMAIL_WHITELIST_SUFFIX_DEFAULT))
            ) {
                abort(500, __('Email suffix is not in the Whitelist'));
            }
        }

        if ((int)config('v2board.email_gmail_limit_enable', 0)) {
            $prefix = explode('@', $reqEmail)[0];
            $suffix = explode('@', $reqEmail)[1];
            if (strpos($prefix, '+') !== false && strtolower($suffix) === "gmail.com") {
                abort(500, __('Gmail alias is not supported'));
            }
        }

        if ((int)config('v2board.stop_register', 0)) {
            abort(500, __('Registration has closed'));
        }
        if ((int)config('v2board.invite_force', 0)) {
            if (empty($request->input('invite_code'))) {
                abort(500, __('You must use the invitation code to register'));
            }
        }

        if ((int)config('v2board.email_verify', 0)) {
            if (empty($reqEmailCode)) {
                abort(500, __('Email verification code cannot be empty'));
            }
            if (Cache::get(CacheKey::get(CacheKey::EMAIL_VERIFY_CODE, $reqEmail)) !== $reqEmailCode) {
                abort(500, __('Incorrect email verification code'));
            }
        }
        $existUser = User::findByEmail($reqEmail);
        if ($existUser) {
            abort(500, __('Email already exists'));
        }

        $user = new User();
        $user->setAttribute(User::FIELD_EMAIL, $reqEmail);
        $user->setAttribute(User::FIELD_PASSWORD, password_hash($reqPassword, PASSWORD_DEFAULT));
        $user->setAttribute(User::FIELD_UUID, Helper::guid(true));
        $user->setAttribute(User::FIELD_TOKEN, Helper::guid());

        if ($reqInviteCode) {
            $inviteCode = InviteCode::where('code', $reqInviteCode)
                ->where(InviteCode::FIELD_STATUS, InviteCode::STATUS_UNUSED)
                ->first();

            /**
             * @var InviteCode $inviteCode
             */
            if ($inviteCode === null) {
                if ((int)config('v2board.invite_force', 0)) {
                    abort(500, __('Invalid invitation code'));
                }
            } else {
                $user->setAttribute(User::FIELD_INVITE_USER_ID, $inviteCode->getAttribute(InviteCode::FIELD_USER_ID) ?
                    $inviteCode->getAttribute(InviteCode::FIELD_USER_ID) : null);
                if (!(int)config('v2board.invite_never_expire', 0)) {
                    $inviteCode->setAttribute(InviteCode::FIELD_STATUS, InviteCode::STATUS_USED);
                    if (!$inviteCode->save()) {
                        abort(500, __('Save failed'));
                    }
                }
            }
        }

        // try out
        if ((int)config('v2board.try_out_plan_id', 0)) {
            /**
             * @var Plan $plan
             */
            $plan = Plan::find(config('v2board.try_out_plan_id'));
            if ($plan !== null) {
                $user->setAttribute(User::FIELD_PLAN_ID, $plan->getKey());
                $configTryOutHour = (config('v2board.try_out_hour', 1) * 3600);
                if ($configTryOutHour === 0) {
                    $user->setAttribute(User::FIELD_EXPIRED_AT, null);
                } else {
                    $user->setAttribute(User::FIELD_EXPIRED_AT, time() + (config('v2board.try_out_hour', 1) * 3600));
                }
            }
        }

        $user->setAttribute(User::FIELD_REGISTER_IP, $request->getClientIp());
        $user->setAttribute(User::FIELD_LAST_LOGIN_IP, $request->getClientIp());
        $user->setAttribute(User::FIELD_LAST_LOGIN_AT, time());

        if (!$user->save()) {
            abort(500, __('Register failed'));
        }

        if ((int)config('v2board.email_verify', 0)) {
            Cache::forget(CacheKey::get(CacheKey::EMAIL_VERIFY_CODE, $request->input('email')));
        }

        $request->session()->put('email', $user->getAttribute(User::FIELD_EMAIL));
        $request->session()->put('id', $user->getKey());
        return response()->json([
            'data' => true
        ]);
    }

    /**
     * login
     *
     * @param AuthLogin $request
     * @return Application|ResponseFactory|Response
     */
    public function login(AuthLogin $request)
    {
        $reqEmail = $request->input('email');
        $reqPassword = $request->input('password');

        /**
         * @var User $user
         */
        $user = User::findByEmail($reqEmail);
        if ($user === null) {
            abort(500, __('Incorrect email or password'));
        }

        if (!Helper::multiPasswordVerify(
            $user->getAttribute(User::FIELD_PASSWORD_ALGO),
            $user->getAttribute(User::FIELD_PASSWORD_SALT),
            $reqPassword,
            $user->getAttribute(User::FIELD_PASSWORD))
        ) {
            abort(500, __('Incorrect email or password'));
        }

        if ($user->isBanned()) {
            abort(500, __('Your account has been suspended'));
        }

        $data = [
            'token' => $user->getAttribute(User::FIELD_TOKEN),
            'auth_data' => base64_encode("{$user->getAttribute(User::FIELD_EMAIL)}:{$user->getAttribute(User::FIELD_PASSWORD)}")
        ];
        $request->session()->put('email', $user->getAttribute(User::FIELD_EMAIL));
        $request->session()->put('id', $user->getAttribute(User::FIELD_ID));
        if ($user->isAdmin()) {
            $request->session()->put('is_admin', true);
            $data['is_admin'] = true;
        }
        if ($user->isStaff()) {
            $request->session()->put('is_staff', true);
            $data['is_staff'] = true;
        }

        $user->setAttribute(User::FIELD_LAST_LOGIN_AT, time());
        $user->setAttribute(User::FIELD_LAST_LOGIN_IP, $request->getClientIp());
        $user->save();

        return response([
            'data' => $data
        ]);
    }


    /**
     * check
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function check(Request $request)
    {
        $sessionId = $request->session()->get('id');
        $sessionIsAdmin = $request->session()->get('is_admin');
        $data = [
            'is_login' => (bool)$sessionId
        ];
        if ($sessionIsAdmin) {
            $data['is_admin'] = true;
        }
        return response([
            'data' => $data
        ]);
    }

    /**
     * forget
     *
     * @param AuthForget $request
     * @return Application|ResponseFactory|Response
     */
    public function forget(AuthForget $request)
    {
        $reqEmail = $request->input('email');
        $reqEmailCode = $request->input('email_code');
        $reqPassword = $request->input('password');

        if (Cache::get(CacheKey::get(CacheKey::EMAIL_VERIFY_CODE, $reqEmail)) !== $reqEmailCode) {
            abort(500, __('Incorrect email verification code'));
        }

        /**
         * @var User $user
         */
        $user = User::findByEmail($reqEmail);
        if ($user === null) {
            abort(500, __('This email is not registered in the system'));
        }

        $user->setAttribute(User::FIELD_PASSWORD, password_hash($reqPassword, PASSWORD_DEFAULT));
        $user->setAttribute(User::FIELD_PASSWORD_ALGO, null);
        $user->setAttribute(User::FIELD_PASSWORD_SALT, null);


        if (!$user->save()) {
            abort(500, __('Reset failed'));
        }
        Cache::forget(CacheKey::get(CacheKey::EMAIL_VERIFY_CODE, $reqEmail));
        return response([
            'data' => true
        ]);
    }

}