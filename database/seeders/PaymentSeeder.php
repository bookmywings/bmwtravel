<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\User;
use Faker\Factory as Faker;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $users = User::pluck('id');

        foreach (range(1, 10) as $i) {
            Payment::create([
                'user_id' => $faker->randomElement($users),
                'amount' => $faker->randomFloat(2, 1000, 20000),
                'status' => $faker->randomElement(['success', 'pending', 'failed']),
                'method' => $faker->randomElement(['Razorpay', 'UPI', 'Card']),
                'transaction_id' => strtoupper($faker->bothify('TXN###??')),
                'payment_date' => $faker->dateTimeBetween('-10 days', 'now'),
            ]);
        }
    }
}
