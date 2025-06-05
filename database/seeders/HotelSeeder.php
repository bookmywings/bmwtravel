<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hotel;
use Faker\Factory as Faker;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        foreach (range(1, 10) as $i) {
            Hotel::create([
                'name' => $faker->company() . ' Hotel',
                'location' => $faker->city(),
                'stars' => $faker->numberBetween(3, 5),
                'description' => $faker->paragraph(),
                'price_per_night' => $faker->randomFloat(2, 2500, 10000),
                'currency' => 'INR',
                'image' => 'hotels/' . $faker->uuid . '.jpg',
            ]);
        }
    }
}
