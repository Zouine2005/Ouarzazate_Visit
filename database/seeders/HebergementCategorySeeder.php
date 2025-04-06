<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HebergementCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('hebergement_categories')->insert([
            [
                'name_fr' => 'Hébergement',
                'name_en' => 'Accommodation',
                'name_ar' => 'الإقامة',
                'name_es' => 'Alojamiento',
                'image' => 'categories/hotel.jpg'
            ],
        ]);
    }
}
