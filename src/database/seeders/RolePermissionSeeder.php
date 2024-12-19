<?php

namespace Codersgarden\RoleAssign\database\seeders;

use Codersgarden\RoleAssign\Models\Permission;
use Codersgarden\RoleAssign\Models\Role;
use Illuminate\Support\Str;
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
        $adminRoleId = Role::where('slug', Str::slug("Super Admin"))->first()->id;
        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            $rolePermission = new RolePermission();
            $rolePermission->role_id = $adminRoleId;
            $rolePermission->permission_id = $permission->id;
            $rolePermission->save();
        }
    }
}