<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use spatie\permission\models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $superAdmin = User::create([
            "name" => "Super Admin",
            "email" => "superadmin@gmail.com",
            "password" => Hash::make("superadmin"),
        ]);
        $admin = User::create([
            "name" => "Admin",
            "email" => "admin@dema.gmail.com",
            "password" => Hash::make("password"),
        ]);
        $role = Role::create([
            "name" => "admin",
        ]);
        $permition = Permission::pluck('id')->all();
        $role->syncPermissions($permition);
        $superAdmin->assignRole($role);
        $admin->syncRoles($role);
    }
}
