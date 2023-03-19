<?php

namespace App\Http\Routes;

use Illuminate\Contracts\Routing\Registrar;

class PassportRoute
{
    public function map(Registrar $router)
    {
        $router->group([
            'prefix' => 'passport'
        ], function ($router) {
            // Auth
            $router->post('/sso/dangky', 'Passport\\AuthController@register');
            $router->post('/sso/dangnhap', 'Passport\\AuthController@login');
            $router->get('/sso/kiemtra', 'Passport\\AuthController@check');
            $router->post('/sso/quenmatkhau', 'Passport\\AuthController@forget');
            // Comm
            $router->post('/sso/guiEmailDangky', 'Passport\\CommController@sendEmailVerify');
        });
    }
}