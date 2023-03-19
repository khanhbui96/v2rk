<?php

namespace App\Jobs;

use App\Models\TrafficUserLog;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Throwable;

class TrafficUserLogJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $timeout = 3;
    protected $u;
    protected $d;
    protected $n;
    protected $userId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($u, $d, $n, $userId)
    {
        $this->onQueue('traffic_user_log');
        $this->u = $u;
        $this->d = $d;
        $this->n = $n;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws Throwable
     */
    public function handle()
    {
        $date = date('Y-m-d');
        $timestamp = strtotime($date);

        DB::beginTransaction();
        /**
         * @var TrafficUserLog
         */
        $trafficUserLog = TrafficUserLog::where(TrafficUserLog::FIELD_LOG_AT, '=', $timestamp)
            ->where(TrafficUserLog::FIELD_USER_ID, $this->userId)->lockForUpdate()
            ->first();

        if ($trafficUserLog !== null) {
            $trafficUserLog->addTraffic($this->u, $this->d, $this->n);
        } else {
            $trafficUserLog = new TrafficUserLog();
            $trafficUserLog->setAttribute(TrafficUserLog::FIELD_U, $this->u);
            $trafficUserLog->setAttribute(TrafficUserLog::FIELD_D, $this->d);
            $trafficUserLog->setAttribute(TrafficUserLog::FIELD_N, $this->n);
            $trafficUserLog->setAttribute(TrafficUserLog::FIELD_USER_ID, $this->userId);
            $trafficUserLog->setAttribute(TrafficUserLog::FIELD_LOG_AT, $timestamp);
            $trafficUserLog->setAttribute(TrafficUserLog::FIELD_LOG_DATE, $date);
        }

        if (!$trafficUserLog->save()) {
            DB::rollBack();
            throw new Exception("server save failed");
        }
        DB::commit();
    }

}