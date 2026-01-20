<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        // Create test suppliers for demonstration
        Supplier::firstOrCreate(
            ['email' => 'test@supplier.com'],
            [
                'first_name' => 'Test',
                'last_name' => 'Supplier',
                'phone' => '+92 300 1234567',
                'product_type' => 'tools',
                'id_number' => 'SUP001',
                'country' => 'Pakistan',
                'password' => Hash::make('12345678'),
                'must_change_password' => true,
            ]
        );

        Supplier::firstOrCreate(
            ['email' => 'fertilizer@supplier.com'],
            [
                'first_name' => 'Ahmed',
                'last_name' => 'Khan',
                'phone' => '+92 321 9876543',
                'product_type' => 'fertilizer',
                'id_number' => 'SUP002',
                'country' => 'Pakistan',
                'password' => Hash::make('12345678'),
                'must_change_password' => true,
            ]
        );
    }
}
