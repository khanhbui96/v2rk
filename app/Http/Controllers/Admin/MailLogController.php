<?php

namespace App\Http\Controllers\Admin;

use App\Models\MailLog;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MailLogController
{
    /**
     * fetch
     *
     * @param Request $request
     * @return ResponseFactory|Response
     */
    public function fetch(Request $request)
    {
        $reqCurrent = $request->input('current') ?: 1;
        $reqPageSize = $request->input('pageSize') >= 10 ? $request->input('pageSize') : 10;
        $reqSortType = in_array($request->input('sort_type'), ["ASC", "DESC"]) ? $request->input('sort_type') : "DESC";
        $reqSort = $request->input('sort') ? $request->input('sort') : MailLog::FIELD_ID;
        $builder = MailLog::orderBy($reqSort, $reqSortType);
        $total = $builder->count();
        $logs = $builder->forPage($reqCurrent, $reqPageSize)->get();

        return response([
            'data' => $logs,
            'total' => $total
        ]);
    }
}