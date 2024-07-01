<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CustomerOrder;
use App\Models\CustomerOrders;
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
                'customer_id' => fake()->randomElement(CustomerOrder::all()->pluck('id')),
                'unit' => fake()->randomNumber(1),
                'price' => fake()->randomNumber(6),

            ]);
        }
    }
}
