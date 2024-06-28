<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;
use App\Models\BrandProduct;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Review;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Categories;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Vendor::factory(10)->create();
        \App\Models\Brand::factory(10)->create();
        \App\Models\Categories::factory(10)->create();
        \App\Models\Product::factory(10)->create()->each(function($product) {
            \App\Models\ProductImage::factory(3)->create(['product_id' => $product->id]);
            \App\Models\Review::factory(3)->create(['product_id' => $product->id]);
        });
        \App\Models\Order::factory(10)->create()->each(function($order) {
            \App\Models\OrderItem::factory(3)->create(['order_id' => $order->id]);
        });
        \App\Models\Role::factory(5)->create();
        \App\Models\RoleUser::factory(10)->create();
        \App\Models\BrandProduct::factory(10)->create();
        \App\Models\ProductCategories::factory(10)->create();
    }
}
