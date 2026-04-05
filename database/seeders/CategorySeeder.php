<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            ['name' => 'Fresh Flowers'],
            ['name' => 'Potted Plants'],
            ['name' => 'Gardening Tools'],
            ['name' => 'Fertilizers'],
            ['name' => 'Gift Buckets'],
            ['name' => 'Seeds'],
        ];
        foreach ($category as $cat) {
            Category::create($cat);
        }
    }
}
