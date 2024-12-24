<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\storePermissionRequest;
use App\Http\Requests\updatePermissionRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(request $request)
    {
        $this->authorize('viewAny', Permission::class);

        $query = Permission::filterByName($request->name)->paginate(10);

        $permissions = null;
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        $this->authorize('create', Permission::class);

        return view('admin.permissions.create');
    }

    public function store(storePermissionRequest $request)
    {
        Permission::create($request->all());

        return to_route('permissions.index')->with('Info', 'Permission created successfully!');
    }

    public function edit(Permission $permission)
    {
        $this->authorize('update', $permission);

        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(updatePermissionRequest $request, Permission $permission)
    {
        $permission->update($request->only('name'));

        return to_route('permissions.index')->with('Info', 'Permission updated successfully!');
    }

    public function destroy(Permission $permission)
    {
        $this->authorize('delete', $permission);

        $permission->delete();

        return to_route('permissions.index')->with('Danger', 'Permission deleted successfully!');
    }

    public function trash()
    {
        $trashedPermissions = Permission::onlyTrashed()->paginate(10);

        return view('permissions.trash', compact('trashedPermissions'));
    }

    public function restore($id)
    {
        $permission = Permission::withTrashed()->find($id);
        if ($permission) {
            $permission->restore();
        }

        return redirect()->route('permissions.trash')->with('success', 'Permission restored successfully.');
    }

    public function forceDelete($id)
    {
        $permission = Permission::withTrashed()->find($id);
        if ($permission) {
            $permission->forceDelete();
        }

        return redirect()->route('permissions.trash')->with('success', 'Permission permanently deleted.');
    }
}
