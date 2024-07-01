<?php

namespace App\Policies;

use App\Models\Client;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $this->hasPermission($user, 'viewAny-client');
    }

    public function view(User $user): bool
    {
        return $this->hasPermission($user, 'view-client');
    }

    public function create(User $user): bool
    {
        return $this->hasPermission($user, 'create-client');
    }

    public function update(User $user): bool
    {
        return $this->hasPermission($user, 'update-client');
    }

    public function delete(User $user): bool
    {
        return $this->hasPermission($user, 'delete-client');
    }

    private function hasPermission(User $user, string $permissionName): bool
    {
        return $user->getPermissionsViaRoles()->contains('name', $permissionName);
    }
}
