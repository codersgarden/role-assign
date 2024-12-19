<?php

namespace Codersgarden\RoleAssign\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Codersgarden\RoleAssign\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->truncate();
        $permissions = array(

            array('permission_group_id' => '3', 'name' => 'View Roles Listings', 'slug' => 'view-roles-listings', 'route' => 'roles.index', 'created_at' => now(), 'updated_at' => now()),
            array('permission_group_id' => '3', 'name' => 'Add Role', 'slug' => 'add-role', 'route' => 'roles.create', 'created_at' => now(), 'updated_at' => now()),
            array('permission_group_id' => '3', 'name' => 'Edit Roles', 'slug' => 'edit-roles', 'route' => 'roles.edit', 'created_at' => now(), 'updated_at' => now()),
            array('permission_group_id' => '3', 'name' => 'Delete Roles', 'slug' => 'delete-roles', 'route' => 'roles.destroy', 'created_at' => now(), 'updated_at' => now()),
            array('permission_group_id' => '3', 'name' => 'Assign Permissions to Roles', 'slug' => 'assign-permissions-to-roles', 'route' => 'roles.permissions', 'created_at' => now(), 'updated_at' => now()),

            array('permission_group_id' => '4', 'name' => 'View Permissions Listings', 'slug' => 'view-permissions-listings', 'route' => 'permissions.index', 'created_at' => now(), 'updated_at' => now()),
            array('permission_group_id' => '4', 'name' => 'Add Permission', 'slug' => 'add-permission', 'route' => 'permissions.create', 'created_at' => now(), 'updated_at' => now()),
            array('permission_group_id' => '4', 'name' => 'Edit Permissions', 'slug' => 'edit-permissions', 'route' => 'permissions.edit', 'created_at' => now(), 'updated_at' => now()),
            array('permission_group_id' => '4', 'name' => 'Delete Permissions', 'slug' => 'delete-permissions', 'route' => 'permissions.destroy', 'created_at' => now(), 'updated_at' => now()),

            array('permission_group_id' => '5', 'name' => 'View Permission Groups Listings', 'slug' => 'view-permission-groups-listings', 'route' => 'permission-groups.index', 'created_at' => now(), 'updated_at' => now()),
            array('permission_group_id' => '5', 'name' => 'Add Permission Groups', 'slug' => 'add-permission-groups', 'route' => 'permission-groups.create', 'created_at' => now(), 'updated_at' => now()),
            array('permission_group_id' => '5', 'name' => 'Edit Permission Groups', 'slug' => 'edit-permission-groups', 'route' => 'permission-groups.edit', 'created_at' => now(), 'updated_at' => now()),
            array('permission_group_id' => '5', 'name' => 'Delete Permission Groups', 'slug' => 'delete-permission-groups', 'route' => 'permission-groups.destroy', 'created_at' => now(), 'updated_at' => now()),

        );

        DB::table('permissions')->insert($permissions);
    }
}
