<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EventNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    protected $event;
    protected $registeration;

    // Constructor for submission to give events and registration
    public function __construct($event, $registeration)
    {
        $this->event = $event;
        $this->registeration = $registeration;
    }
    
    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    // Email design using HTML
    public function toMail(object $notifiable): MailMessage
    {
       //Returning MailMessage with HTML code 
       return (new MailMessage)
       ->subject('Event Registration Successful')
       ->view('events.event_registration', [
           'userName' => $notifiable->name,
           'eventName' => $this->event->name,
           'registrationStatus' => $this->registeration->status,
           'eventUrl' => url('/event-details/' . $this->event->id),
       ]);
}

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
