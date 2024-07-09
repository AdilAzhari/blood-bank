<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class GeneralApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthenticated_user_cannot_access_protected_routes()
    {
        $response = $this->getJson('/api/v1/governorates');
        $response->assertStatus(401);

        $response = $this->getJson('/api/v1/posts');
        $response->assertStatus(401);

        $response = $this->getJson('/api/v1/donation-request/create',[
            'blood_type_id' => 1,
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

        $response->assertStatus(401);
    }
    public function test_can_get_governorates()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $response = $this->getJson('/api/v1/governorates');
        $response->assertStatus(200);

        $response = $this->getJson('/api/v1/posts');
        $response->assertStatus(200);

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

        $response->assertStatus(500);
    }

    // public function test_can_get_settings()
    // {
    //     $response = $this->getJson('/api/settings');

    //     $response->assertStatus(200);
    // }

    // public function test_can_contact_us()
    // {
    //     $response = $this->post('/api/contactus', [
    //         'name' => 'Test User',
    //         'email' => 'test@gmail.com',
    //         'message' => 'This is a test message.'
    //     ]);
    // }
}
