<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ServiceSeeder extends Seeder
{

    public function run(): void
    {
        $faker = Faker::create();
        $categories = Category::all();
        $users = User::all();

        if ($categories->isEmpty()) {
            $this->command->warn("⚠️  Aucune catégorie trouvée. Veuillez exécuter CategorySeeder !");
            return;
        }

        foreach (range(1, 20) as $index) {
            Service::create([
                'user_id' => $users->isNotEmpty() && $faker->boolean(80) ? $users->random()->id : null,
                'category_id' => $categories->random()->id,
                'name' => $faker->sentence(3),
                'description' => $faker->paragraph(),
                'image' => 'https://source.unsplash.com/300x200/?travel,hotel',
                'latitude' => $faker->latitude(),
                'longitude' => $faker->longitude(),
                'address' => $faker->address(),
                'phone' => $faker->phoneNumber(),
                'website' => $faker->url(),
                'is_approved' => $faker->boolean(70),
            ]);
        }

        $this->command->info("🎉  20 services ont été ajoutés !");
    }
}