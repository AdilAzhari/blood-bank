<?php

namespace App\Observers;

use App\Models\Client;
use App\Models\DonationRequest;
use Illuminate\Support\Facades\Log;

class DonationRequestObserver
{
    /**
     * Handle the DonationRequest "created" event.
     */
    public function Clients(DonationRequest $donationRequest)
    {
        return Client::whereHas('city', function ($q) use ($donationRequest) {
            $q->where('id', $donationRequest->city_id);
        })
            ->where('blood_type_id', $donationRequest->blood_type_id)
            ->pluck('id')
            ->toArray();
    }

    public function created(DonationRequest $donationRequest)
    {
        $clients = $this->Clients($donationRequest);

        Log::info('Eligible clients for notification', ['clients' => $clients]);

        if ($clients) {
            $notification = $donationRequest->client->notifications()->create([
                'title' => 'There Is A New Donation Request',
                'content' => 'There is a new donation request in your city with blood type of ' . $donationRequest->bloodType->name
                    . ' and ' . $donationRequest->bags_number . ' bags.',
                'donation_request_id' => $donationRequest->id,
            ]);

            Log::info('Created notification', ['notification' => $notification]);

            $notification->clients()->attach($clients);
        }
    }


    /**
     * Handle the DonationRequest "updated" event.
     */
    public function updated(DonationRequest $donationRequest): void
    {
        //
    }

    /**
     * Handle the DonationRequest "deleted" event.
     */
    public function deleted(DonationRequest $donationRequest): void
    {
        //
    }

    /**
     * Handle the DonationRequest "restored" event.
     */
    public function restored(DonationRequest $donationRequest): void
    {
        //
    }

    /**
     * Handle the DonationRequest "force deleted" event.
     */
    public function forceDeleted(DonationRequest $donationRequest): void
    {
        //
    }
}
