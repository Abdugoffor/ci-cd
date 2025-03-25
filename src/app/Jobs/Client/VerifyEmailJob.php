<?php
namespace App\Jobs\Client;

use App\Mail\Client\VerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class VerifyEmailJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public $email;
    public $data;
    public function __construct($email, $data)
    {
        $this->email = $email;
        $this->data  = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            Mail::to($this->email)->send(new VerifyEmail($this->data));
        } catch (\Exception $e) {
            Log::info("Email sent successfully to: {$e->getMessage()}");
        }
    }
}
