<?php

namespace Codersgarden\RoleAssign\Middleware;

use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;
use Codersgarden\RoleAssign\Models\Permission;
use Codersgarden\RoleAssign\Models\RolePermission;

class CheckPermission
{
    const ADMIN_ID = 1;

    /**
     * List of routes for which admin should have no access.
     *
     * @var array
     */
    private $noAccessRoutesForAdmin = [
        // Define restricted routes for admin here.
        // "company.dashboard",
        // "trainer.dashboard",
    ];

    /**
     * Handle an incoming request to check user permissions.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Redirect to login if the user is not authenticated
        if (!$user) {
            return redirect()->route('login')->with([
                'status' => 'warn',
                'message' => __('auth.loginFailed'),
            ]);
        }

        // Get the name of the current route
        $currentRouteName = $request->route()->getName();

       

        // Check if the user is an admin
        if ($user->role_id == self::ADMIN_ID) {
            // Redirect admin if trying to access a restricted route
            if (in_array($currentRouteName, $this->noAccessRoutesForAdmin)) {
                return redirect()->back()->with([
                    'status' => 'warn',
                    'message' =>'Access Denied',
                ]);
            }

            // Allow admin to proceed
            return $next($request);
        }

        // Check permissions for non-admin users
        $permissions = $this->getAllPermissionsForActiveUser();

        $permissionExists = Permission::where('route', $currentRouteName)->exists();

        // If the route doesn't require permissions, allow access
        if (!$permissionExists) {
            return $next($request);
        }

        // Allow access for users with valid permissions
        return $next($request);
    }

    /**
     * Retrieve all permissions for the authenticated user.
     *
     * @return array
     */
    private function getAllPermissionsForActiveUser(): array
    {

        $permissions = [];
        
        if (Auth::check()) {
            $user = Auth::user()->load('role');
            $roleID = $user->role->id;

            
            $permissions = RolePermission::where('role_permissions.role_id', $roleID)
                ->leftJoin('permissions', 'permissions.id', '=', 'role_permissions.permission_id')
                ->pluck('permissions.route')
                ->toArray();
        }

        return $permissions;
    }
}
