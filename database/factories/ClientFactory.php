<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'd_o_b' => $this->faker->dateTimeBetween('-50 years', '-20 years')->format('Y-m-d'),
            'last_donation_date' => $this->faker->dateTimeBetween('-1 years', 'now')->format('Y-m-d'),
            'pin_code' => $this->faker->postcode,
            'password' => bcrypt('123456'),
            'blood_type_id' => $this->faker->numberBetween(1, 8),
            'city_id' => City::inRandomOrder()->first()->id,
            'is_active' => 1,
            'api_token' => str::random(60),
        ];
    }
}
