<?php

namespace App\Policies;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class NotificationPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $this->hasPermission($user, 'viewAny-notification');
    }

    public function view(User $user): bool
    {
        return $this->hasPermission($user, 'view-notification');
    }

    public function create(User $user): bool
    {
        return $this->hasPermission($user, 'create-notification');
    }

    public function update(User $user): bool
    {
        return $this->hasPermission($user, 'update-notification');
    }

    public function delete(User $user): bool
    {
        return $this->hasPermission($user, 'delete-notification');
    }

    private function hasPermission(User $user, string $permissionName): bool
    {
        return $user->getPermissionsViaRoles()->contains('name', $permissionName);
    }
}
