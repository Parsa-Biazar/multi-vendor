<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            ['name' => 'seller', 'description' => 'Seller role'],
            ['name' => 'buyer', 'description' => 'Buyer role'],
            ['name' => 'admin', 'description' => 'Admin role'],
            ['name' => 'superadmin', 'description' => 'Super Admin role'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
