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
                'title' => 'Urea Fertilizer (46-0-0)',
                'price' => 35.99,
                'image' => 'images/fertilizers/urea/1.jpg',
                'description' => 'High nitrogen content fertilizer perfect for promoting leafy green growth. Ideal for crops requiring rapid vegetative development.',
                'status' => 'in_stock',
            ],
            [
                'title' => 'NPK 15-15-15',
                'price' => 42.50,
                'image' => 'images/fertilizers/npk/1.jpg',
                'description' => 'Balanced complete fertilizer providing equal parts nitrogen, phosphorus, and potassium for overall plant health and growth.',
                'status' => 'in_stock',
            ],
            [
                'title' => 'Organic Compost',
                'price' => 28.00,
                'image' => 'images/fertilizers/compost/1.jpg',
                'description' => 'Natural organic matter that improves soil structure, water retention, and provides slow-release nutrients for sustainable farming.',
                'status' => 'in_stock',
            ],
            [
                'title' => 'Phosphate Fertilizer (DAP)',
                'price' => 38.75,
                'image' => 'images/fertilizers/dap/1.jpg',
                'description' => 'Di-ammonium phosphate provides essential phosphorus for root development, flowering, and fruit formation.',
                'status' => 'in_stock',
            ],
            [
                'title' => 'Potash (Muriate of Potash)',
                'price' => 32.99,
                'image' => 'images/fertilizers/potash/1.jpg',
                'description' => 'High potassium fertilizer that strengthens plants, improves disease resistance, and enhances fruit quality.',
                'status' => 'in_stock',
            ],
            [
                'title' => 'Calcium Ammonium Nitrate',
                'price' => 36.50,
                'image' => 'images/fertilizers/can/1.jpg',
                'description' => 'Quick-acting nitrogen fertilizer with calcium that prevents blossom-end rot and promotes strong cell wall development.',
                'status' => 'in_stock',
            ],
            [
                'title' => 'Liquid Seaweed Extract',
                'price' => 45.99,
                'image' => 'images/fertilizers/seaweed/1.jpg',
                'description' => 'Organic liquid fertilizer rich in micronutrients, growth hormones, and trace elements for enhanced plant vigor.',
                'status' => 'in_stock',
            ],
            [
                'title' => 'Sulfur Fertilizer',
                'price' => 29.99,
                'image' => 'images/fertilizers/sulfur/1.jpg',
                'description' => 'Essential for protein synthesis and enzyme function. Helps improve soil pH and nutrient availability.',
                'status' => 'in_stock',
            ],
            [
                'title' => 'Micronutrient Mix',
                'price' => 52.00,
                'image' => 'images/fertilizers/micro/1.jpg',
                'description' => 'Complete blend of zinc, iron, manganese, copper, and boron to prevent deficiencies and optimize crop health.',
                'status' => 'in_stock',
            ],
            [
                'title' => 'Bone Meal Organic',
                'price' => 34.25,
                'image' => 'images/fertilizers/bonemeal/1.jpg',
                'description' => 'Slow-release organic phosphorus source perfect for root crops, bulbs, and flowering plants.',
                'status' => 'limited',
            ],
        ];

        Fertilizer::insert($fertilizers);
    }
}