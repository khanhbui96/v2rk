<?php

namespace App\Http\Routes;

use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Support\Facades\App;

class TestRoute
{
    public function map(Registrar $router)
    {
        if (App::hasDebugModeEnabled()) {
            $router->group([
                'prefix' => 'test',
            ], function ($router) {
                $router->any('/{class}/{action}', function ($class, $action) {
                    $ctrl = \App::make("\\App\\Http\\Controllers\\Test\\" . ucfirst($class) . "Controller");
                    return \App::call([$ctrl, $action]);
                });
            });
        }
    }
}