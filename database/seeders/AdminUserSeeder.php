<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Buat user spesifik sesuai request
        User::create([
            'name' => 'User Spesifik',
            'phone' => '087864307597', 
            'password' => Hash::make('password'), 
            'role' => 'admin', 
        ]);

        // 2. Buat Admin default
        User::create([
            'name' => 'Admin',
            'phone' => '6289525456346', 
            'password' => Hash::make('password'), 
            'role' => 'admin',
        ]);

        // 3. Buat 15 user random tambahan (SEMUA ADMIN)
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 15; $i++) {
            User::create([
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]);
        }
    }
}
