<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CircuitCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('circuit_categories')->insert([
            [
                'name_fr' => 'Circuit touristique',
                'name_en' => 'Tourist Circuit',
                'name_ar' => 'الدائرة السياحية',
                'name_es' => 'Circuito Turístico',
                'image' => 'categories/circuit.png'
            ],
        ]);
    }
}
