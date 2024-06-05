<?php

namespace Database\Seeders;

use App\Models\Donation_request;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DonationRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Donation_request::factory(10)->create();
    }
}
