<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        // $this->authorize('viewAny', Permission::class);

        $query = request()->input('search');
        $permissions = Permission::when($query, function ($queryBuilder, $query) {
            return $queryBuilder->where('name', 'LIKE', "%{$query}%");
        })->get();
        return view('permissions.index', compact('permissions'));
    }

    public function store(Request $request)
    {
        // $this->authorize('create', Permission::class);

        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name',
        ]);
        Permission::create($request->all());

        return to_route('permissions.index')->with('Info', 'Permission created successfully!');
    }

    public function edit(Permission $permission)
    {
        // $this->authorize('update', $permission);

        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        // $this->authorize('update', $permission);

        $request->validate([
            'name' => 'required|string|max:255|' . Rule::unique('permissions', 'name')->ignore($permission->id),
        ]);

        $permission->update($request->only('name', 'description'));

        return to_route('permissions.index')->with('success', 'Permission updated successfully!');
    }

    public function destroy(Permission $permission)
    {
        $this->authorize('delete', $permission);

        $permission->delete();

        return to_route('permissions.index')->with('success', 'Permission deleted successfully!');
    }
}
