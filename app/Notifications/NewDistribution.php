<?php

namespace App\Notifications;

use App\Models\Distribution;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Str;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewDistribution extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Distribution $distribution)
    {
        //
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
                    ->subject("New Distribution from {$this->chirp->user->name}")
                    ->greeting("New Distribution from {$this->chirp->user->name}")
                    ->line(Str::limit($this->distribution->distribution, 50))
                    ->action('Go to DistroSailors', url('/'))
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
