<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CropsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('crops')->insert([
            [
                'name' => 'Black Cowpea',
                'type' => 'Legume Crop',
                'description' => 'Nitrogen-fixing legume improves soil fertility and provides high protein content. Excellent for crop rotation and sustainable farming practices.',
                'price' => 300.00,
                'rating' => 5,
                'reviews' => 328,
                'status' => 'in-stock',
                'image_folder' => 'black cowpea',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chikpea',
                'type' => 'Pulse Crop',
                'description' => 'Rich protein source with excellent nutritional value. Drought-tolerant and improves soil quality through nitrogen fixation in crop rotation systems.',
                'price' => 325.00,
                'rating' => 4,
                'reviews' => 245,
                'status' => 'in-stock',
                'image_folder' => 'chikpea',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Corn',
                'type' => 'Cereal Crop',
                'description' => 'Versatile grain crop with high yield potential and multiple uses. Suitable for food, feed, and industrial applications with good market demand.',
                'price' => 300.00,
                'rating' => 5,
                'reviews' => 412,
                'status' => 'in-stock',
                'image_folder' => 'corn',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cowpea',
                'type' => 'Legume Crop',
                'description' => 'Drought-tolerant pulse with high protein content for nutrition and livestock feed. Improves soil fertility and yields well in arid regions.',
                'price' => 300.00,
                'rating' => 4,
                'reviews' => 189,
                'status' => 'in-stock',
                'image_folder' => 'cowpea',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Field Pea',
                'type' => 'Pulse Crop',
                'description' => 'Cold-season legume with high protein content and excellent market value. Enriches soil with nitrogen and reduces disease pressure in rotation.',
                'price' => 250.00,
                'rating' => 5,
                'reviews' => 267,
                'status' => 'in-stock',
                'image_folder' => 'field pea',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mung',
                'type' => 'Pulse Crop',
                'description' => 'Fast-growing legume with high protein and mineral content. Perfect for hot climates with minimal water requirements and quick harvest cycle.',
                'price' => 410.00,
                'rating' => 4,
                'reviews' => 156,
                'status' => 'in-stock',
                'image_folder' => 'mung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Peanut',
                'type' => 'Oil & Nut Crop',
                'description' => 'High-value cash crop with excellent oil and protein content for multiple uses. Improves soil structure and nitrogen content through nodulation.',
                'price' => 300.00,
                'rating' => 5,
                'reviews' => 334,
                'status' => 'in-stock',
                'image_folder' => 'peanut',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Red Pepper',
                'type' => 'Vegetable Crop',
                'description' => 'High-value vegetable rich in vitamins and antioxidants with strong market demand. Requires good sunlight and warm temperatures for optimal growth.',
                'price' => 200.00,
                'rating' => 4,
                'reviews' => 298,
                'status' => 'in-stock',
                'image_folder' => 'red pepper',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sorghum',
                'type' => 'Cereal Crop',
                'description' => 'Drought-resistant grain used for food, feed, and biofuel production. Highly adaptable to poor soils and arid conditions with excellent yield.',
                'price' => 300.00,
                'rating' => 5,
                'reviews' => 521,
                'status' => 'in-stock',
                'image_folder' => 'sorghum',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sunflower',
                'type' => 'Oil Crop',
                'description' => 'High-oil producing crop with multiple industrial and food applications. Adaptable to various soils and climates with relatively low input requirements.',
                'price' => 300.00,
                'rating' => 4,
                'reviews' => 403,
                'status' => 'limited-stock',
                'image_folder' => 'sunflower',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
