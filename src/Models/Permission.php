<?php

namespace Codersgarden\RoleAssign\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function permissionGroup()
    {
        return $this->belongsTo(PermissionGroup::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permissions');
    }
}
