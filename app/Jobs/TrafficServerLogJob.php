<?php

namespace App\Jobs;

use App\Models\TrafficServerLog;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Throwable;

class TrafficServerLogJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $timeout = 3;
    protected $serverId;
    protected $serverType;
    protected $ru;
    protected $rd;
    protected $n;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($ru, $rd, $n, $serverId, $serverType)
    {
        $this->onQueue('traffic_server_log');
        $this->ru = $ru;
        $this->rd = $rd;
        $this->n = $n;
        $this->serverId = $serverId;
        $this->serverType = $serverType;
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
         * @var TrafficServerLog $serverLog
         */
        $trafficServerLog = TrafficServerLog::where(TrafficServerLog::FIELD_LOG_AT, '=', $timestamp)
            ->where(TrafficServerLog::FIELD_SERVER_ID, $this->serverId)
            ->where(TrafficServerLog::FIELD_SERVER_TYPE, $this->serverType)
            ->lockForUpdate()->first();

        if ($trafficServerLog !== null) {
            $trafficServerLog->addTraffic($this->ru, $this->rd, $this->n);
        } else {
            $trafficServerLog = new TrafficServerLog();
            $trafficServerLog->setAttribute(TrafficServerLog::FIELD_U, $this->ru);
            $trafficServerLog->setAttribute(TrafficServerLog::FIELD_D, $this->rd);
            $trafficServerLog->setAttribute(TrafficServerLog::FIELD_N, $this->n);
            $trafficServerLog->setAttribute(TrafficServerLog::FIELD_SERVER_TYPE, $this->serverType);
            $trafficServerLog->setAttribute(TrafficServerLog::FIELD_SERVER_ID, $this->serverId);
            $trafficServerLog->setAttribute(TrafficServerLog::FIELD_UNIQUE_ID, sprintf("%s-%d", $this->serverType, $this->serverId));
            $trafficServerLog->setAttribute(TrafficServerLog::FIELD_LOG_AT, $timestamp);
            $trafficServerLog->setAttribute(TrafficServerLog::FIELD_LOG_DATE, $date);
        }
        if (!$trafficServerLog->save()) {
            DB::rollBack();
            throw new Exception("save failed");
        }
        DB::commit();
    }
}