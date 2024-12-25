<?php


namespace Codersgarden\RoleAssign\Controller;

use App\Http\Controllers\Controller;
use Codersgarden\RoleAssign\models\Role;
use Codersgarden\RoleAssign\models\PermissionGroup;
use Codersgarden\RoleAssign\models\RolePermission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->get('search'); 

        $roles = Role::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })
        ->orderBy('id', 'desc')
        ->paginate(2);
    
        return view('roleassign::Role.index', ['roles' => $roles]);
    }


    public function create()
    {
        return view('roleassign::Role.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            "name" => "required|string|max:200",
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->slug = Str::slug($request->name);
        $role->save();
        return redirect()->route('roles.index')->with('success', 'Role created successfully');
    }

    public function edit(string $id)
    {

        $role = Role::find($id);

        if (!$role) {

            return redirect()->route('roles.index')->with('success', 'Role not Found');
        }

        return view(
            'roleassign::Role.edit',
            [
                "role" => $role
            ]
        );
    }


    public function update(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:100",
        ]);

        $role = Role::find($request->id);

        if (!$role) {
            return redirect()->route('roles.index')->with('success', 'Role not Found');
        }

        $role->name = $request->name;
        $role->slug = Str::slug($request->name);
        $role->save();

       
        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }


    public function destroy(string $id)
    {

        $role = Role::find($id);

        if (!$role) {
            return redirect()->route('roles.index')->with('success', 'Role not Found');
        }
        $role->delete();

        return redirect()->route('roles.index');
      
    }



    public function permissions(string $id)
    {
        $role = Role::find($id);

        if (!$role) {
            return redirect()->back()->with(["status" => "error", "message" => "Role not Found"]);
        }
        $permissionGroups = PermissionGroup::select('*')->with('permissions')->get();
        $assignedPermissions = RolePermission::where('role_id', $id)->pluck('permission_id')->toArray();
        return view('roleassign::Role.permissions', [
            'role' => $role,
            'permissionGroups' => $permissionGroups,
            'assignedPermissions' => $assignedPermissions
        ]);
    }
}
