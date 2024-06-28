<?php
namespace Database\Factories;

use App\Models\ProductCategories;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductCategoriesFactory extends Factory
{
    protected $model = ProductCategories::class;

    public function definition()
    {
        return [
            'product_id' => \App\Models\Product::factory(),
            'categories_id' => \App\Models\Categories::factory(),
        ];
    }
}
