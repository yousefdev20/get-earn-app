<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::query()->where('name', '=', 'Super Admin')->pluck('id');
        Admin::query()->updateOrCreate(['email' => 'admin@admin.com'], [
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'phone' => '0790000000',
            'password' => Hash::make('admin'),
            'image' => 'images/2023-02-16/1676553523.jpg',
        ])->roles()->sync($role);
    }
}
