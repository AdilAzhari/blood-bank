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
        return view('roles.index', compact('roles'));
    }

    public function show(Role $role)
    {
        // $this->authorize('view', $role);

        return view('roles.show', compact('role'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('Roles.create', compact('permissions'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles',
            'permissions' => 'required|array',
        ]);

        $role = Role::create($request->only('name', 'description'));
        $role->syncPermissions($request->permissions);
        // foreach ($request->permission as $permission) {
        //     $role->givePermissionTo($permission);
        // }

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
