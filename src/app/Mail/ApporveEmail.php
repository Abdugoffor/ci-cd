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

        if (file_exists(public_path($this->qrCode))) {
            return [
                Attachment::fromPath(public_path($this->qrCode))
                    ->as('qrcode.svg')
                    ->withMime('image/svg+xml'),

                // Attachment::fromPath(public_path('uploaded/05-03-20255JgdIl3YIQvYh1yC5BHeUFf9NBC0K4nkjRuBHsmk.jpg'))
                // ->as('qrcode.jpg')
                // ->withMime('image/jpeg'),
            ];
        }
        return [];
        // return [
        //     Attachment::fromPath(public_path('uploaded/05-03-20255JgdIl3YIQvYh1yC5BHeUFf9NBC0K4nkjRuBHsmk.jpg'))
        //         ->as('qrcode.jpg')
        //         ->withMime('image/svg+xml'),
        // ];

        // return [
        //     Attachment::fromPath(public_path('uploaded/05-03-20255JgdIl3YIQvYh1yC5BHeUFf9NBC0K4nkjRuBHsmk.jpg'))
        //         ->as('qrcode.jpg')        // Fayl nomini JPG ga moslashtirdik
        //         ->withMime('image/jpeg'), // MIME turi JPG uchun
        // ];
    }
}
