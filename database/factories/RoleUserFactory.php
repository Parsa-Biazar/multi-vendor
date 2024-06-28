<?php
namespace Database\Factories;

use App\Models\RoleUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleUserFactory extends Factory
{
    protected $model = RoleUser::class;

    public function definition()
    {
        return [
            'role_id' => \App\Models\Role::factory(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}

