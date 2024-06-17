<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();
        return view('roles.index', compact('roles', 'permissions'));
    }

    // public function create()
    // {
    //     $permissions = Permission::all();
    //     return view('roles.create', compact('permissions'));
    // }

    // public function store(Request $request)
    // {
    // $request->validate([
    //     'name' => 'required|unique:roles,name',
    //     'description' => 'required|string|max:255',
    //     'permissions' => 'required|array',
    //     'permissions.*' => 'exists:permissions,id',
    // ]);

    //

    public function addPermissions(Request $request)
    {
        $permissions = [
            'Full Calendar',
            'Drop Zone',
            'Auto-Suggest Search',
            'Lazy Load',
            'Excel Import and Export',
            'PDF Generate',
            'CRUD',
            'CSV Import and Export',
            'Email or Phone number',
            'Weather',
            'Encrypt and Decrypt',
            'Form Builder',
            'Image Cropper',
            'Laravel Dusk Test',
            'Jquery Datatable',
            'Change Language',
            'Laravel SSE (Real time Notification)',
            'Chat Application',
            'Custom Helper',
            'Push Notification'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }

    public function show()
    {
        $roles = Role::all();
        return view('RolesAndPermissions.Index', compact('roles'));
    }

    public function createRole()
    {
        $permissions = Permission::all();
        $users = User::select('name', 'id')->get();
        return view('RolesAndPermissions.create', compact('permissions', 'users'));
    }


    public function create(Request $request)
    {
        $role = Role::create(['name' => $request->name]);

        foreach ($request->permission as $permission) {
            $role->givePermissionTo($permission);
        }

        foreach ($request->users as $user) {
            $user = User::find($user);
            $user->assignRole($role->name);
        }

        return redirect('show-roles')->with('Info', 'Role created successfully');
    }

    public function editRole($id)
    {
        $role = Role::where('id', $id)
            ->with('permissions', 'users')
            ->first();
        $permissions = Permission::all();
        $users = User::select('name', 'id')->get();

        return view('RolesAndPermissions.Edit', compact('role', 'permissions', 'users'));
    }

    public function updateRole(Request $request, Role $role)
    {
        $role->name = $request->name;
        $role->update();

        $role->syncPermissions($request->permission);

        DB::table('model_has_roles')->where('role_id', $request->id)->delete();

        foreach ($request->users as $user) {
            $user = User::find($user);
            $user->assignRole($role->name);
        }

        return redirect('show-roles')->with('Info', 'Role updated successfully');
    }

    public function delete(Role $role)
    {
        $role->delete();
        return redirect('show-roles')->with('Danger', 'Role deleted successfully');
    }
}
