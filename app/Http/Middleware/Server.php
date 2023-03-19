<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Server
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $reqToken = $request->input('token');
        if (empty($reqToken)) {
            abort(500, 'token is null');
        }
        if ($reqToken !== config('v2board.server_token')) {
            abort(500, 'token is error');
        }
        return $next($request);
    }
}