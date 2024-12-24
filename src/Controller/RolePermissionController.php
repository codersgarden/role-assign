<?php

namespace Codersgarden\RoleAssign\Controller;

use App\Http\Controllers\Controller;
use Codersgarden\RoleAssign\models\Permission;
use Codersgarden\RoleAssign\models\Role;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RolePermissionController  extends Controller
{

    // Display all roles
    public function index()
    {   
        
        $roles = Role::all();
        return view('role_permission.index', compact('roles'));
    }

    // Show the form to create a new role
    public function create()
    {
        return view('Role.role_permission'); 
    }

    // Store a new role
    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        $role = Role::create($request->all());

        return redirect()->route('role_permission.index')->with('status', 'Role permission created successfully!');
    }

    // Show the form to edit an existing role
    public function edit(Role $role)
    {
        return view('role_permission.edit', compact('role'));
    }

    // Update the role
    public function update(Request $request, Role $role)
    {
        $request->validate(['name' => 'required']);
        $role->update($request->all());

        return redirect()->route('role_permission.index')->with('status', 'Role permission updated successfully!');
    }

    // Delete a role
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('role_permission.index')->with('status', 'Role permission deleted successfully!');
    }

    // Assign permissions to a role
    public function assignPermissions(Request $request, Role $role)
    {
        $role->permissions()->sync($request->permissions);

        return redirect()->route('role_permission.index')->with('status', 'Permissions assigned successfully!');
    }

    // Display permissions
    public function permissions()
    {
        $permissions = Permission::all();
        return view('role_permission.permissions', compact('permissions'));
    }
}
