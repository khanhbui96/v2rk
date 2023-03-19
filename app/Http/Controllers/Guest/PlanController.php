<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Plan;

class PlanController extends Controller
{
    public function fetch()
    {
        $plan = Plan::where(Plan::FIELD_SHOW, Plan::SHOW_ON)->get();
        return response([
            'data' => $plan
        ]);
    }
}