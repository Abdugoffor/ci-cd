<?php
namespace App\Jobs\Client;

use App\Mail\Client\SuccessAppMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SuccessAppJob implements ShouldQueue
{
    use Queueable;

    public $email;
    public $qrPath;

    public function __construct($email, $qrPath)
    {
        $this->email  = $email;
        $this->qrPath = $qrPath;
    }

    public function handle()
    {
        Mail::to($this->email)->send(new SuccessAppMail($this->qrPath));
    }
}
