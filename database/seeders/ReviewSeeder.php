<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $reviews = [
            [
                'author_name' => 'María G.',
                'content' => 'Excelente atención y habitaciones muy limpias. El desayuno está delicioso y la vista al mar es increíble. Volveremos sin duda.',
                'rating' => 5,
                'review_date' => '2025-01-15',
                'source' => 'google',
                'active' => true,
                'order' => 0,
            ],
            [
                'author_name' => 'Carlos R.',
                'content' => 'Muy buen hotel en Omoa. La playa está cerca y el personal es muy amable. Recomendado para familias.',
                'rating' => 5,
                'review_date' => '2025-01-08',
                'source' => 'google',
                'active' => true,
                'order' => 1,
            ],
            [
                'author_name' => 'Ana L.',
                'content' => 'Tranquilo y acogedor. Perfecto para desconectar. Las habitaciones tienen todo lo necesario y el restaurante muy rico.',
                'rating' => 5,
                'review_date' => '2024-12-22',
                'source' => 'manual',
                'active' => true,
                'order' => 2,
            ],
            [
                'author_name' => 'Roberto M.',
                'content' => 'Buena relación calidad-precio. El trópico se siente en cada rincón. Repetiremos en vacaciones.',
                'rating' => 4,
                'review_date' => '2024-12-10',
                'source' => 'google',
                'active' => true,
                'order' => 3,
            ],
            [
                'author_name' => 'Laura S.',
                'content' => 'Nos encantó el ambiente. Muy limpio, buen wifi y el personal siempre dispuesto a ayudar. El lugar donde el descanso se encuentra con la belleza natural, tal cual dicen.',
                'rating' => 5,
                'review_date' => '2024-11-28',
                'source' => 'google',
                'active' => true,
                'order' => 4,
            ],
            [
                'author_name' => 'José P.',
                'content' => 'Hotel muy recomendable en la costa. Desayuno variado y habitaciones cómodas. Ideal para una escapada de fin de semana.',
                'rating' => 4,
                'review_date' => '2024-11-15',
                'source' => 'manual',
                'active' => true,
                'order' => 5,
            ],
            [
                'author_name' => 'Patricia V.',
                'content' => 'Una experiencia maravillosa. Desde la llegada nos trataron excelente. Las ofertas que tienen son muy buenas. Volveremos.',
                'rating' => 5,
                'review_date' => '2024-10-30',
                'source' => 'google',
                'active' => true,
                'order' => 6,
            ],
            [
                'author_name' => 'Miguel Ángel T.',
                'content' => 'Lugar tranquilo y bien ubicado. La playa a un paso. Solo echo en falta un poco más de señal en la habitación pero en general todo muy bien.',
                'rating' => 4,
                'review_date' => '2024-10-12',
                'source' => 'google',
                'active' => true,
                'order' => 7,
            ],
            [
                'author_name' => 'Sandra N.',
                'content' => 'Perfecto para desconectar. El restaurante tiene platos deliciosos y el personal es muy atento. Daphne Breeze es una gran elección en Omoa.',
                'rating' => 5,
                'review_date' => '2024-09-20',
                'source' => 'manual',
                'active' => true,
                'order' => 8,
            ],
            [
                'author_name' => 'Fernando C.',
                'content' => 'Muy buena estancia. Habitaciones amplias, aire acondicionado que funciona bien y el desayuno incluido está muy bien. Recomendado.',
                'rating' => 5,
                'review_date' => '2024-09-05',
                'source' => 'google',
                'active' => true,
                'order' => 9,
            ],
        ];

        foreach ($reviews as $data) {
            Review::create($data);
        }
    }
}
