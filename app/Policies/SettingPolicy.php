<?php

namespace App\Policies;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class SettingPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $this->hasPermission($user, 'viewAny-setting');
    }

    public function view(User $user): bool
    {
        return $this->hasPermission($user, 'view-setting');
    }

    public function create(User $user): bool
    {
        return $this->hasPermission($user, 'create-setting');
    }

    public function update(User $user): bool
    {
        return $this->hasPermission($user, 'update-setting');
    }

    public function delete(User $user): bool
    {
        return $this->hasPermission($user, 'delete-setting');
    }

    private function hasPermission(User $user, string $permissionName): bool
    {
        return $user->getPermissionsViaRoles()->contains('name', $permissionName);
    }
}
