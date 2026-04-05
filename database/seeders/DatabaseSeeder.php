<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash as FacadesHash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@midnight.com',
            'password' => FacadesHash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@midnight.com',
            'password' => FacadesHash::make('password'),
            'role' => 'customer',
        ]);

        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
    }
}
