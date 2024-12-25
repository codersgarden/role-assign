<?php

namespace Codersgarden\RoleAssign\Controller;

use App\Http\Controllers\Controller;
use Codersgarden\RoleAssign\models\PermissionGroup;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PermissionGroupsController extends Controller
{

    public function index(Request $request)
    {

        $search = $request->get('search');
        $permissionGroups = PermissionGroup::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })
        ->orderBy('id', 'desc')
        ->paginate(2);
    
        return view('roleassign::PermissionGroup.index', ['permissionGroups' => $permissionGroups]);


    }

    public function create()
    {

        return view('roleassign::PermissionGroup.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            "name" => "required|string|max:200",
        ]);


        $PermissionGroup = new PermissionGroup();
        $PermissionGroup->ulid = Str::ulid();
        $PermissionGroup->name = $request->name;
        $PermissionGroup->slug = Str::slug($request->name);
        $PermissionGroup->save();

        return redirect()->route('permission-groups.index')->with('success', 'permission group created successfully.');
    }

    public function edit(string $id)
    {
        $permissionGroup = PermissionGroup::find($id);

        if (!$permissionGroup) {
            return redirect()->back()->with(["status" => "error", "message" =>"permission group not Found"]);
        }

        return view(
            'roleassign::PermissionGroup.edit',
            [
                "permissionGroup" => $permissionGroup
            ]
        );
    }



    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required|string|max:200",
        ]);

        $permissionGroup = PermissionGroup::find($id);

        if (!$permissionGroup) {
            return redirect()->back()->with(["status" => "error", "message" => "permission group not Found"]);
        }

        $permissionGroup->name = $request->name;
        $permissionGroup->slug = Str::slug($request->name);
        $permissionGroup->save();

        return redirect()->route('permission-groups.index')->with('success', 'permission group updated successfully.');
    }


    public function destroy(string $id)
    {
        $permissionGroup = PermissionGroup::find($id);
        if (!$permissionGroup) {
            return redirect()->back()->with(["status" => "error", "message" => "permission group not Found"]);
        }
        $permissionGroup->delete();
        return redirect()->route('permission-groups.index');
    }
}
