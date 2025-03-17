<?php
namespace App\Jobs\Client;

use App\Mail\Client\CencelAppMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class CencelAppJob implements ShouldQueue
{
    use Queueable;

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
        Mail::to($this->data['participant']->email)->send(new CencelAppMail($this->data));
    }
}
