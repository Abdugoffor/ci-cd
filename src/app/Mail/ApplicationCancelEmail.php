<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplicationCancelEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $message;
    public function __construct($message)
    {
        $this->message = $message;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Application Cancel Email',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'cencel',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
