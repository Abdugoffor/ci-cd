<?php
namespace App\Jobs\Admin;

use App\Mail\Admin\SendPasswordMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendPasswordJob implements ShouldQueue
{
    use Queueable;

    public $email;
    public $code;
    public function __construct($email, $code)
    {
        $this->email = $email;
        $this->code  = $code;
        // test uchun 
        // rerer
        // ergerger
        //sadasdas
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new SendPasswordMail($this->code));
    }
}
