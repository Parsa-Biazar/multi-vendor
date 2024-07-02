<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vendor;
use App\Models\User;

class VendorsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        // Create vendors for the new sellers
        $sellerUsers = User::whereHas('roles', function ($query) {
            $query->where('role_id', 1); // Role ID for seller
        })->get();

        foreach ($sellerUsers as $user) {
            Vendor::create([
                'user_id' => $user->id,
                'store_name' => $faker->company . ' Store',
                'store_description' => $faker->sentence,
            ]);
        }
    }
}
