<?php

namespace Database\Seeders;

use App\Models\Fertilizer;
use Illuminate\Database\Seeder;

class FertilizersTableSeeder extends Seeder
{
    public function run(): void
    {
        Fertilizer::query()->delete();

        $fertilizers = [
            [
                'title' => 'Gypsum Fertilizer',
                'price' => 45.99,
                'image' => 'images/fertilizer/gypsum/1.jpg',
                'description' => 'Calcium and sulfur source improves soil structure and provides essential minerals. Enhances root development and reduces soil compaction for better drainage.',
                'status' => 'in_stock',
            ],
            [
                'title' => 'Urea 46% Nitrogen',
                'price' => 32.50,
                'image' => 'images/fertilizer/nitrogen/1.webp',
                'description' => 'High nitrogen content for vigorous leaf and stem growth. Perfect for leafy vegetables and early-stage crop development.',
                'status' => 'in_stock',
            ],
            [
                'title' => 'Boron Complex',
                'price' => 38.75,
                'image' => 'images/fertilizer/boron/1.webp',
                'description' => 'Essential boron compound improves flowering and fruit set. Prevents bud necrosis and enhances pollination success significantly.',
                'status' => 'in_stock',
            ],
            [
                'title' => 'Potassium Chloride 60% K₂O',
                'price' => 29.99,
                'image' => 'images/fertilizer/potassium/1.jpg',
                'description' => 'High potassium content for disease resistance and crop quality. Improves color, taste, and shelf life of fruits and vegetables.',
                'status' => 'in_stock',
            ],
            [
                'title' => 'Organic Sulfur Premium',
                'price' => 18.50,
                'image' => 'images/fertilizer/sulphur/1.webp',
                'description' => '100% organic sulfur enhances nutrient availability and soil health. Improves crop quality and supports beneficial microbial activity in soil.',
                'status' => 'in_stock',
            ],
            [
                'title' => 'Diammonium Phosphate 18:46:0',
                'price' => 41.75,
                'image' => 'images/fertilizer/phosphate/1.jpg',
                'description' => 'Nitrogen and phosphorus blend ideal for early crop growth. Promotes root development and early flowering for increased yields.',
                'status' => 'in_stock',
            ],
            [
                'title' => 'Zinc Complex',
                'price' => 24.99,
                'image' => 'images/fertilizer/zinc/1.jpg',
                'description' => 'Zinc-based micronutrient essential for enzyme function and plant growth. Prevents deficiency symptoms and improves overall crop productivity.',
                'status' => 'in_stock',
            ],
            [
                'title' => 'Molybdenum Complex',
                'price' => 19.99,
                'image' => 'images/fertilizer/molybdenum/1.jpg',
                'description' => 'Molybdenum micronutrient essential for nitrogen fixation in legumes. Improves nitrogen utilization and enhances crop nodulation.',
                'status' => 'in_stock',
            ],
            [
                'title' => 'Mixed Nutrient Blend',
                'price' => 22.75,
                'image' => 'images/fertilizer/mixed/1.webp',
                'description' => 'Complete nutrient mix with balanced NPK and micronutrients. Versatile formula suitable for all crop types and growing stages throughout the season.',
                'status' => 'in_stock',
            ],
            [
                'title' => 'Magnesium Sulfate',
                'price' => 52.99,
                'image' => 'images/fertilizer/magnesium/1.png',
                'description' => 'Magnesium-rich compound prevents yellowing and enhances photosynthesis. Improves plant vigor and increases yield potential significantly.',
                'status' => 'limited',
            ],
        ];

        Fertilizer::insert($fertilizers);
    }
}
