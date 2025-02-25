<?php
namespace App\Jobs;

use App\Mail\ApporveEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class ApporveEmailJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public $email;
    public $text = 'sizni arizangiz tasdiqlandi !';
    public function __construct($email, $text = null)
    {
        $this->email = $email;
        $this->text  = $text;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new ApporveEmail($this->text));
    }
}
