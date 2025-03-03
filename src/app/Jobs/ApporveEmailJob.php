<?php
namespace App\Jobs;

use App\Mail\ApporveEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
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
        // Mail::to($this->email)->send(new ApporveEmail(public_path($this->qrPath)));
        if (file_exists(public_path($this->qrPath))) {
            Mail::to($this->email)->send(new ApporveEmail($this->qrPath));
        } else {
            Log::error('Fayl topilmadi: ' . public_path($this->qrPath));
        }
    }

}
