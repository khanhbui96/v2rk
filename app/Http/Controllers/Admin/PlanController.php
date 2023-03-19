<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PlanSave;
use App\Http\Requests\Admin\PlanSort;
use App\Http\Requests\Admin\PlanUpdate;
use App\Models\Order;
use App\Models\Plan;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Throwable;

class PlanController extends Controller
{
    /**
     * fetch
     *
     * @return ResponseFactory|Response
     */
    public function fetch()
    {
        $plans = Plan::orderBy(Plan::FIELD_SORT, "ASC")->get();
        foreach ($plans as $plan) {
            /**
             * @var Plan $plan
             */
            $plan->setAttribute("server_count", $plan->countServers());
            $plan->setAttribute("user_count", $plan->countUsers());
            $plan->setAttribute("valid_user_count", $plan->countNotExpiredUsers());
        }
        return response([
            'data' => $plans
        ]);
    }

    /**
     * @throws Throwable
     */
    public function save(PlanSave $request)
    {
        $reqId = (int)$request->input('id');
        $reqName = $request->input('name');
        $reqContent = $request->input('content');
        $reqTransferEnable = (int)$request->input('transfer_enable');
        $reqResetTrafficMethod = $request->input('reset_traffic_method');
        $reqPrices = $request->input('prices');
        $reqAllowIds = $request->input('allow_ids');
        $reqTimeLimit = $request->input('time_limit');
        $reqStartSec = $request->input('start_sec');
        $reqEndSec = $request->input('end_sec');

        if ($reqId > 0) {
            /**
             * @var Plan $plan
             */
            $plan = Plan::find($reqId);
            if ($plan === null) {
                abort(500, '该订阅不存在');
            }
        } else {
            $plan = new Plan();
        }

        $plan->setAttribute(Plan::FIELD_NAME, $reqName);
        $plan->setAttribute(Plan::FIELD_TRANSFER_ENABLE, $reqTransferEnable);
        $plan->setAttribute(Plan::FIELD_TRANSFER_ENABLE_VALUE, $reqTransferEnable * 1024 * 1024 * 1024);
        $plan->setAttribute(Plan::FIELD_CONTENT, $reqContent);
        $plan->setAttribute(Plan::FIELD_PRICES, $reqPrices);
        $plan->setAttribute(Plan::FIELD_RESET_TRAFFIC_METHOD, $reqResetTrafficMethod);
        $plan->setAttribute(Plan::FIELD_ALLOW_IDS, $reqAllowIds);
        $plan->setAttribute(Plan::FIELD_TIME_LIMIT, $reqTimeLimit);
        $plan->setAttribute(Plan::FIELD_START_SEC, $reqStartSec);
        $plan->setAttribute(Plan::FIELD_END_SEC, $reqEndSec);

        if (!$plan->save()) {
            abort(500, '保存失败');
        }

        return response([
            'data' => true
        ]);
    }


    /**
     * drop
     *
     * @param Request $request
     * @return ResponseFactory|Response
     * @throws Exception
     */
    public function drop(Request $request)
    {
        $reqId = (int)$request->input('id');


        if ($reqId <= 0) {
            abort(500, "参数错误");
        }
        /**
         * @var Plan $plan
         */
        $plan = Plan::find($reqId);
        if ($plan === null) {
            abort(500, '该订阅ID不存在');
        }

        if (Order::where(Order::FIELD_PLAN_ID, $reqId)->count() > 0) {
            abort(500, '该订阅下存在订单无法删除');
        }
        if (User::where(User::FIELD_PLAN_ID, $reqId)->count() > 0) {
            abort(500, '该订阅下存在用户无法删除');
        }

        try {
            $plan->delete();
        } catch (Exception $e) {
            abort(500, '删除失败-' . $e->getMessage());
        }

        return response([
            'data' => true
        ]);
    }

    /**
     * update
     *
     * @param PlanUpdate $request
     * @return ResponseFactory|Response
     */
    public function update(PlanUpdate $request)
    {
        $reqId = (int)$request->input('id');
        $reqShow = $request->input("show");
        $reqRenew = $request->input('renew');

        /**
         * @var Plan $plan
         */
        $plan = Plan::find($reqId);
        if ($plan === null) {
            abort(500, '该订阅不存在');
        }

        if ($reqRenew !== null) {
            $plan->setAttribute(Plan::FIELD_RENEW, (int)$reqRenew);
        }

        if ($reqShow !== null) {
            $plan->setAttribute(Plan::FIELD_SHOW, (int)$reqShow);
        }

        if (!$plan->save()) {
            abort(500, '保存失败');
        }

        return response([
            'data' => true
        ]);
    }

    /**
     * sort
     *
     * @param PlanSort $request
     * @return ResponseFactory|Response
     *
     *
     * @throws Throwable
     */
    public function sort(PlanSort $request)
    {
        $reqIds = (array)$request->input('plan_ids');
        DB::beginTransaction();
        foreach ($reqIds as $k => $id) {
            /**
             * @var Plan $plan
             */
            $plan = Plan::find($id);
            if ($plan === null) {
                DB::rollBack();
                abort(500, '知识数据异常');
            }

            $plan->setAttribute(Plan::FIELD_SORT, $k + 1);
            if (!$plan->save()) {
                DB::rollBack();
                abort(500, '保存失败');
            }
        }
        DB::commit();
        return response([
            'data' => true
        ]);
    }
}