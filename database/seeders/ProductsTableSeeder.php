<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\BrandProduct;
use App\Models\ProductCategory;
use App\Models\Vendor;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        $categories = \App\Models\Categories::all();
        $brands = \App\Models\Brand::all();

        // Create 20 products
        for ($i = 0; $i < 20; $i++) {
            $product = Product::create([
                'vendor_id' => rand(1,5),
                'name' => $faker->word,
                'description' => $faker->sentence,
                'price' => $faker->randomFloat(2, 10, 100),
                'is_active' => 1,
                'stock' => $faker->numberBetween(1, 100),
            ]);

            // Attach categories randomly
            $product->categories()->attach(
                $categories->random(rand(1, 5))->pluck('id')->toArray()
            );

            // Attach brands randomly
            $product->brands()->attach(
                $brands->random()->id
            );
        }
    }
}
