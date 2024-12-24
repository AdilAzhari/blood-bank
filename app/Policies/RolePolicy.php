<?php

namespace App\Policies;

use App\Models\User;

class RolePolicy
{
    public function viewAny(User $user): bool
    {
        return $this->hasPermission($user, 'viewAny-role');
    }

    public function view(User $user): bool
    {
        return $this->hasPermission($user, 'view-role');
    }

    public function create(User $user): bool
    {
        return $this->hasPermission($user, 'create-role');
    }

    public function update(User $user): bool
    {
        return $this->hasPermission($user, 'update-role');
    }

    public function delete(User $user): bool
    {
        return $this->hasPermission($user, 'delete-role');
    }

    public function restore(User $user): bool
    {
        return $this->hasPermission($user, 'restore-role');
    }

    public function forceDelete(User $user): bool
    {
        return $this->hasPermission($user, 'forceDelete-role');
    }

    private function hasPermission(User $user, string $permissionName): bool
    {
        return $user->getPermissionsViaRoles()->contains('name', $permissionName);
    }
}
