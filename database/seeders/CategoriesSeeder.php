<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    \DB::table('categories')->insert([
        ['name' => 'Attractions touristiques'],
        ['name' => 'Restaurants'],
        ['name' => 'Hôtels et Maisons d\'hôtes'],
        ['name' => 'Aéroport'],
        ['name' => 'Shopping traditionnel'],
        ['name' => 'Pharmacies'],
        ['name' => 'Hôpitaux'],
        ['name' => 'Commissariats'],
        ['name' => 'Numéros d\'urgence'],
        ['name' => 'Supermarchés'],
        ['name' => 'Transports'],
        ['name' => 'Hammam & Spa'],
    ]);
}

}
