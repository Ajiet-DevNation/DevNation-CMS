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
    public function __construct( $event )
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
        ->subject('Event Registration Successful')
        ->view('events.event_registration', [
            'userName' => $notifiable->name,
            'eventName' => $this->event->name,
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