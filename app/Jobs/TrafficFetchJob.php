<?php

namespace App\Jobs;

use App\Models\User;
use App\Services\NoticeService;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class TrafficFetchJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $u;
    protected $d;
    protected $userId;
    protected $server;
    protected $protocol;

    public $tries = 3;
    public $timeout = 3;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($u, $d, $userId)
    {
        $this->onQueue('traffic_fetch');
        $this->u = $u;
        $this->d = $d;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        /**
         * @var User $user
         */
        $user = User::whereId($this->userId)->lockForUpdate()->first();
        if ($user === null) {
            return;
        }

        DB::beginTransaction();
        $user->addTraffic($this->u, $this->d);

        if (!$user->save()) {
            DB::rollBack();
            throw new Exception('流量更新失败');
        }

        DB::commit();
        NoticeService::remindTraffic($user);
    }
}