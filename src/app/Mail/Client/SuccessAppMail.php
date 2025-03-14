<?php
namespace App\Mail\Client;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SuccessAppMail extends Mailable
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
            subject: 'Success App Mail',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'sendEmail.client.success',
            with: [
                'qrCode' => $this->qrCode,
            ]
        );
    }

    public function attachments(): array
    {
        return [
            // Attachment::fromPath($this->qrCode)
            //     ->as('qrcode.png')
            //     ->withMime('image/png'),
        ];
    }
}
