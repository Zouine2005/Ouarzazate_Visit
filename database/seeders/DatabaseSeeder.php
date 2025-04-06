<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            //les catégories
             AttractionCategorySeeder::class,
             CircuitCategorySeeder::class,
             CommissariatsCategorySeeder::class,
             GuidesCategorySeeder::class,
             HebergementCategorySeeder::class,
             HôpitauxCategorySeeder::class,
             PharmaciesCategorySeeder::class,
             RestaurantsCategorySeeder::class,
             ShoppingCategorySeeder::class,
             SupermarchésCategorySeeder::class,
             TransportsCategorySeeder::class,
             // services des attractions
             AttractionServiceSeeder::class,
        ]);
        
    }
}
