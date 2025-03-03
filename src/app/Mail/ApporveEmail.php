<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class ApporveEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $qrCodePath;

    public function __construct($qrCodePath)
    {
        $this->qrCodePath = $qrCodePath;
    }

    public function build()
    {
        return $this->subject('Tasdiqlash Emaili')
            ->view('send_messages')
            ->attach(Attachment::fromPath(public_path($this->qrCodePath))
                    ->as('qrcode.svg')
                    ->withMime('image/svg+xml'));
    }
}
