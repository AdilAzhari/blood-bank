<?php

namespace App\Policies;

use App\Models\City;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CityPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $this->hasPermission($user, 'viewAny-city');
    }

    public function view(User $user): bool
    {
        return $this->hasPermission($user, 'view-city');
    }

    public function create(User $user): bool
    {
        return $this->hasPermission($user, 'create-city');
    }

    public function update(User $user): bool
    {
        return $this->hasPermission($user, 'update-city');
    }

    public function delete(User $user): bool
    {
        return $this->hasPermission($user, 'delete-city');
    }

    public function restore(User $user): bool
    {
        return $this->hasPermission($user, 'restore-city');
    }

    public function forceDelete(User $user): bool
    {
        return $this->hasPermission($user, 'forceDelete-city');
    }

    private function hasPermission(User $user, string $permissionName): bool
    {
        return $user->getPermissionsViaRoles()->contains('name', $permissionName);
    }
}
