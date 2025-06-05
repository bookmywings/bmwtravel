<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Hotel;
use App\Models\HotelBooking;
use Faker\Factory as Faker;

class HotelBookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $users = User::pluck('id');
        $hotels = Hotel::pluck('id');

        foreach (range(1, 10) as $i) {
            $checkIn = $faker->dateTimeBetween('+2 days', '+10 days');
            $checkOut = (clone $checkIn)->modify('+'.rand(1, 5).' days');

            HotelBooking::create([
                'user_id' => $faker->randomElement($users),
                'hotel_id' => $faker->randomElement($hotels),
                'guest_name' => $faker->name(),
                'check_in' => $checkIn,
                'check_out' => $checkOut,
                'total_amount' => $faker->randomFloat(2, 5000, 20000),
                'status' => $faker->randomElement(['confirmed', 'pending', 'cancelled']),
                'payment_id' => null,
            ]);
        }
    }
}
