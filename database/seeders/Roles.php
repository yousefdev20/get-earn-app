<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::query()->upsert(['name' => 'Super Admin', 'guard_name' => 'web'], ['name']);
        $role = Role::query()->where('name', '=', 'Super Admin')->first();
        $permissions = Permission::query()->pluck('id');
        $role->permissions()->sync($permissions);
    }
}
