<?php

namespace Codersgarden\RoleAssign\Middleware;

use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Codersgarden\RoleAssign\Models\Permission;
use Codersgarden\RoleAssign\Models\RolePermission;

class CheckPermission
{
    

    public function handle(Request $request, Closure $next)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Redirect to login if not authenticated
        if (!$user) {
            return redirect()->route('login')->with([
                'status' => 'warn',
                'message' => __('auth.loginFailed'),
            ]);
        }

        // Get the current route name
        $currentRouteName = $request->route()->getName();

       // Step 1: Check if the user email is in ACL and exists in the users table
    $aclEmails = explode(',', config('roleassign.acl_users'));

      $userExistsInAcl = DB::table('users')
        ->whereIn('email', $aclEmails)
        ->exists();

       

    if ($currentRouteName === 'roles.index' && !$userExistsInAcl) {
        abort(403, 'Access Denied');
    }


        return $next($request);
    }


}
