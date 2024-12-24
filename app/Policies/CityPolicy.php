<?php

namespace App\Policies;

use App\Models\User;

class CityPolicy extends BasePolicy
{
    public function viewAny(User $user): bool
    {
        return $this->checkPermission($user, 'viewAny', 'city');
    }

    public function view(User $user): bool
    {
        return $this->checkPermission($user, 'view', 'city');

    }

    public function create(User $user): bool
    {
        return $this->checkPermission($user, 'create', 'city');
    }

    public function update(User $user): bool
    {
        return $this->checkPermission($user, 'update', 'city');
    }

    public function delete(User $user): bool
    {
        return $this->checkPermission($user, 'delete', 'city');
    }

    public function trashed(User $user): bool
    {
        return $this->checkPermission($user, 'trashed', 'city');
    }

    public function restore(User $user): bool
    {
        return $this->checkPermission($user, 'restore', 'city');
    }

    public function forceDelete(User $user): bool
    {
        return $this->checkPermission($user, 'forceDelete', 'city');
    }
}
