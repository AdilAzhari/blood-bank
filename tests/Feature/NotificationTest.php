<?php

namespace Tests\Feature;

use App\Models\BloodType;
use App\Models\City;
use App\Models\Client;
use App\Models\DonationRequest;
use App\Models\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NotificationTest extends TestCase
{
    use RefreshDatabase;
    public function test_creates_notification_and_attaches_clients()
    {
        $city = City::factory()->create();
        $bloodType = BloodType::factory()->create();
        $client = Client::factory()->create([
            'city_id' => $city->id,
            'blood_type_id' => $bloodType->id,
        ]);
        $donationRequest = DonationRequest::factory()->create([
            'city_id' => $city->id,
            'blood_type_id' => $bloodType->id,
            'client_id' => $client->id,
        ]);

        $response = $this->post('/api/notifications', [
            'title' => 'Test Notification',
            'content' => 'Test Notification Content',
            'donation_request_id' => $donationRequest->id,
        ]);

        $response->assertStatus(201);
        $donationRequest = DonationRequest::first();
        $this->assertNotNull($donationRequest);


        $notification = Notification::first();
        $this->assertNotNull($notification);
        $this->assertEquals('There Is A New Donation Request', $notification->title);
        $this->assertEquals($donationRequest->id, $notification->donation_request_id);

        // Assert the client was attached to the notification
        $this->assertTrue($notification->clients->contains($client));
    }
}
