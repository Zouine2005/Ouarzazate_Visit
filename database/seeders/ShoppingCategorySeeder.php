<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShoppingCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('shopping_categories')->insert([
            [
                'name_fr' => 'Shopping traditionnel',
                'name_en' => 'Traditional Shopping',
                'name_ar' => 'التسوق التقليدي',
                'name_es' => 'Compras Tradicionales',
                'image' => 'categories/shopping.jpg'
            ],
        ]);
    }
}
