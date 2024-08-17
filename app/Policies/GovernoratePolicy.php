<?php

namespace App\Policies;

use App\Models\User;
class GovernoratePolicy extends BasePolicy
{
    public function viewAny(User $user): bool
    {
        return $this->checkPermission($user, 'viewAny','governorate');
    }

    public function view(User $user): bool
    {
        return $this->checkPermission($user, 'view','governorate');
    }

    public function create(User $user): bool
    {
        return $this->checkPermission($user, 'create','governorate');
    }

    public function update(User $user): bool
    {
        return $this->checkPermission($user, 'update','governorate');
    }

    public function delete(User $user): bool
    {
        return $this->checkPermission($user, 'delete','governorate');
    }
    public function trashed(User $user): bool
    {
        return $this->checkPermission($user, 'trashed','governorate');
    }
    public function restore(User $user): bool
    {
        return $this->checkPermission($user, 'restore','governorate');
    }
    public function forceDelete(User $user): bool
    {
        return $this->checkPermission($user, 'forceDelete','governorate');
    }
}
