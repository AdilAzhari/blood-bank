<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DonationRequestPolicy
{

    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $this->hasPermission($user, 'viewAny-Donation');
    }

    public function view(User $user): bool
    {
        return $this->hasPermission($user, 'view-Donation');
    }

    public function create(User $user): bool
    {
        return $this->hasPermission($user, 'create-Donation');
    }

    public function update(User $user): bool
    {
        return $this->hasPermission($user, 'update-Donation');
    }

    public function delete(User $user): bool
    {
        return $this->hasPermission($user, 'delete-Donation');
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
