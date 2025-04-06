<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PharmaciesCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('pharmacies_categories')->insert([
            [
                'name_fr' => 'Pharmacie',
                'name_en' => 'Pharmacy',
                'name_ar' => 'صيدلية',
                'name_es' => 'Farmacia',
                'image' => 'categories/pharmacy.jpg'
            ],
        ]);
    }
}
