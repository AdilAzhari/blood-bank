<?php

namespace App\Policies;

use App\Models\Client;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Spatie\Permission\Models\Role;

class ClientPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return $user->can('viewAny-client');
        // $user = User::with('roles')->where('id', auth()->id())->first();
        // $role = $user->roles->pluck('name')->toArray();
        // $permissions = Role::with('permissions')->whereIn('name', $role)->get()->pluck('permissions')->flatten()->pluck('name')->toArray();
        // foreach ($permissions as $permission) {
        //     if ($permission == 'viewAny-client') {
        //         return Response::allow();
        //     }
        // }
        // return Response::deny('You are not authorized to view contacts.');

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Client $client)
    {
        if(in_array($user->role, Role::all()->pluck('name')->toArray())){
            return Response::allow();
        }
        return Response::deny('You are not authorized to view this client.');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Client $client): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Client $client): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Client $client): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Client $client): bool
    {
        //
    }
}
