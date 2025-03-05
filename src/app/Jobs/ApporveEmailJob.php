<?php
namespace App\Jobs;

use App\Mail\ApporveEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ApporveEmailJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $email;
    public $qrPath;

    public function __construct($email, $qrPath)
    {
        $this->email  = $email;
        $this->qrPath = $qrPath;
    }

    public function handle()
    {
        // if (file_exists(public_path($$this->qrPath))) {
        // Log::info("bor");
        Mail::to($this->email)->send(new ApporveEmail($this->qrPath));
        // } else {
        //     // Log::info("file yo'q");
        // }
    }

}
