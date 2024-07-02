<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $brands = ['Brand A', 'Brand B', 'Brand C', 'Brand D', 'Brand E'];

        foreach ($brands as $brand) {
            Brand::create([
                'name' => $brand,
                'description' => $faker->sentence,
            ]);
        }
    }
}
