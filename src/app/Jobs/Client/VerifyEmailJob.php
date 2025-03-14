<?php
namespace App\Jobs\Client;

use App\Mail\Client\VerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class VerifyEmailJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public $email;
    public $verificationCode;
    public function __construct($email, $verificationCode)
    {
        $this->email            = $email;
        $this->verificationCode = $verificationCode;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new VerifyEmail($this->verificationCode));
    }
}
