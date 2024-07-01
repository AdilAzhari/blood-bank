<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Role::class);

        $roles = Role::with('permissions')->get();

        return view('admin.roles.index', compact('roles'));
    }

    public function show(Role $role)
    {
        // $this->authorize('view', $role);

        return view('admin.roles.show', compact('role'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.Roles.create', compact('permissions'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles',
            'permissions' => 'required|array',
        ]);

        $role = Role::create($request->only('name', 'description'));
        $role->syncPermissions($request->permissions);

        return to_route('Roles.index')->with('Info', 'Role created successfully');
    }

    public function edit(role $role)
    {
        $permissions = Permission::all();

        return view('admin.Roles.Edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'permissions' => 'required|array',
        ]);

        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();

        $role->syncPermissions($request->permissions);

        return redirect()->route('roles.index')->with('info', 'Role updated successfully');
    }
    public function destroy(Role $role)
    {
        $role->delete();
        return to_route('admin.roles.index')->with('Danger', 'Role deleted successfully');
    }
}
