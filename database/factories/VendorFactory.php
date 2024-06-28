<?php

namespace Database\Factories;

use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendorFactory extends Factory
{
    protected $model = Vendor::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'store_name' => $this->faker->company,
            'store_description' => $this->faker->paragraph,
        ];
    }
}
