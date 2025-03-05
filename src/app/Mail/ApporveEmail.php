<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApporveEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $qrCode;

    public function __construct($qrCode)
    {
        $this->qrCode = $qrCode;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'test',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'send_messages',
        );
    }

    public function attachments(): array
    {
        return [
            Attachment::fromPath($this->qrCode)
                ->as('qrcode.png')
                ->withMime('image/png'),
        ];
    }
}
