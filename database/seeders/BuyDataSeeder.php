<?php

namespace Database\Seeders;

use App\Models\BuyData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BuyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 6; $i++) {
            BuyData::create([
                'code' => Str::random(6),
                'buying_date' => fake()->date(),
                'unit' => fake()->randomNumber(1),
                'price' => fake()->randomNumber(7),
            ]);
        }
    }
}
