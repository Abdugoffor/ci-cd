<?php
namespace App\Jobs\Client;

use App\Mail\Client\PendingAppMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class PendingAppJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->data->email)->send(new PendingAppMail($this->data));
    }
}
