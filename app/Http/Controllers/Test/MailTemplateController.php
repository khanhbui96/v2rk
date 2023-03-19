<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;


class MailTemplateController extends Controller
{
    public function notify()
    {
        return view("mail/" . config('v2board.email_template', 'default') . "/notify", [
                "name" => config('app.name'),
                'content' => "test content",
                'url' => URL::to('/')
            ]
        );
    }

    public function remindExpire()
    {
        return view("mail/" . config('v2board.email_template', 'default') . "/remindExpire", [
                "name" => config('app.name'),
                'url' => URL::to('/')
            ]
        );
    }


    public function remindTraffic()
    {
        return view("mail/" . config('v2board.email_template', 'default') . "/remindTraffic", [
            "name" => config('app.name'),
            'url' => URL::to('/')
        ]);
    }

    public function verify()
    {
        return view("mail/" . config('v2board.email_template', 'default') . "/verify", [
            "name" => config('app.name'),
            'url' => URL::to('/'),
            'code' => 123456
        ]);

    }
}