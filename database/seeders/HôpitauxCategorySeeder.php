<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HôpitauxCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('hôpitaux_categories')->insert([
            [
                'name_fr' => 'Hôpitaux',
                'name_en' => 'Hospitals',
                'name_ar' => 'مستشفيات',
                'name_es' => 'Hospitales',
                'image' => 'categories/hospital.jpg'
            ],
        ]);
    }
}
