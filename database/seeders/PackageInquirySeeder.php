<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PackageInquiry;
use App\Models\Package;
use Faker\Factory as Faker;

class PackageInquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $packages = Package::pluck('id');

        foreach (range(1, 10) as $i) {
            PackageInquiry::create([
                'package_id' => $faker->randomElement($packages),
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'phone' => $faker->phoneNumber(),
                'message' => $faker->sentence(),
                'travel_date' => $faker->dateTimeBetween('+1 weeks', '+1 months'),
                'no_of_persons' => $faker->numberBetween(1, 5),
            ]);
        }
    }
}
