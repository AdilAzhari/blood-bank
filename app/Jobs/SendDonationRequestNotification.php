<?php

namespace App\Jobs;

use App\Notifications\DonationRequestNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class SendDonationRequestNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $donationRequest;
    protected $clients;
    /**
     * Create a new job instance.
     */public function __construct(DonationRequest $donationRequest, $clients)
    {
        $this->donationRequest = $donationRequest;
        $this->clients = $clients;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Notification::send($this->clients, new DonationRequestNotification($this->donationRequest));
    }
}
