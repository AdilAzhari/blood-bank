<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', user::class);

        $users = user::with('roles')->paginate();
        // $user = user::find(20);
        // $user->getPermissionsViaRoles();
        // foreach ($user->getPermissionsViaRoles() as $role) {
            // dd($user->permissions);
        // }
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $this->authorize('create', user::class);

        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', user::class);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'roles' => 'required|array'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->roles()->sync($request->roles);

        return to_route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', user::class);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'roles' => 'required|array'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->filled('password')) {
            $user->update(['password' => bcrypt($request->password)]);
        }

        $user->roles()->sync($request->roles);

        return to_route('users.index')->with('Info', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', user::class);

        $user->delete();
        return redirect()->route('users.index')->with('Danger', 'User deleted successfully.');
    }
}
