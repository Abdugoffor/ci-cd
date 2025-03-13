<?php
namespace App\Jobs;

use App\Mail\ApplicationCancelEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ApplicationCancelJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $email;
    public $message;

    public function __construct($email, $message)
    {
        $this->email   = $email;
        $this->message = $message;
    }

    public function handle(): void
    {
        // Log::info("Job ishlayapti: ", ['email' => $this->email, 'message' => $this->message]);

        Mail::to($this->email)->send(new ApplicationCancelEmail($this->message));
    }
}
