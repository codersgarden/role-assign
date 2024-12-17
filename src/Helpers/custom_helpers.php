<?php

use Illuminate\Support\Facades\Auth;

function checkPermission($route) {
  
    $user = Auth::user();
    $permissions = $user->permissions()->pluck('route')->toArray();
    return in_array($route, $permissions);
}