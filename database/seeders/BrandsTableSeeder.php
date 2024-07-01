<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandsTableSeeder extends Seeder
{
    public function run()
    {
        $brands = ['Brand A', 'Brand B', 'Brand C', 'Brand D', 'Brand E'];

        foreach ($brands as $brand) {
            Brand::create([
                'name' => $brand,
            ]);
        }
    }
}
