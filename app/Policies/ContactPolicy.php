<?php

namespace App\Policies;

use App\Models\User;

class ContactPolicy
{
    public function viewAny(User $user): bool
    {
        return $this->hasPermission($user, 'viewAny-contact');
    }
    public function delete(User $user): bool
    {
        return $this->hasPermission($user, 'delete-contact');
    }
    private function hasPermission(User $user, string $permissionName): bool
    {
        return $user->getPermissionsViaRoles()->contains('name', $permissionName);
    }
}
