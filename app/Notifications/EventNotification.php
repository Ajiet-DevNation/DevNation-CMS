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
    public function __construct( $event, $registeration )
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
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject('Event Registration Successful')
        ->greeting('Greetings! ' . $notifiable->name)
        ->line('Your registration for the event'. $this->event->name .' has been successfully completed.')
        ->line('status of your registeration for the '. $this->event->name .' is ' . $this->registeration->status .'')
        ->line('We look forward to your esteemed presence at the event.')
        ->action('View Event', url('/event-details/' . $this->event->id))
        ->line('Thank you for completing your registration!');
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
