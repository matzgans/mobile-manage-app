<?php

namespace Database\Seeders;

use App\Models\CustomerOrder;
use App\Models\CustomerOrders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerOrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 7; $i++) {
            # code...
            CustomerOrder::create([
                'ktp_id' => fake()->randomNumber(7),
                'name' => fake()->name(),
                'address' => fake()->address(),
                'phone' => fake()->randomNumber(8),
            ]);
        }
    }
}
