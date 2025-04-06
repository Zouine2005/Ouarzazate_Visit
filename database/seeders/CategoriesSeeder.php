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
            [
                'name_fr' => 'Attractions touristiques',
                'name_en' => 'Tourist Attractions',
                'name_ar' => 'المعالم السياحية',
                'name_es' => 'Atracciones turísticas',
                'image' => 'categories/attraction.jpg'
            ],

            [
                'name_fr' => 'Shopping traditionnel',
                'name_en' => 'Traditional Shopping',
                'name_ar' => 'التسوق التقليدي',
                'name_es' => 'Compras Tradicionales',
                'image' => 'categories/shopping.jpg'
            ],

            [
                'name_fr' => 'Circuit touristique',
                'name_en' => 'Tourist Circuit',
                'name_ar' => 'الدائرة السياحية',
                'name_es' => 'Circuito Turístico',
                'image' => 'categories/emergency.jpg'
            ],

            [
                'name_fr' => 'Hebergement',
                'name_en' => 'Accommodation',
                'name_ar' => 'الإقامة',
                'name_es' => 'Alojamiento',
                'image' => 'categories/hotel.jpg'
            ],

            [
                'name_fr' => 'Restaurants',
                'name_en' => 'Restaurants',
                'name_ar' => 'المطاعم',
                'name_es' => 'Restaurantes',
                'image' => 'categories/restaurant.jpeg'
            ],
            [
                'name_fr' => 'Transports',
                'name_en' => 'Transports',
                'name_ar' => 'وسائل النقل',
                'name_es' => 'Transportes',
                'image' => 'categories/transport.jpg'
            ],

            [
                'name_fr' => 'Guides touristique',
                'name_en' => 'Tourist Guides',
                'name_ar' => 'المرشدين السياحيين',
                'name_es' => 'Guías Turísticos',
                'image' => 'categories/spa.jpg'
            ],

            [
                'name_fr' => 'Supermarchés',
                'name_en' => 'Supermarkets',
                'name_ar' => 'محلات السوبر ماركت',
                'name_es' => 'Supermercados',
                'image' => 'categories/supermarket.jpg'
            ],

            [
                'name_fr' => 'Hôpitaux',
                'name_en' => 'Hospitals',
                'name_ar' => 'المستشفيات',
                'name_es' => 'Hospitales',
                'image' => 'categories/hospital.jpg'
            ],
            [
                'name_fr' => 'Pharmacies',
                'name_en' => 'Pharmacies',
                'name_ar' => 'الصيدليات',
                'name_es' => 'Farmacias',
                'image' => 'categories/pharmacy.jpg'
            ],
            [
                'name_fr' => 'Commissariats',
                'name_en' => 'Police Stations',
                'name_ar' => 'مراكز الشرطة',
                'name_es' => 'Comisarías',
                'image' => 'categories/police.jpg'
            ],
        ]);
    }

}
