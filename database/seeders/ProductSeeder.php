<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Premium Cat Food',
                'price' => 15.50,
                'description' => 'Nutritious meal for adult cats.',
                'stock_quantity' => 50,
                'category' => 'Food'
            ],
            [
                'name' => 'Dog Leash Medium',
                'price' => 12.00,
                'description' => 'Strong and durable leash for medium dogs.',
                'stock_quantity' => 20,
                'category' => 'Accessories'
            ],
            [
                'name' => 'Bird Cage Cleaner',
                'price' => 8.75,
                'description' => 'Safe spray for cleaning bird cages.',
                'stock_quantity' => 15,
                'category' => 'Hygiene'
            ],
            [
                'name' => 'Hamster Wheel',
                'price' => 10.00,
                'description' => 'Silent running wheel for small rodents.',
                'stock_quantity' => 10,
                'category' => 'Toys'
            ],
            [
                'name' => 'Aquarium Filter',
                'price' => 25.00,
                'description' => 'High efficiency water filtration system.',
                'stock_quantity' => 5,
                'category' => 'Hardware'
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}