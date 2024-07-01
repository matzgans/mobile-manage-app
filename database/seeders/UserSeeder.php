<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Jamal',
            'email' => 'Jamal@gmail.com',
            'id_card' => fake()->randomNumber(),
            'password' => bcrypt('password'),
            'place_birth' => "Gorontalo",
            'date_birth' => '04-01-1978',
            'address' => 'Padang',
            'religion' => 'Islam',
            'phone' => fake()->phoneNumber(),
            'education' => 'S.T',
            'devision' => 'Direktur',
            'salary' => 201031,
        ]);

        $user->assignRole('director');

        $user = User::create([
            'name' => 'sucipto',
            'email' => 'sucipto@gmail.com',
            'id_card' => fake()->randomNumber(),
            'password' => bcrypt('password'),
            'place_birth' => "Gorontalo",
            'date_birth' => '04-01-1978',
            'address' => 'Padang',
            'religion' => 'Islam',
            'phone' => fake()->phoneNumber(),
            'education' => 'S.T',
            'devision' => 'Marketing',
            'salary' => 201031,
        ]);

        $user->assignRole('sales');
        $user = User::create([
            'name' => 'amat',
            'email' => 'amat@gmail.com',
            'id_card' => fake()->randomNumber(),
            'password' => bcrypt('password'),
            'place_birth' => "Padang",
            'date_birth' => '04-01-1978',
            'address' => 'Padang',
            'religion' => 'Islam',
            'phone' => fake()->phoneNumber(),
            'education' => 'S.T',
            'devision' => 'Sparepart',
            'salary' => 201031,
        ]);

        $user->assignRole('sparepart');
        $user = User::create([
            'name' => 'adi',
            'email' => 'adi@gmail.com',
            'id_card' => fake()->randomNumber(),
            'password' => bcrypt('password'),
            'place_birth' => "Padang",
            'date_birth' => '04-01-1978',
            'address' => 'Padang',
            'religion' => 'Islam',
            'phone' => fake()->phoneNumber(),
            'education' => 'S.T',
            'devision' => 'Frontdesk',
            'salary' => 201031,
        ]);

        $user->assignRole('frontdesk');
    }
}
