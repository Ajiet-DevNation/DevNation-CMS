<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class QuizNotification extends Notification
{
    use Queueable;

    protected $quizLink;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $quizLink)
    {
        $this->quizLink = $quizLink;
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
        ->subject('Quiz Link for Your Event')
        ->line('Please find the quiz link for the event below:')
        ->action('Take Quiz', $this->quizLink)
        ->line('Thank you for participating!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'quiz_link' => $this->quizLink,
        ];
    }
}
