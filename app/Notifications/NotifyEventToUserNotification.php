<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyEventToUserNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $event;
    public function __construct($event)
    {
        $this->event = $event;
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
            ->subject("Important Update for Your Upcoming Event")
            ->greeting("Hello, {$notifiable->name}")
            ->line("We have an important update regarding the event you registered for.")
            ->line("Please review the event details below and let us know if you have any questions:")
            ->line("**Event Name:** {$this->event->name}")
            ->line("**Date:** {$this->event->start_date->format('d-m-Y')}")
            ->line("**Location:** {$this->event->location}")
            ->action('View Event Details', url("/event-details/{$this->event->id}"))
            ->line("Thank you for your attention, and we look forward to seeing you at the event!");
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'event_id' => $this->event->id,
            'event_name' => $this->event->name,
        ];
    }
}
