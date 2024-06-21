<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        // $this->authorize('viewAny', Role::class);

        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();
        return view('roles.index', compact('roles', 'permissions'));
    }

    public function show()
    {
        $roles = Role::all();
        return view('Roles.Index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        $users = User::select('name', 'id')->get();
        return view('Roles.create', compact('permissions', 'users'));
    }


    public function store(Request $request)
    {
        $request->validate([]);

        $role = Role::create(['name' => $request->name, 'description' => $request->description]);

        foreach ($request->permission as $permission) {
            $role->givePermissionTo($permission);
        }

        return to_route('Roles.index')->with('Info', 'Role created successfully');
    }

    public function edit(role $role)
    {
        $permissions = Permission::all();

        return view('Roles.Edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'permission' => 'required|array',
        ]);

        $role->description = $request->description;
        $role->update();

        $role->syncPermissions($request->permission);

        DB::table('model_has_roles')->where('role_id', $request->id)->delete();

        return to_route('roles.index')->with('Info', 'Role updated successfully');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return to_route('roles.index')->with('Danger', 'Role deleted successfully');
    }
}
