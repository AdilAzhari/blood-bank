<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $this->hasPermission($user, 'viewAny-permission');
    }

    public function view(User $user): bool
    {
        return $this->hasPermission($user, 'view-permission');
    }

    public function create(User $user): bool
    {
        return $this->hasPermission($user, 'create-permission');
    }

    public function update(User $user): bool
    {
        return $this->hasPermission($user, 'update-permission');
    }

    public function delete(User $user): bool
    {
        return $this->hasPermission($user, 'delete-permission');
    }

    private function hasPermission(User $user, string $permissionName): bool
    {
        return $user->getPermissionsViaRoles()->contains('name', $permissionName);
    }
}
