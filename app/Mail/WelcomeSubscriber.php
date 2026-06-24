<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeSubscriber extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new \Illuminate\Mail\Mailables\Address(
                config('mail.from.address'),
                'Omonge Adero'
            ),
            subject: 'Welcome to Brian Adero Legal Insights',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.subscribers.welcome',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
