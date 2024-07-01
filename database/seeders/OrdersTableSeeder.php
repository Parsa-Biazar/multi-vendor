<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use App\Models\Role;

class OrdersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        $buyerRole = Role::where('name', 'buyer')->first();

        // Get all users with the 'buyer' role
        $buyers = User::whereHas('roles', function ($query) use ($buyerRole) {
            $query->where('role_id', $buyerRole->id);
        })->get();

        // Create 20 orders
        for ($i = 0; $i < 20; $i++) {
            $buyer = $buyers->random();
            $order = Order::create([
                'buyer_id' => $buyer->id,
                'total_price' => 0,
                'status' => 'pending',
            ]);

            $totalPrice = 0;

            // Create order items
            for ($j = 0; $j < rand(1, 5); $j++) {
                $product = Product::inRandomOrder()->first();
                $quantity = rand(1, 3);
                $price = $product->price * $quantity;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $price,
                ]);

                $totalPrice += $price;
            }

            // Update total price of the order
            $order->update(['total_price' => $totalPrice]);
        }
    }
}
