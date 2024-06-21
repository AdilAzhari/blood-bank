<?php

namespace App\Policies;

use App\Models\Client;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Spatie\Permission\Models\Role;

class ClientPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->can('viewAny-client');
    }

    public function view(User $user, Client $client)
    {
        return $user->can('view-client');
    }

    public function create(User $user)
    {
        return $user->can('create-client');
    }

    public function update(User $user, Client $client)
    {
        return $user->can('update-client');
    }

    public function delete(User $user, Client $client)
    {
        return $user->can('delete-client');
    }
}
