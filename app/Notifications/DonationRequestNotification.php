<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DonationRequestNotification extends Notification
{
    use Queueable;
    protected $donationRequest;
    /**
     * Create a new notification instance.
     */
    public function __construct($donationRequest)
    {
        $this->donationRequest = $donationRequest;
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
            ->subject('New Donation Request')
            ->line('A new donation request has been created for your blood type and city.')
            ->line('Patient Name: ' . $this->donationRequest->patient_name)
            ->line('Patient Age: ' . $this->donationRequest->patient_age)
            ->line('Number of Bags Needed: ' . $this->donationRequest->bags_number)
            ->line('Hospital Name: ' . $this->donationRequest->hospital_name)
            ->line('Hospital Address: ' . $this->donationRequest->hospital_address)
            ->line('Details: ' . $this->donationRequest->details)
            ->line('Thank you for being a donor!');
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
