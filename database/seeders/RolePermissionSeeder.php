<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ownerRole = Role::create([
            'name' => 'owner',
        ]);

        $customerRole = Role::create([
            'name' => 'customer',
        ]);

        $vendorRole = Role::create([
            'name' => 'vendor',
        ]);

        $userOwner = User::create([
            'name' => 'admin',
            'avatar' => 'images/default-avatar.png',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);

        $userOwner->assignRole($ownerRole);
    }
}
