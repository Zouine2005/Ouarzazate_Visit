<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransportsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('transports_categories')->insert([
            [
                'name_fr' => 'Transport',
                'name_en' => 'Transport',
                'name_ar' => 'وسائل النقل',
                'name_es' => 'Transporte',
                'image' => 'categories/Transport.jpg'
            ],
        ]);
    }
}
