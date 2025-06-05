<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FlightBooking;
use App\Models\User;
use App\Models\Flight;
use Faker\Factory as Faker;

class FlightBookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $users = User::pluck('id');
        $flights = Flight::pluck('id');

        foreach (range(1, 10) as $i) {
            FlightBooking::create([
                'user_id' => $faker->randomElement($users),
                'flight_id' => $faker->randomElement($flights),
                'booking_ref' => strtoupper($faker->bothify('BK###??')),
                'passenger_name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'phone' => $faker->phoneNumber(),
                'travel_date' => $faker->dateTimeBetween('+1 days', '+15 days'),
                'status' => $faker->randomElement(['confirmed', 'pending', 'cancelled']),
                'payment_id' => null, // Can be updated later
            ]);
        }
    }
}
