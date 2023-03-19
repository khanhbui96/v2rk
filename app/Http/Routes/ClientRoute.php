<?php

namespace App\Http\Routes;

use Illuminate\Contracts\Routing\Registrar;

class ClientRoute
{
    public function map(Registrar $router)
    {
        $router->group([
            'prefix' => 'client',
            'middleware' => ['throttle:subscribe', 'client']
        ], function ($router) {
            // Client
            $router->get('/fastpn.net/laydulieugoidangky', 'Client\\ClientController@subscribe');
            $router->get('/{token}',  'Client\\ClientController@subscribe');
        });
    }
}