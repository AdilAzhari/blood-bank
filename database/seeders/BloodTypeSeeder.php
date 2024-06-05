<?php

namespace Database\Seeders;

use App\Models\Blood_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bloodTypes = [
            'A+',
            'A-',
            'B+',
            'B-',
            'AB+',
            'AB-',
            'O+',
            'O-',
        ];
        foreach ($bloodTypes as $bloodType) {
            Blood_type::create([
                'name' => $bloodType,
            ]);
        }
    }
}
