<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BloodTypePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $this->hasPermission($user, 'viewAny-bloodType');
    }

    public function view(User $user): bool
    {
        return $this->hasPermission($user, 'view-bloodType');
    }

    public function create(User $user): bool
    {
        return $this->hasPermission($user, 'create-bloodType');
    }

    public function update(User $user): bool
    {
        return $this->hasPermission($user, 'update-bloodType');
    }

    public function delete(User $user): bool
    {
        return $this->hasPermission($user, 'delete-bloodType');
    }

    public function restore(User $user): bool
    {
        return true;
    }

    public function forceDelete(User $user): bool
    {
        return true;
    }

    private function hasPermission(User $user, string $permissionName): bool
    {
        return $user->getPermissionsViaRoles()->contains('name', $permissionName);
    }
}
