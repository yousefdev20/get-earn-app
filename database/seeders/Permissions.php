<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class Permissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::query()->upsert([
            ['name' => 'show_users', 'guard_name' => 'web'],
            ['name' => 'edit_user', 'guard_name' => 'web'],
            ['name' => 'delete_user', 'guard_name' => 'web'],
            ['name' => 'create_user', 'guard_name' => 'web'],

            ['name' => 'show_roles', 'guard_name' => 'web'],
            ['name' => 'edit_role', 'guard_name' => 'web'],
            ['name' => 'delete_role', 'guard_name' => 'web'],
            ['name' => 'create_role', 'guard_name' => 'web'],

            ['name' => 'show_vehicles', 'guard_name' => 'web'],
            ['name' => 'edit_vehicle', 'guard_name' => 'web'],
            ['name' => 'delete_vehicle', 'guard_name' => 'web'],
            ['name' => 'create_vehicle', 'guard_name' => 'web'],

            ['name' => 'show_enrollments', 'guard_name' => 'web'],
            ['name' => 'edit_enrollment', 'guard_name' => 'web'],
            ['name' => 'delete_enrollment', 'guard_name' => 'web'],
            ['name' => 'create_enrollments', 'guard_name' => 'web'],

            ['name' => 'show_transactions', 'guard_name' => 'web'],
            ['name' => 'edit_transaction', 'guard_name' => 'web'],
            ['name' => 'delete_transaction', 'guard_name' => 'web'],
            ['name' => 'create_transaction', 'guard_name' => 'web'],

            ['name' => 'show_queries', 'guard_name' => 'web'],
            ['name' => 'edit_query', 'guard_name' => 'web'],
            ['name' => 'delete_query', 'guard_name' => 'web'],
            ['name' => 'create_query_without_execute', 'guard_name' => 'web'],
            ['name' => 'execute_query', 'guard_name' => 'web'],
            ['name' => 'reject_query', 'guard_name' => 'web'],
            ['name' => 'approve_query', 'guard_name' => 'web'],
            ['name' => 'details_query', 'guard_name' => 'web'],

            ['name' => 'verified_user', 'guard_name' => 'web'],

            ['name' => 'update_theme', 'guard_name' => 'web'],

            ['name' => 'take_backup', 'guard_name' => 'web'],
            ['name' => 'delete_backup', 'guard_name' => 'web'],
            ['name' => 'show_backups', 'guard_name' => 'web'],
            ['name' => 'download_backup', 'guard_name' => 'web'],
        ], ['name']);
    }
}
