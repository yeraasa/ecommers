<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [

            // Bouquet
            [
                'name' => 'Red Rose Bouquet',
                'price' => 22.00,
                'description' => 'Elegant bouquet of fresh red roses for special occasions.',
                'stock_quantity' => 20,
                'category' => 'bucket',
                'image' => 'products/rose bouqet.jpg'
            ],
            [
                'name' => 'Sunflower Bouquet',
                'price' => 18.50,
                'description' => 'Bright sunflower bouquet perfect for cheerful gifts.',
                'stock_quantity' => 15,
                'category' => 'Bucket',
                'image' => 'products/sunflower bouqet.jpg'
            ],
            [
                'name' => 'Thumbelina',
                'price' => 24.00,
                'description' => 'A colorful mix of seasonal flowers arranged beautifully.',
                'stock_quantity' => 12,
                'category' => 'Bucket',
                'image' => 'products/thumbelina.jpg'
            ],

            // Flowers
            [
                'name' => 'Lily Flowers',
                'price' => 10.00,
                'description' => 'Fresh white lilies with a pleasant fragrance.',
                'stock_quantity' => 25,
                'category' => 'flower',
                'image' => 'products/lili bouqet.jpg'

            ],

            // Small Plants
            [
                'name' => 'Mini Cactus Plant',
                'price' => 6.00,
                'description' => 'Small cactus plant suitable for desk decoration.',
                'stock_quantity' => 40,
                'category' => 'Plants',
                'image' => 'products/cactus plants.jpg'
            ],
            [
                'name' => 'Succulent Plant',
                'price' => 7.50,
                'description' => 'Low maintenance succulent perfect for indoor spaces.',
                'stock_quantity' => 35,
                'category' => 'Plants',
                'image' => 'products/succulents pkants.jpg'
            ],
            [
                'name' => 'Mini Snake Plant',
                'price' => 8.50,
                'description' => 'Air purifying plant ideal for home decoration.',
                'stock_quantity' => 20,
                'category' => 'Plants',
                'image' => 'products/mini snake plant.jpg'
            ],
            [
                'name' => 'Small Aloe Vera Plant',
                'price' => 9.00,
                'description' => 'Healthy aloe vera plant useful for skincare and decoration.',
                'stock_quantity' => 18,
                'category' => 'Plants',
                'image' => 'products/mini aloe vera.jpg'
            ],

            // Seeds
            [
                'name' => 'Lavender Seeds Pack',
                'price' => 4.50,
                'description' => 'Premium lavender seeds for home gardening.',
                'stock_quantity' => 60,
                'category' => 'Seeds',
                'image' => 'products/lavender seed.jpg'
            ],
            [
                'name' => 'Sunflower Seeds Pack',
                'price' => 3.75,
                'description' => 'Easy to grow sunflower seeds.',
                'stock_quantity' => 55,
                'category' => 'Seeds',
                'image' => 'products/sunflowe seed.jpg'
            ],
            [
                'name' => 'Rose Seeds Pack',
                'price' => 5.00,
                'description' => 'Grow beautiful roses in your garden.',
                'stock_quantity' => 45,
                'category' => 'Seeds',
                'image' => 'products/rose seed.jpg'
            ],

            // Fertilizer
            // [
            //     'name' => 'Organic Plant Fertilizer',
            //     'price' => 9.75,
            //     'description' => 'Natural fertilizer that improves plant growth.',
            //     'stock_quantity' => 30,
            //     'category' => 'Fertilizer',
            //     'image' => ''
            // ],
            // [
            //     'name' => 'Liquid Flower Fertilizer',
            //     'price' => 8.25,
            //     'description' => 'Liquid fertilizer specially formulated for flowers.',
            //     'stock_quantity' => 28,
            //     'category' => 'Fertilizer'
            // ],
            // [
            //     'name' => 'Compost Fertilizer Mix',
            //     'price' => 11.00,
            //     'description' => 'Organic compost mix for healthier soil.',
            //     'stock_quantity' => 22,
            //     'category' => 'Fertilizer'
            // ],

            // // Gardening Tools
            // [
            //     'name' => 'Garden Hand Shovel',
            //     'price' => 7.50,
            //     'description' => 'Small shovel for digging soil and planting.',
            //     'stock_quantity' => 35,
            //     'category' => 'Tools'
            // ],
            // [
            //     'name' => 'Garden Pruning Scissors',
            //     'price' => 10.50,
            //     'description' => 'Sharp pruning scissors for trimming plants.',
            //     'stock_quantity' => 20,
            //     'category' => 'Tools'
            // ],
            // [
            //     'name' => 'Watering Can 1L',
            //     'price' => 6.75,
            //     'description' => 'Compact watering can for indoor plants.',
            //     'stock_quantity' => 25,
            //     'category' => 'Tools'
            // ],
            // [
            //     'name' => 'Plant Spray Bottle',
            //     'price' => 5.25,
            //     'description' => 'Spray bottle for watering and misting plants.',
            //     'stock_quantity' => 30,
            //     'category' => 'Tools'
            // ],
            // [
            //     'name' => 'Gardening Gloves',
            //     'price' => 6.50,
            //     'description' => 'Comfortable gloves for safe gardening.',
            //     'stock_quantity' => 40,
            //     'category' => 'Tools'
            // ],

        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
