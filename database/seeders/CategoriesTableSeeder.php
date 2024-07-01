<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = ['Electronics', 'Books', 'Clothing', 'Furniture', 'Toys'];

        foreach ($categories as $category) {
            Categories::create([
                'name' => $category,
            ]);
        }
    }
}
