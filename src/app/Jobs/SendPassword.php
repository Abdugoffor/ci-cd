<?php
namespace App\Jobs;

use App\Mail\SendPassword as MailSendPassword;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendPassword implements ShouldQueue
{
    use Queueable;

    public $email;
    public $code;
    public function __construct($email, $code)
    {
        $this->email = $email;
        $this->code  = $code;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new MailSendPassword($this->code));
    }
}
