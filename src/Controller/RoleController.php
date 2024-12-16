<?php


namespace Codersgarden\RoleAssign\Controller;

use App\Http\Controllers\Controller;
use Codersgarden\RoleAssign\models\Role;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {

        $roles = Role::all();
        return view('roleassign::Role.index', [
            'roles' => $roles,
        ]);
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

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    public function edit(string $id)
    {

        $role = Role::find($id);

        if (!$role) {
            return redirect()->back()->with(["status" => "error", "message" => trans("messages.role.notFound")]);
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
                return redirect()->back()->with(["status" => "error", "message" => trans("messages.role.notFound")]);
            }

            $role->name = $request->name;
            $role->slug = Str::slug($request->name);
            $role->save();

            return redirect()->route('roles.index')->with(["status" => "success", "message" => trans("messages.role.updated")]);
        
    }


    public function destroy(string $id)
    { 

       
            $role = Role::find($id);


          

            if (!$role) {
                return redirect()->back()->with(["status" => "error", "message" => trans("messages.role.notFound")]);
            }
            $role->delete();
            return redirect()->route('roles.index')->with(["status" => "success", "message" => trans("messages.role.deleted")]);
        
    }
}
