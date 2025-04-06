<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('restaurants_categories')->insert([
            [
                'name_fr' => 'Restaurant',
                'name_en' => 'Restaurant',
                'name_ar' => 'مطعم',
                'name_es' => 'Restaurante',
                'image' => 'categories/restaurant.jpeg'
            ],
        ]);
    }
}
