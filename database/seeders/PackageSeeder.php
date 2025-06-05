<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Package;
use Faker\Factory as Faker;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        foreach (range(1, 10) as $i) {
            Package::create([
                'title' => $faker->sentence(3),
                'destination' => $faker->city(),
                'duration_days' => $faker->numberBetween(3, 10),
                'price_per_person' => $faker->randomFloat(2, 8000, 25000),
                'description' => $faker->paragraph(2),
                'inclusions' => json_encode(['Hotel', 'Transport', 'Meals']),
                'image' => 'packages/' . $faker->uuid . '.jpg',
            ]);
        }
    }
}
