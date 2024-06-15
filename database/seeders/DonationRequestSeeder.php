<?php

namespace Database\Seeders;

use App\Models\DonationRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DonationRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DonationRequest::factory(40)->create();
        // DonationRequest::factory()->create([
        //     'patient_name' => 'Test Patient',
        //     'patient_age' => 30,
        //     'bags_num' => 2,
        //     'hospital_name' => 'Test Hospital',
        //     'hospital_address' => 'Test Hospital Address',
        //     'phone' => '01012345678',
        //     'notes' => 'Test Notes',
        //     'latitude' => 30.123456,
        //     'longitude' => 31.123456,
        //     'client_id' => 1,
        //     'city_id' => 1,
        //     'blood_type_id' => 1,
        // ]);
    }
}
