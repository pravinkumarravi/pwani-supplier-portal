<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate sample data
        $suppliers = [
            [
                'number' => '000001',
                'email' => 'customer1@example.com',
                'phone_number' => '1234567890',
                'password' => Hash::make('password123'),
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'number' => '000002',
                'email' => 'customer2@example.com',
                'phone_number' => '0987654321',
                'password' => Hash::make('password456'),
                'status' => 'inactive',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'number' => '000003',
                'email' => 'customer3@example.com',
                'phone_number' => '1234567890',
                'password' => Hash::make('password123'),
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'number' => null,
                'email' => 'customer4@example.com',
                'phone_number' => '0987654321',
                'password' => Hash::make('password456'),
                'status' => 'inactive',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Insert the data into the 'suppliers' table
        DB::table('suppliers')->insert($suppliers);
    }
}
