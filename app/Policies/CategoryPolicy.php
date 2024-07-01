<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $this->hasPermission($user, 'viewAny-category');
    }

    public function view(User $user): bool
    {
        return $this->hasPermission($user, 'view-category');
    }

    public function create(User $user): bool
    {
        return $this->hasPermission($user, 'create-category');
    }

    public function update(User $user): bool
    {
        return $this->hasPermission($user, 'update-category');
    }

    public function delete(User $user): bool
    {
        return $this->hasPermission($user, 'delete-category');
    }

    private function hasPermission(User $user, string $permissionName): bool
    {
        return $user->getPermissionsViaRoles()->contains('name', $permissionName);
    }
}
