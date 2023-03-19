<?php

namespace App\Http\Routes;

use Illuminate\Contracts\Routing\Registrar;

class AdminRoute
{
    public function map(Registrar $router)
    {
        $router->group([
            'prefix' => 'admin',
            'middleware' => 'admin'
        ], function ($router) {
            // ModuleConfig
            $router->get('/module-config/fetch', 'Admin\\ModuleConfigController@fetch');
            $router->post('/module-config/save', 'Admin\\ModuleConfigController@save');

            // Config
            $router->get('/config/fetch', 'Admin\\ConfigController@fetch');
            $router->post('/config/save', 'Admin\\ConfigController@save');
            $router->get('/config/getEmailTemplate', 'Admin\\ConfigController@emailTemplate');
            $router->get('/config/getThemeTemplate', 'Admin\\ConfigController@getThemeTemplate');
            $router->post('/config/setTelegramWebhook', 'Admin\\ConfigController@setTelegramWebHook');
            $router->post('/config/testSendMail', 'Admin\\ConfigController@testSendMail');
            // Plan
            $router->get('/plan/fetch', 'Admin\\PlanController@fetch');
            $router->post('/plan/save', 'Admin\\PlanController@save');
            $router->post('/plan/drop', 'Admin\\PlanController@drop');
            $router->post('/plan/update', 'Admin\\PlanController@update');
            $router->post('/plan/sort', 'Admin\\PlanController@sort');
            // Server
            $router->get('/server/area/fetch', 'Admin\\Server\\AreaController@fetch');
            $router->post('/server/area/save', 'Admin\\Server\\AreaController@save');
            $router->post('/server/area/drop', 'Admin\\Server\\AreaController@drop');
            $router->get('/server/manage/getNodes', 'Admin\\Server\\ManageController@getNodes');
            $router->post('/server/manage/sort', 'Admin\\Server\\ManageController@sort');
            $router->group([
                'prefix' => 'server/trojan'
            ], function ($router) {
                $router->get('fetch', 'Admin\\Server\\TrojanController@fetch');
                $router->post('save', 'Admin\\Server\\TrojanController@save');
                $router->post('drop', 'Admin\\Server\\TrojanController@drop');
                $router->post('update', 'Admin\\Server\\TrojanController@update');
                $router->post('copy', 'Admin\\Server\\TrojanController@copy');
                $router->post('sort', 'Admin\\Server\\TrojanController@sort');
            });
            $router->group([
                'prefix' => 'server/vmess'
            ], function ($router) {
                $router->get('fetch', 'Admin\\Server\\VmessController@fetch');
                $router->post('save', 'Admin\\Server\\VmessController@save');
                $router->post('drop', 'Admin\\Server\\VmessController@drop');
                $router->post('update', 'Admin\\Server\\VmessController@update');
                $router->post('copy', 'Admin\\Server\\VmessController@copy');
                $router->post('sort', 'Admin\\Server\\VmessController@sort');
            });
            $router->group([
                'prefix' => 'server/shadowsocks'
            ], function ($router) {
                $router->get('fetch', 'Admin\\Server\\ShadowsocksController@fetch');
                $router->post('save', 'Admin\\Server\\ShadowsocksController@save');
                $router->post('drop', 'Admin\\Server\\ShadowsocksController@drop');
                $router->post('update', 'Admin\\Server\\ShadowsocksController@update');
                $router->post('copy', 'Admin\\Server\\ShadowsocksController@copy');
                $router->post('sort', 'Admin\\Server\\ShadowsocksController@sort');
            });
            // Order
            $router->get('/order/fetch', 'Admin\\OrderController@fetch');
            $router->post('/order/update', 'Admin\\OrderController@update');
            $router->post('/order/assign', 'Admin\\OrderController@assign');
            $router->post('/order/paid', 'Admin\\OrderController@paid');
            $router->post('/order/cancel', 'Admin\\OrderController@cancel');
            // User
            $router->get('/user/fetch', 'Admin\\UserController@fetch');
            $router->post('/user/update', 'Admin\\UserController@update');
            $router->get('/user/getUserInfoById', 'Admin\\UserController@userInfo');
            $router->post('/user/generate', 'Admin\\UserController@generate');
            $router->post('/user/dumpCSV', 'Admin\\UserController@dumpCSV');
            $router->post('/user/sendMail', 'Admin\\UserController@sendMail');
            $router->post('/user/drop', 'Admin\\UserController@drop');
            $router->post('/user/suspend', 'Admin\\UserController@suspend');
            $router->post('/user/recovery', 'Admin\\UserController@recovery');
            $router->post('/user/batchBan', 'Admin\\UserController@batchBan');
            $router->post('/user/resetSecret', 'Admin\\UserController@resetSecret');
            $router->post('/user/setInviteUser', 'Admin\\UserController@setInviteUser');
            // Stat
            $router->get('/stat/overview', 'Admin\\StatController@overview');
            $router->get('/stat/server/rank', 'Admin\\Stat\\ServerController@rank');
            $router->get('/stat/server/monthlyOverview', 'Admin\\Stat\\ServerController@monthlyOverview');
            $router->get('/stat/server/monthlyTrafficAreas', 'Admin\\Stat\\ServerController@monthlyTrafficAreas');
            $router->get('/stat/server/monthlyRankBars', 'Admin\\Stat\\ServerController@monthlyRankBars');
            $router->get('/stat/user/rank', 'Admin\\Stat\\UserController@rank');
            $router->get('/stat/user/latestHourOnline', 'Admin\\Stat\\UserController@latestHourOnline');
            $router->get('/stat/user/latestDayOnline', 'Admin\\Stat\\UserController@latestDayOnline');
            $router->get('/stat/user/latestWeekOnline', 'Admin\\Stat\\UserController@latestWeekOnline');
            $router->get('/stat/order/overview', 'Admin\\Stat\\OrderController@overview');
            $router->get('/stat/terminal/connections', 'Admin\\Stat\\TerminalController@connections');
            $router->get('/stat/terminal/requests', 'Admin\\Stat\\TerminalController@requests');
            // Notice
            $router->get('/notice/fetch', 'Admin\\NoticeController@fetch');
            $router->post('/notice/save', 'Admin\\NoticeController@save');
            $router->post('/notice/update', 'Admin\\NoticeController@update');
            $router->post('/notice/drop', 'Admin\\NoticeController@drop');
            // Ticket
            $router->get('/ticket/fetch', 'Admin\\TicketController@fetch');
            $router->post('/ticket/reply', 'Admin\\TicketController@reply');
            $router->post('/ticket/close', 'Admin\\TicketController@close');
            // Coupon
            $router->get('/coupon/fetch', 'Admin\\CouponController@fetch');
            $router->post('/coupon/generate', 'Admin\\CouponController@generate');
            $router->post('/coupon/drop', 'Admin\\CouponController@drop');
            // Knowledge
            $router->get('/knowledge/fetch', 'Admin\\KnowledgeController@fetch');
            $router->get('/knowledge/getCategory', 'Admin\\KnowledgeController@category');
            $router->post('/knowledge/save', 'Admin\\KnowledgeController@save');
            $router->post('/knowledge/show', 'Admin\\KnowledgeController@show');
            $router->post('/knowledge/free', 'Admin\\KnowledgeController@free');
            $router->post('/knowledge/drop', 'Admin\\KnowledgeController@drop');
            $router->post('/knowledge/sort', 'Admin\\KnowledgeController@sort');
            // Payment
            $router->get('/payment/fetch', 'Admin\\PaymentController@fetch');
            $router->get('/payment/getPaymentMethods', 'Admin\\PaymentController@methods');
            $router->post('/payment/getPaymentForm', 'Admin\\PaymentController@form');
            $router->post('/payment/save', 'Admin\\PaymentController@save');
            $router->post('/payment/drop', 'Admin\\PaymentController@drop');
            $router->post('/payment/update', 'Admin\\PaymentController@update');
            // MailLog
            $router->get('/mailLog/fetch', 'Admin\\MailLogController@fetch');
        });
    }
}