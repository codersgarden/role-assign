<?php

namespace Codersgarden\RoleAssign\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionGroup extends Model
{
    use HasFactory;

    // protected $guarded = [];

    protected $fillable = ['name', 'slug'];


    public function permissions()
    {
        return $this->hasMany(Permission::class, 'permission_group_id', 'id');
    }
}
