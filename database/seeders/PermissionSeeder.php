<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $permissions = [
            'user-menu',
            'user-list',
            'user-create',
            'user-edit',
            'user-delite',

            'role-menu',
            'role-list',
            'role-create',
            'role-edit',
            'role-delite',

            'payments-menu',
            'payments-list',
            'payments-create',
            'payments-edit',
            'payments-delite',
            'payments-show',

            'member-menu',
            'member-list',
            'member-create',
            'member-edit',
            'member-delite',

            'markets-menu',
            'markets-list',
            'markets-create',
            'markets-edit',
            'markets-delite',

            'meals-menu',
            'meals-list',
            'meals-create',
            'meals-edit',
            'meals-delite',

            'cooking_members-menu',
            'cooking_members-list',
            'cooking_members-create',
            'cooking_members-edit',
            'cooking_members-delite',

            'cooking_payments-menu',
            'cooking_payments-list',
            'cooking_payments-create',
            'cooking_payments-edit',
            'cooking_payments-delite',

            'monthlySummary-menu',
            'monthlySummary-list',

        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
