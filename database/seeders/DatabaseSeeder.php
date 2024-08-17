<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        $this->call([
            // BloodTypeSeeder::class,
            // GovernorateSeeder::class,
            // CitySeeder::class,
            // CategorySeeder::class,
            // PostSeeder::class,
            // ClientSeeder::class,
            // settingSeeder::class,
            // ContactSeeder::class,
            // DonationRequestSeeder::class,
            // NotificationSeeder::class,
            // PermissionSeeder::class,
        ]);
        // $city->clients()->attach($client->id);
        // $client = Client::factory()->create();
        // $post = Post::factory()->create();
        // $post->client()->associate($client);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
