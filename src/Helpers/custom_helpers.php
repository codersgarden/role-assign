<?php

use Illuminate\Support\Facades\Auth;

function checkPermission($route) {
  
    $user = Auth::user();

    // Get the user's role
    $roleID = $user->role_id;

    // Get the permissions for that role
    $permissions = DB::table('role_permissions')
                    ->join('permissions', 'role_permissions.permission_id', '=', 'permissions.id')
                    ->where('role_permissions.role_id', $roleID)
                    ->pluck('permissions.route')
                    ->toArray();

                 
    // Check if the route is in the permissions list
    return in_array($route, $permissions);
}