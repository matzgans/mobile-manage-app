<?php

namespace Database\Seeders;

use App\Models\BuyData;
use App\Models\SellData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SellDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 6; $i++) {
            SellData::create([
                'code' => Str::random(6),
                'sale_date' => fake()->date(),
                'unit' => fake()->randomNumber(1),
                'price' => fake()->randomNumber(7),
            ]);
        }
    }
}
