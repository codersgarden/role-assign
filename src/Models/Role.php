<?php

namespace Codersgarden\RoleAssign\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }
}


