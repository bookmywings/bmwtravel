<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CmsPage;
use Faker\Factory as Faker;

class CmsPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        CmsPage::create([
            'slug' => 'about-us',
            'title' => 'About Us',
            'content' => '<h1>Welcome to BookMyWings</h1><p>Your trusted travel partner.</p>',
        ]);
    }
}
