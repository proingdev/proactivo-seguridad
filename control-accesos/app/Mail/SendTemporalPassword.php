<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendTemporalPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $username;
    public $name;
    public $password;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $password, $username)
    {
        //
        $this->username = $username;
        $this->name = $name;
        $this->password = $password;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Aplicativo de control de accesos',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.first-password',
            with: [
                'name' => $this->name,
                'password' => $this->password,
                'username' => $this->username,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
