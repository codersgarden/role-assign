<?php 

namespace CodersGarden\RoleAssign\Helpers;

if (! function_exists('checkPermission')) {
    function checkPermission($route)
    {
        // Check if the user is authenticated and has permissions
        if (auth()->check()) {
            $userPermissions = auth()->user()->permissions->pluck('name')->toArray();
            return in_array($route, $userPermissions);
        }
        return false;  // If user is not authenticated, return false
    }
}


