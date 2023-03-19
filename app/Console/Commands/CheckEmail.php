<?php

namespace App\Console\Commands;

use App\Models\MailLog;
use App\Services\NoticeService;
use Illuminate\Console\Command;
use Symfony\Component\Console\Output\ConsoleOutput;

class CheckEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '邮件发送结果检查';

    /**
     * @var ConsoleOutput $_out
     */
    private $_out;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->_out = new ConsoleOutput();

    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $beforeTime = time() - 1800;
        $builder = MailLog::where(MailLog::FIELD_ERROR, '<>', '')->where(MailLog::FIELD_CREATED_AT, '>', $beforeTime);
        $faultEmailCount = $builder->count();
        $this->_out->writeln("fault email total: " . $faultEmailCount);
        if ($faultEmailCount > 0) {
            /**
             * @var MailLog $latestFaultMailLog
             */
            $latestFaultMailLog = $builder->get()->pop();
            $latestLogError = $latestFaultMailLog->getAttribute(MailLog::FIELD_ERROR);
            $this->_out->writeln("latest email error: " . $latestLogError);
            NoticeService::emailFailureNotifyAdmin($faultEmailCount, $latestLogError);
        }
        return 0;
    }
}