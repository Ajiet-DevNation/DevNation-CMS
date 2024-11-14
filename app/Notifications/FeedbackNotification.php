<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FeedbackNotification extends Notification
{
    use Queueable;

    protected $form_link;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $form_link)
    {
        $this->form_link = $form_link;
    }

    /**
     * Get the notification's delivery channels.
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
            ->subject('Feedback Link for Your Event')
            ->line('Please find the quiz link for the event below:')
            ->action('Give your FeedBack', $this->form_link)
            ->line('Thank you for participating!');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray(object $notifiable): array
    {
        return [
            'quiz_link' => $this->form_link,
        ];
    }
}
    