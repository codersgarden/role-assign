<?php

namespace Codersgarden\RoleAssign\Controller;

use Codersgarden\RoleAssign\models\RolePermission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{


     public function index()
    {
        return view('roleassign::home');
    }
    public function assignOrRemovePermissions(Request $request)
    {  
      
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permission_id' => 'required|exists:permissions,id',
            'assign' => 'required|boolean',
        ]);
    
        $roleId = $request->input('role_id');
        $permissionId = $request->input('permission_id');
        $assign = $request->input('assign');
    
        if ($assign) {
            RolePermission::firstOrCreate([
                'role_id' => $roleId,
                'permission_id' => $permissionId,
            ]);
    
            return response()->json([
                'status' => 'assigned',
                'message' => 'permission Assigned successfully'
            ]);
        } else {
            RolePermission::where('role_id', $roleId)
                ->where('permission_id', $permissionId)
                ->delete();
    
            return response()->json([
                'status' => 'removed',
                'message' => 'permission removed successfully'
            ]);
        }
    }
}
