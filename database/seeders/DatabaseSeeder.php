<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin user
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
            'phone' => '1234567890',
            'address' => 'Admin Address',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Regular user
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'user',
            'phone' => '0987654321',
            'address' => 'John Address',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Categories
        DB::table('categories')->insert([
            [
                'name' => 'Luxury',
                'desc' => 'Luxury jets with high-end amenities.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Business',
                'desc' => 'Business jets suitable for corporate travel.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Small Jet',
                'desc' => 'Compact jets designed for short trips.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Units
        DB::table('units')->insert([
            [
                'unit_code' => 'JET001',
                'name' => 'Gulfstream G650',
                'desc' => 'Luxury private jet',
                'price' => 6500000.00,
                'brand' => 'Airbus',
                'stock' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'unit_code' => 'JET002',
                'name' => 'Challenger 350',
                'desc' => 'Business jet',
                'price' => 4500000.00,
                'brand' => 'Boeing',
                'stock' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        // Unit Categories (Pivot)
        DB::table('unit_categories')->insert([
            ['unit_id' => 1, 'category_id' => 1], // Gulfstream G650 -> Luxury
            ['unit_id' => 1, 'category_id' => 2], // Gulfstream G650 -> Business
            ['unit_id' => 2, 'category_id' => 2], // Challenger 350 -> Business
            ['unit_id' => 2, 'category_id' => 3], // Challenger 350 -> Small Jet
        ]);

        DB::table('penalties')->insert([
            [
                'penalty_code' => 'PENALTY_1',
                'max_day' => 5,
                'price' => 500000, // Denda per hari setelah max_day
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penalty_code' => 'PENALTY_2',
                'max_day' => 10,
                'price' => 300000, // Denda per hari setelah max_day
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penalty_code' => 'PENALTY_3',
                'max_day' => 15,
                'price' => 200000, // Denda per hari setelah max_day
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
