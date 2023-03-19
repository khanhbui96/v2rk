<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class EmailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Config::set('mail.host', config('v2board.email_host', env('MAIL_HOST')));
        Config::set('mail.port', config('v2board.email_port', env('MAIL_PORT')));
        Config::set('mail.encryption', config('v2board.email_encryption', env('MAIL_ENCRYPTION')));
        Config::set('mail.username', config('v2board.email_username', env('MAIL_USERNAME')));
        Config::set('mail.password', config('v2board.email_password', env('MAIL_PASSWORD')));
        Config::set('mail.from.address', config('v2board.email_from_address', env('MAIL_FROM_ADDRESS')));
        Config::set('mail.from.name', config('v2board.app_name', env('APP_NAME')));
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}