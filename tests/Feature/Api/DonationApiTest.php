<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class DonationApiTest extends TestCase
{
    use RefreshDatabase;
    public function test_can_create_donation_request()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $response = $this->getJson('/api/v1/donation-request/create',[
            'blood_type' => 'AB+',
            'city_id' => 1,
            'details' => 'Test details',
            'patient_name' => 'Test Patient',
            'patient_age' => 25,
            'bags_number' => 2,
            'hospital_name' => 'Test Hospital',
            'hospital_address' => 'Test Hospital Address',
            'patient_phone_number' => '0123456789',
            'latitude' => '30.123456',
            'longitude' => '31.123456',
            'client_id' => 1
        ]);

        $response->assertStatus(200);
    }
}
