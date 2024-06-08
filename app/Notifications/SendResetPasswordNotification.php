<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendResetPasswordNotification extends Notification
{
    use Queueable;

    public $user;
    public $resetPassCode;
    public $phone;

    /**
     * Create a new notification instance.
     */
    public function __construct($user, string $resetPassCode, string $phone)
    {
        $this->user = $user;
        $this->resetPassCode = $resetPassCode;
        $this->phone = $phone;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting('Hello!')
            ->from('bloodbank@gmail.com')
            ->line('We have an important update for you.')
            ->line("You have requested to reset your password from this number: {$this->phone}")
            ->line("Please enter this code to reset your password: {$this->resetPassCode}")
            ->salutation('Best regards,')
            ->salutation(config('app.name') . ' Team');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable): array
    {
        return [
            //
        ];
    }
}
