<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $this->hasPermission($user, 'viewAny-post');
    }

    public function view(User $user): bool
    {
        return $this->hasPermission($user, 'view-post');
    }

    public function create(User $user): bool
    {
        return $this->hasPermission($user, 'create-post');
    }

    public function update(User $user): bool
    {
        return $this->hasPermission($user, 'update-post');
    }

    public function delete(User $user): bool
    {
        return $this->hasPermission($user, 'delete-post');
    }

    private function hasPermission(User $user, string $permissionName): bool
    {
        return $user->getPermissionsViaRoles()->contains('name', $permissionName);
    }
}
