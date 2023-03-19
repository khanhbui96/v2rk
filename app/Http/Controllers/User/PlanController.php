<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PlanController extends Controller
{
    /**
     * fetch
     *
     * @param Request $request
     * @return ResponseFactory|Response
     */
    public function fetch(Request $request)
    {
        $reqId = (int)$request->input("id");
        $sessionId = $request->session()->get('id');

        if ($reqId > 0) {
            $plan = Plan::find($reqId);
            if ($plan === null) {
                abort(500, __('Subscription plan does not exist'));
            }
            $data = $plan;
        } else {
            $user = User::find($sessionId);
            if ($user === null) {
                abort(500, __('The user does not exist'));
            }
            $data = Plan::getShowPlans($user)->values();

        }

        return response([
            'data' => $data
        ]);
    }
}