<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Sale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) {
            $car = Sale::create([
                'car_id' => fake()->randomElement(Car::all()->pluck('id')),
                'id_ktp' => fake()->randomNumber(),
                'name' => fake()->name(),
                'phone' => fake()->phoneNumber(),
                'address' => fake()->address(),
                'unit' => fake()->randomNumber(),
                'price' => fake()->randomNumber(),
                'price_sum' => fake()->randomNumber(),

            ]);
        }
    }
}
