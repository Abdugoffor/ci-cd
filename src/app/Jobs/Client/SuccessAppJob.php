<?php
namespace App\Jobs\Client;

use App\Mail\Client\SuccessAppMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SuccessAppJob implements ShouldQueue
{
    use Queueable;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function handle()
    {
        Mail::to($this->data['participant']->email)->send(new SuccessAppMail($this->data));
    }
}
