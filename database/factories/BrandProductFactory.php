<?php
namespace Database\Factories;

use App\Models\BrandProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandProductFactory extends Factory
{
    protected $model = BrandProduct::class;

    public function definition()
    {
        return [
            'brand_id' => \App\Models\Brand::factory(),
            'product_id' => \App\Models\Product::factory(),
        ];
    }
}
