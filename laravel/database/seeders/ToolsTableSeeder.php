<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class ToolsTableSeeder extends Seeder
{
    public function run(): void
    {
        // Reset and seed tools
        Tool::query()->delete();

        $tools = [
            [
                'title' => 'Rake',
                'price' => 450.00,
                'image' => 'images/tools/rake/1.jpg',
                'description' => 'A tool that turns over and breaks up soil before planting. Prepares the soil, buries residues, and controls weeds for optimal seed sowing.',
                'status' => 'in_stock',
            ],
            [
                'title' => 'Spading Fork',
                'price' => 25.99,
                'image' => 'images/tools/spading fork/1.jpg',
                'description' => 'A traditional hand tool with a flat blade for breaking soil, removing weeds, shaping beds, and digging shallow furrows for planting.',
                'status' => 'in_stock',
            ],
            [
                'title' => 'Scythe',
                'price' => 1299.00,
                'image' => 'images/tools/scythe/1.webp',
                'description' => 'A planting machine that places seeds at precise depth and spacing for even distribution and better germination with higher yields.',
                'status' => 'in_stock',
            ],
            [
                'title' => 'Weeding Hoe',
                'price' => 89.99,
                'image' => 'images/tools/weeding hoe/1.png',
                'description' => 'A one-wheel manually pushed container for transporting soil, compost, seeds, fertilizers, tools, and crops around the farm.',
                'status' => 'in_stock',
            ],
            [
                'title' => 'Sickle',
                'price' => 18.50,
                'image' => 'images/tools/sickle/1.webp',
                'description' => 'A tool with metal tines for leveling soil, gathering debris, removing weeds, and spreading mulch after ploughing or planting.',
                'status' => 'in_stock',
            ],
            [
                'title' => 'Backpack Spreyer',
                'price' => 15.99,
                'image' => 'images/tools/spreyer/1.jpg',
                'description' => 'A hand tool with a curved blade for cutting grasses, harvesting cereals, and trimming vegetation with precision and efficiency.',
                'status' => 'in_stock',
            ],
            [
                'title' => 'Irrigation Pump',
                'price' => 32.99,
                'image' => 'images/tools/irrigation pump/1.png',
                'description' => 'Tools with broad blades for digging holes, lifting soil, mixing compost, and planting. Essential for soil preparation tasks.',
                'status' => 'in_stock',
            ],
            [
                'title' => 'Lawn Mower',
                'price' => 149.99,
                'image' => 'images/tools/lawn mower/1.jpg',
                'description' => 'Tools or machines that spray water, pesticides, or fertilizers to protect crops from pests and apply nutrients for better growth.',
                'status' => 'in_stock',
            ],
            [
                'title' => 'Sprinkler',
                'price' => 35999.00,
                'image' => 'images/tools/sprinkler/1.jpg',
                'description' => 'A powerful vehicle used to pull and power multiple farm implements for tilling, ploughing, planting, and hauling on large farms.',
                'status' => 'in_stock',
            ],
            [
                'title' => 'Seed Drill (manually)',
                'price' => 2499.00,
                'image' => 'images/tools/seed drill/1.jpg',
                'description' => 'A machine with rotating blades that breaks soil into fine particles, mixes residues, and prepares seedbeds quickly and efficiently.',
                'status' => 'limited',
            ],
        ];

        Tool::insert($tools);
    }
}
