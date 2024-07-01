<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $this->hasPermission($user, 'viewAny-user');
    }

    public function view(User $user): bool
    {
        return $this->hasPermission($user, 'view-user');
    }

    public function create(User $user): bool
    {
        return $this->hasPermission($user, 'create-user');
    }

    public function update(User $user): bool
    {
        return $this->hasPermission($user, 'update-user');
    }

    public function delete(User $user): bool
    {
        return $this->hasPermission($user, 'delete-user');
    }

    private function hasPermission(User $user, string $permissionName): bool
    {
        return $user->getPermissionsViaRoles()->contains('name', $permissionName);
    }
}
