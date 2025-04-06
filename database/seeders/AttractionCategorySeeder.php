<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttractionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('attraction_categories')->insert([
            [
                'name_fr' => 'Attractions touristiques',
                'name_en' => 'Tourist Attractions',
                'name_ar' => 'المعالم السياحية',
                'name_es' => 'Atracciones turísticas',
                'image' => 'categories/attraction.jpg'
            ],
        ]);
    }
            
        
}


