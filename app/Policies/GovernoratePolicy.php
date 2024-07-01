<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GovernoratePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $this->hasPermission($user, 'viewAny-governorate');
    }

    public function view(User $user): bool
    {
        return $this->hasPermission($user, 'view-governorate');
    }

    public function create(User $user): bool
    {
        return $this->hasPermission($user, 'create-governorate');
    }

    public function update(User $user): bool
    {
        return $this->hasPermission($user, 'update-governorate');
    }

    public function delete(User $user): bool
    {
        return $this->hasPermission($user, 'delete-governorate');
    }

    private function hasPermission(User $user, string $permissionName): bool
    {
        return $user->getPermissionsViaRoles()->contains('name', $permissionName);
    }
}
