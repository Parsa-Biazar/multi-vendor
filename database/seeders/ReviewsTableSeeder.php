<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Product;
use App\Models\User;
use App\Models\Role;

class ReviewsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        $buyerRole = Role::where('name', 'buyer')->first();

        // Get all users with the 'buyer' role
        $buyers = User::whereHas('roles', function ($query) use ($buyerRole) {
            $query->where('role_id', $buyerRole->id);
        })->get();

        // Create 50 reviews
        for ($i = 0; $i < 50; $i++) {
            $buyer = $buyers->random();
            $product = Product::inRandomOrder()->first();

            Review::create([
                'product_id' => $product->id,
                'buyer_id' => $buyer->id,
                'rating' => rand(1, 5),
                'comment' => $faker->sentence,
            ]);
        }
    }
}
