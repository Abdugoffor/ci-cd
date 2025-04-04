<?php
namespace App\Jobs\Client;

use App\Mail\Client\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class VerifyEmailJob implements ShouldQueue
{
    use Queueable;

    public $email;
    public $data;

    public function __construct($email, $data)
    {
        $this->email = $email;
        $this->data  = $data;
    }

    public function handle(): void
    {
        try {
            Mail::to($this->email)->send(new VerifyEmail($this->data));
            Log::info("Email sent successfully to: {$this->email}");
        } catch (\Exception $e) {
            Log::error("Email sending failed: {$e->getMessage()}");
        }
    }
}
