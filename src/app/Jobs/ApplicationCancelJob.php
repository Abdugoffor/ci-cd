<?php
namespace App\Jobs;

use App\Mail\ApplicationCancelEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class ApplicationCancelJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public $email;
    public $message;
    public function __construct($email, $message)
    {
        $this->email   = $email;
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new ApplicationCancelEmail($this->message));
    }
}
