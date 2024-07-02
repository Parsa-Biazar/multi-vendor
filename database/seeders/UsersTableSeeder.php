<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\RoleUser;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        // Create 20 users
        for ($i = 0; $i < 20; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'),
            ]);

            // Assign role
            $roleId = (($i < 5) ? 2 : 3); // buyer for next 4 users, admin for next 5 users
            RoleUser::create([
                'user_id' => $user->id,
                'role_id' => $roleId,
            ]);
        }

        // Create a superadmin
        $superadmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('superadmin'),
        ]);

        RoleUser::create([
            'user_id' => $superadmin->id,
            'role_id' => 4,
        ]);

        // Create 5 more sellers
        for ($i = 0; $i < 5; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'),
            ]);

            // Assign role
            RoleUser::create([
                'user_id' => $user->id,
                'role_id' => 1, // Role ID for seller
            ]);
        }
    }
}
