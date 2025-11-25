<?php

namespace Database\Seeders;

use App\Models\User;
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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Gudang User',
            'email' => 'gudang@example.com',
            'password' => bcrypt('password'),
            'role' => 'gudang',
        ]);

        User::factory()->create([
            'name' => 'Kasir User',
            'email' => 'kasir@example.com',
            'password' => bcrypt('password'),
            'role' => 'kasir',
        ]);
    }
}
