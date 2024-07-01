<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vendor;
use App\Models\User;

class VendorsTableSeeder extends Seeder
{
    public function run()
    {
        // Create 1 vendor for the first user (seller)
        Vendor::create([
            'user_id' => 1,
            'store_name' => 'Main Vendor Store',
            'store_description' => 'This is the main vendor store.',
        ]);
    }
}
