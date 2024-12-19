<?php

namespace Codersgarden\RoleAssign\database\seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Codersgarden\RoleAssign\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->truncate();
        $data = [
            [
                'id' => 1,
                'name' => 'Super Admin',
                'slug' => 'super-admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('roles')->insert($data);
    }
}
