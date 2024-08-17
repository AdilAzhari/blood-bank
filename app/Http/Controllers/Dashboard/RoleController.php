<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', Role::class);

        $roles = Role::filterByName($request->input('name'))
                ->with('permissions')
                ->paginate(10);

        return view('admin.roles.index', compact('roles'));
    }

    public function show(Role $role)
    {
        $this->authorize('view', $role);

        return view('admin.roles.show', compact('role'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.Roles.create', compact('permissions'));
    }


    public function store(storeRoleRequest $request)
    {
        $role = Role::create($request->only('name'));
        $role->permissions()->sync($request->permissions);

        return to_route('roles.index')->with('Info', 'Role created successfully');
    }

    public function edit(role $role)
    {
        $permissions = Permission::all();

        return view('admin.Roles.Edit', compact('role', 'permissions'));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->only('name'));
        $role->permissions()->sync($request->permissions);

        return redirect()->route('roles.index')->with('info', 'Role updated successfully');
    }
    public function destroy(Role $role)
    {
        $role->delete();
        return to_route('roles.index')->with('Danger', 'Role deleted successfully');
    }

    public function trash()
    {
        $this->authorize('viewAny', Role::class);

        $trashedRoles = Role::onlyTrashed()->paginate(10);
        return view('roles.trash', compact('trashedRoles'));
    }

    public function restore($id)
    {
        $this->authorize('restore', Role::class);

        $role = Role::withTrashed()->find($id);
        if ($role) {
            $role->restore();
        }
        return redirect()->route('roles.trash')->with('success', 'Role restored successfully.');
    }

    public function forceDelete($id)
    {
        $this->authorize('forceDelete', Role::class);

        $role = Role::withTrashed()->find($id);
        if ($role) {
            $role->forceDelete();
        }
        return redirect()->route('roles.trash')->with('success', 'Role permanently deleted.');
    }
}
