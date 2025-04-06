<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AttractionServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('attraction_services')->insert([
            [
                'name_fr' => 'Kasbah de Tifoultoute',
                'name_en' => 'Kasbah de Tifoultoute',
                'name_ar' => 'قصبة تيفولتوت',
                'name_es' => 'Kasbah de Tifoultoute',
                'description_fr' => 'Cette kasbah se dresse sur un éperon rocheux qui domine la vallée de l`oued Ouarzazate.',
                'description_en' => 'This kasbah stands on a rocky spur overlooking the valley of the Oued Ouarzazate.',
                'description_ar' => 'تقع هذه القصبة على نتوء صخري يطل على وادي ورزازات.',
                'description_es' => 'Esta kasbah se alza sobre un espolón rocoso que domina el valle del Oued Ouarzazate.',
                'address' => 'Ouarzazate, Maroc',
                'latitude' => '30.926727345004124',
                'longitude' => '-6.990437581763804',
                'category_id' => 1, 
                'video' => 'https://www.youtube.com/watch?v=exemple1',
                'photos' => json_encode([
                    'services_picture/Tifoultoute.JPG',
                    'services_picture/Tifoultoute2.jpg',
                    'services_picture/Tifoultoute3.jpg',
                    'services_picture/Tifoultoute4.jpg',
                    'services_picture/Tifoultoute5.jpg'
                ]),
                'rating' => 4.8
            ],
            [
                'name_fr' =>'Aït Benhaddou',
                'name_en' => 'Aït Benhaddou',
                'name_ar' => 'آيت بنحدو',
                'name_es' => 'Aït Benhaddou',
                'description_fr' => 'Aït Ben Haddou est un ksar historique situé dans la province de Ouarzazate, au sud du Maroc. Ce village fortifié, construit en pisé (terre crue mélangée à de la paille), est un chef-d&apos;&oelig;uvre architectural du sud marocain. Il est classé au patrimoine mondial de l’UNESCO depuis 1987, témoignant de l’importance de cette région dans l’histoire des caravanes transsahariennes.
                                      Perché sur une colline surplombant l’oued Ounila, Aït Ben Haddou était autrefois une halte stratégique pour les caravanes reliant Tombouctou à Marrakech. Son architecture impressionnante se compose de kasbahs majestueuses, d’étroites ruelles pavées et d’un grenier collectif situé en hauteur pour protéger les récoltes des pillages.
                                      Le ksar est aujourd’hui presque inhabité, sauf par quelques familles qui y vivent encore, préservant ainsi les traditions et l’authenticité du site. Grâce à son caractère unique et son décor hors du temps, Aït Ben Haddou a servi de lieu de tournage pour de nombreux films et séries célèbres, tels que Gladiator, Game of Thrones, Lawrence d’Arabie et Prince of Persia.
                                      Les visiteurs peuvent explorer les ruelles du ksar, grimper jusqu’au sommet pour profiter d’une vue panoramique sur la vallée, ou encore découvrir l’artisanat local dans les échoppes des habitants. Situé à environ 30 km de Ouarzazate, Aït Ben Haddou est une destination incontournable pour les amateurs d’histoire, de culture et de paysages époustouflants.',
                'description_en' => 'Ancient Kasbah listed as a UNESCO World Heritage Site.',
                'description_ar' => 'قصبة قديمة مدرجة في قائمة التراث العالمي لليونسكو.',
                'description_es' => 'Antigua Kasbah clasificada como Patrimonio de la Humanidad por la UNESCO.',
                'address' => 'Ouarzazate, Maroc',
                'latitude' => '31.044127966972273',
                'longitude' => '-7.129483227281133',
                'category_id' => 1,
                'video' => 'videos/hero.mp4',
                'photos' => json_encode([
                    'services_picture/aitbenhaddou.jpg',
                    'services_picture/aitbenhaddou2.jpg',
                    'services_picture/aitbenhaddou3.jpg',
                    'services_picture/aitbenhaddou4.jpg',
                    'services_picture/aitbenhaddou5.jpg'
                ]),
                'rating' => 3.0
            ],
        ]);
    }
}
