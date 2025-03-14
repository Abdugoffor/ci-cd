<?php
namespace App\Jobs\Client;

use App\Mail\Client\CencelAppMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class CencelAppJob implements ShouldQueue
{
    use Queueable;

    public $email;
    public $message;
    public function __construct($email, $message)
    {
        $this->email = $email;

        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new CencelAppMail($this->message));
    }
}
