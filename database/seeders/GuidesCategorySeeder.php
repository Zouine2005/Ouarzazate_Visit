<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuidesCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('guides_categories')->insert([
            [
                'name_fr' => 'Guides touristique',
                'name_en' => 'Tourist Guide',
                'name_ar' => 'مرشد سياحي',
                'name_es' => 'Guía Turística',
                'image' => 'categories/guides.jpg'
            ],
        ]);
    }
}
