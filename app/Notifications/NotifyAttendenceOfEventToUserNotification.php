<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyAttendenceOfEventToUserNotification extends Notification
{
    use Queueable;

    protected $event;

    /**
     * Create a new notification instance.
     */
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
        // Generate the attendance marking URL, using the event and user IDs
        $attendanceLink = route('attendance.take', [
            'event' => $this->event->id,
            'user' => $notifiable->id,
        ]);

        return (new MailMessage)
            ->subject('Mark Attendance for ' . $this->event->name)
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line('You are invited to mark your attendance for ' . $this->event->name . '.')
            ->action('Mark Attendance', $attendanceLink)
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
            'event_id' => $this->event->id,
            'event_name' => $this->event->name,
        ];
    }
}
