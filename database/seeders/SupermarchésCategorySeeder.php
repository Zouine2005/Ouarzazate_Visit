<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupermarchésCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('supermarchés_categories')->insert([
            [
                'name_fr' => 'Supermarché',
                'name_en' => 'Supermarket',
                'name_ar' => 'سوبر ماركت',
                'name_es' => 'Supermercado',
                'image' => 'categories/supermarket.jpg'
            ],
        ]);
    }
}
