<?php

namespace Codersgarden\RoleAssign\Controller;

use App\Http\Controllers\Controller;
use Codersgarden\RoleAssign\models\Permission;
use Codersgarden\RoleAssign\models\PermissionGroup;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->get('search');
        $permissions = Permission::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })
        ->orderBy('id', 'desc')
        ->paginate(2);
    
        return view('roleassign::Permissions.index', ['permissions' => $permissions]);
       
    }

    public function create()
    {
        $permissionGroups = PermissionGroup::select('id', 'name')->get();
        return view('roleassign::Permissions.create', ['permissionGroups' => $permissionGroups]);
    }

    public function store(Request $request)
    {  

 
        $request->validate([
            'name' => 'required',
            'permission_group_id' => 'required',
            'route' => 'required|string',
        ]);

        $permissions = new Permission();
        $permissions->name = $request->name;
        $permissions->permission_group_id = $request->permission_group_id;
        $permissions->slug = Str::slug($request->name);
        $permissions->route = $request->route;
        $permissions->save();


        return redirect()->route('permissions.index')->with('success', 'Permission created successfully.');
    }

    public function edit(string $id)
    {
        $permission = Permission::where('id', $id)->first();
        $permissionGroups = PermissionGroup::select('id', 'name')->get();

        return view(
            'roleassign::Permissions.edit',
            [
                "permission" => $permission,
                "permissionGroups" => $permissionGroups
            ]
        );
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'permission_group_id' => 'required',
            'route' => 'required|string',
        ]);


        $permissions = Permission::where('id', $id)->firstOrFail();

        $permissions->name = $request->name;
        $permissions->permission_group_id = $request->permission_group_id;
        $permissions->slug = Str::slug($request->name);
        $permissions->route = $request->route;
        $permissions->save();


        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully.');
    }

    public function destroy(string $id)
    {
      
            $permissions = Permission::where('id', $id)->firstOrFail();
            $permissions->delete();
            return redirect()->route('permissions.index');
        
    }
}
