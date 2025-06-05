<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Flight;
use Faker\Factory as Faker;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $faker = Faker::create();
       
       foreach (range(1, 10) as $i) {
            Flight::create([
                'airline_name' => $faker->company(),
                'flight_number' => 'FL' . $faker->unique()->numberBetween(100, 999),
                'origin' => 'DEL',
                'destination' => 'BOM',
                'departure_time' => now()->addDays($i)->setTime(10, 0),
                'arrival_time' => now()->addDays($i)->setTime(12, 30),
                'fare' => $faker->randomFloat(2, 3000, 15000),
                'currency' => 'INR',
                'duration' => '2h 30m',
            ]);
        }
    }
}
