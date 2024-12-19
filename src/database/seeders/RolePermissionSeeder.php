<?php

namespace Codersgarden\RoleAssign\database\seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Codersgarden\RoleAssign\Models\RolePermission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role_permissions')->truncate();
        $permissions = array(
            array('role_id' => '1', 'permission_id' => '10', 'created_at' => now(), 'updated_at' => now()),
            array('role_id' => '1', 'permission_id' => '11', 'created_at' => now(), 'updated_at' => now()),
            array('role_id' => '1', 'permission_id' => '12', 'created_at' => now(), 'updated_at' => now()),
            array('role_id' => '1', 'permission_id' => '13', 'created_at' => now(), 'updated_at' => now()),
            array('role_id' => '1', 'permission_id' => '14', 'created_at' => now(), 'updated_at' => now()),
            array('role_id' => '1', 'permission_id' => '15', 'created_at' => now(), 'updated_at' => now()),
            array('role_id' => '1', 'permission_id' => '16', 'created_at' => now(), 'updated_at' => now()),
            array('role_id' => '1', 'permission_id' => '17', 'created_at' => now(), 'updated_at' => now()),
            array('role_id' => '1', 'permission_id' => '18', 'created_at' => now(), 'updated_at' => now()),
            array('role_id' => '1', 'permission_id' => '19', 'created_at' => now(), 'updated_at' => now()),
            array('role_id' => '1', 'permission_id' => '20', 'created_at' => now(), 'updated_at' => now()),
            array('role_id' => '1', 'permission_id' => '21', 'created_at' => now(), 'updated_at' => now()),
            array('role_id' => '1', 'permission_id' => '22', 'created_at' => now(), 'updated_at' => now()),
        );

        DB::table('role_permissions')->insert($permissions);
    }
}
