<?php

namespace Database\Factories;

use App\Models\Blood_type;
use App\Models\City;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Donation_request>
 */
class DonationRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patient_name' => $this->faker->name,
            'patient_age' => $this->faker->numberBetween(1, 100),
            'bags_num' => $this->faker->numberBetween(1, 10),
            'hospital_name' => $this->faker->company,
            'hospital_address' => $this->faker->address,
            'city_id' => City::inRandomOrder()->first()->id,
            'phone' => $this->faker->phoneNumber,
            'notes' => $this->faker->text,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'client_id' => Client::inRandomOrder()->first()->id,
            'blood_type_id' => Blood_type::inRandomOrder()->first()->id,
            'created_at' => '2021-09-01 00:00:00',
        ];
    }
}
