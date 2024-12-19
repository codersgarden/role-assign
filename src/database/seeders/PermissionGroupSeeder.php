<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PermissionGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permission_groups')->truncate();
        $permission_groups = array(
            array('ulid' => Str::ulid(), 'name' => 'Manage Roles', 'slug' => 'manage-roles', 'created_at' => now(), 'updated_at' => now()),
            array('ulid' => Str::ulid(), 'name' => 'Manage Permissions', 'slug' => 'manage-permissions', 'created_at' => now(), 'updated_at' => now()),
            array('ulid' => Str::ulid(), 'name' => 'Manage Permission Groups', 'slug' => 'manage-permission-groups', 'created_at' => now(), 'updated_at' => now()),
        );
        DB::table('permission_groups')->insert($permission_groups);
    }
}
