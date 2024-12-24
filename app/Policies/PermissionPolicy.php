<?php

namespace App\Policies;

use App\Models\User;

class PermissionPolicy extends BasePolicy
{
    public function viewAny(User $user): bool
    {
        return $this->checkPermission($user, 'viewAny', 'permission');
    }

    public function view(User $user): bool
    {
        return $this->checkPermission($user, 'view', 'permission');
    }

    public function create(User $user): bool
    {
        return $this->checkPermission($user, 'create', 'permission');
    }

    public function update(User $user): bool
    {
        return $this->checkPermission($user, 'update', 'permission');
    }

    public function delete(User $user): bool
    {
        return $this->checkPermission($user, 'delete', 'permission');
    }
}
