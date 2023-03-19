<?php

namespace App\Http\Routes;

use Illuminate\Contracts\Routing\Registrar;

class UserRoute
{
    public function map(Registrar $router)
    {
        $router->group([
            'prefix' => 'user',
            'middleware' => 'user'
        ], function ($router) {
            // User
            $router->get('/resetSecurity', 'User\\UserController@resetSecurity');
            $router->get('/dangxuat', 'User\\UserController@logout');
            $router->get('/thongtin', 'User\\UserController@info');
            $router->post('/changePassword', 'User\\UserController@changePassword');
            $router->post('/update', 'User\\UserController@update');
            $router->get('/laydulieugoidangky', 'User\\UserController@subscribe');
            $router->get('/getStat', 'User\\UserController@stat');
            $router->post('/transferBalance', 'User\\UserController@transferBalance');
            $router->post('/transferCommissionBalance', 'User\\UserController@transferCommissionBalance');
            $router->post('/recharge', 'User\\UserController@recharge');
            $router->post('/getQuickLoginUrl', 'User\\UserController@getQuickLoginUrl');
            $router->get('/Logdulieukhachhang', 'User\\UserController@trafficLogs');
            $router->get('/bandodulieu', 'User\\UserController@trafficHeatMap');

            // Order
            $router->post('/order/save', 'User\\OrderController@save');
            $router->post('/order/checkout', 'User\\OrderController@checkout');
            $router->get('/order/check', 'User\\OrderController@check');
            $router->get('/donhang/chitiet', 'User\\OrderController@details');
            $router->get('/donhang/laydulieu', 'User\\OrderController@fetch');
            $router->get('/order/getPaymentMethod', 'User\\OrderController@getPaymentMethod');
            $router->post('/order/cancel', 'User\\OrderController@cancel');
            // Plan
            $router->get('/goidangky/dulieu', 'User\\PlanController@fetch');
            // Invite
            $router->get('/invite/save', 'User\\InviteController@save');
            $router->get('/invite/fetch', 'User\\InviteController@fetch');
            $router->get('/invite/details', 'User\\InviteController@details');
            // Notice
            $router->get('/thongbao/laydulieu', 'User\\NoticeController@fetch');
            // Ticket
            $router->post('/ticket/reply', 'User\\TicketController@reply');
            $router->post('/ticket/close', 'User\\TicketController@close');
            $router->post('/ticket/save', 'User\\TicketController@save');
            $router->get('/hotro/laydulieu', 'User\\TicketController@fetch');
            $router->post('/ticket/withdraw', 'User\\TicketController@withdraw');
            // Server
            $router->get('/server/laydulieuserver', 'User\\ServerController@fetch');
            $router->get('/server/tongquanmaychu', 'User\\ServerController@overview');

            // Coupon
            $router->post('/magiamgia/kiemtra', 'User\\CouponController@check');
            // Telegram
            $router->get('/telegram/laydulieuBot', 'User\\TelegramController@getBotInfo');
            // Comm
            $router->get('/comm/profileConfig', 'User\\CommController@profileConfig');
            $router->get('/comm/inviteConfig', 'User\\CommController@inviteConfig');
            // Knowledge
            $router->get('/huongdan/dulieu', 'User\\KnowledgeController@fetch');
            $router->get('/knowledge/getCategory', 'User\\KnowledgeController@getCategory');
        });
    }
}