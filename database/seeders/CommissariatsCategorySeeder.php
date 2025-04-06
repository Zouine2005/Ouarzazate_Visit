<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommissariatsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('commissariats_categories')->insert([
            [
                'name_fr' => 'Commissariats',
                'name_en' => 'Police Station',
                'name_ar' => 'مركز الامن',
                'name_es' => 'Estación de Policía',
                'image' => 'categories/police.jpg'
            ],
        ]);
    }
}
