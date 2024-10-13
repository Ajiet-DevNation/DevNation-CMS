<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EventRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $eventName;
    public $userName;

    /**
     * Create a new message instance.
     *
     * @param string $eventName
     * @param string $userName
     */
    public function __construct($eventName, $userName)
    {
        $this->eventName = $eventName;
        $this->userName = $userName;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Event Registration Mail',
        );
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Event Registration Confirmation: ' . $this->eventName)
                    ->view('events.event_registration');
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'events.event_registration',
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
