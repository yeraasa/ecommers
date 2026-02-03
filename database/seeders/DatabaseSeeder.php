<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            'name' => 'Guest User',
            'email' => 'guest@petpal.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
        ]);

        $this->call(ProductSeeder::class);
    }
}
