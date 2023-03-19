<?php

namespace App\Jobs;

use App\Models\MailLog;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $params;

    /**
     * The maximum number of unhandled exceptions to allow before failing.
     *
     * @var int
     */
    public $maxExceptions = 3;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 25;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($params)
    {
        $this->onQueue('send_email');
        $this->params = $params;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->_sendEmail();
    }


    /**
     * Send email
     *
     * @return void
     */
    private function _sendEmail()
    {
        $params = $this->params;
        $email = $params['email'];
        $subject = $params['subject'];
        $templateName = 'mail.' . config('v2board.email_template', 'default') . '.' . $params['template_name'];
        try {
            Mail::send(
                $templateName,
                $params['template_value'],
                function ($message) use ($email, $subject) {
                    $message->to($email)->subject($subject);
                }
            );
        } catch (Exception $e) {
            $error = $e->getMessage();
        }

        $mailLog = new MailLog();
        $mailLog->setAttribute(MailLog::FIELD_EMAIL, $email);
        $mailLog->setAttribute(MailLog::FIELD_SUBJECT, $subject);
        $mailLog->setAttribute(MailLog::FIELD_TEMPLATE_NAME, $templateName);
        $mailLog->setAttribute(MailLog::FIELD_ERROR, $error ?? NULL);
        $mailLog->save();
    }

}