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
            ['name' => 'flower'],
            ['name' => 'bucket'],
            ['name' => 'Seeds'],
            ['name' => 'Plants'],

        ];
        foreach ($category as $cat) {
            Category::create($cat);
        }
    }
}
