<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EventRegisterationStatusUpdateNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $event;
    protected $status;

    public function __construct($event, $status)
    {
        $this->event = $event;
        $this->status = $status;
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
        // dd($this->status);
        $mailMessage = new MailMessage();
        if ($this->status === 'success') {
            // Success Email
            $mailMessage->subject('Congratulations! Your Event Registration is Confirmed')
                ->greeting("Hello, {$notifiable->name}")
                ->line("We are pleased to inform you that your registration for the event \"{$this->event->name}\" has been successfully confirmed.")
                ->line("We look forward to your participation. Please find the event details below:")
                ->line("**Event:** {$this->event->name}")
                ->line("**Date:** {$this->event->date}")
                ->line("**Location:** {$this->event->location}")
                ->action('View Event Details', url("/events/{$this->event->id}"))
                ->line("Thank you for registering, and we are excited to have you join us!");
        } elseif ($this->status === 'rejected') {
            // Rejection Email
            $mailMessage->subject('Update on Your Event Registration')
                ->greeting("Hello, {$notifiable->name}")
                ->line("Thank you for your interest in our event \"{$this->event->name}\".")
                ->line("We regret to inform you that, after careful consideration, your registration could not be accepted at this time.")
                ->line("We appreciate your enthusiasm and encourage you to look out for future opportunities to participate in our events.")
                ->action('Explore More Events', url('/events'))
                ->line("Thank you for understanding, and we hope to see you at future events.");
        }

        return $mailMessage;
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
