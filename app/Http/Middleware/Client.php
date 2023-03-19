<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class Client
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
        $token = $request->input('token') ?? $request->route('token');
        if (empty($token)) {
            abort(403, 'token is null');
        }
        $user = User::findByToken($token);
        if (!$user) {
            abort(403, 'token is error');
        }
        $request->user = $user;
        return $next($request);
    }
}