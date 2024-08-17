<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', user::class);

        $users = user::with('roles')->paginate(8);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $this->authorize('create', user::class);

        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->roles()->sync($request->roles);

        return to_route('users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        $this->authorize('view', user::class);

        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update->only('name', 'email');

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

    public function trashed()
    {
        $this->authorize('trashed', user::class);

        $users = user::onlyTrashed()->paginate(8);
        return view('admin.users.trash', compact('users'));
    }

    public function restore($id)
    {
        $this->authorize('restore', user::class);

        $user = user::onlyTrashed()->findOrFail($id);
        $user->restore();

        return redirect()->route('users.index')->with('Info', 'User restored successfully.');
    }

    public function forceDelete($id)
    {
        $this->authorize('forceDelete', user::class);

        $user = user::onlyTrashed()->findOrFail($id);
        $user->forceDelete();

        return redirect()->route('users.index')->with('Danger', 'User deleted successfully.');
    }

}
