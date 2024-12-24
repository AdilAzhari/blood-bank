<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy extends BasePolicy
{
    public function viewAny(User $user): bool
    {
        return $this->checkPermission($user, 'viewAny', 'user');
    }

    public function view(User $user): bool
    {
        return $this->checkPermission($user, 'view', 'user');
    }

    public function create(User $user): bool
    {
        return $this->checkPermission($user, 'create', 'user');
    }

    public function update(User $user): bool
    {
        return $this->checkPermission($user, 'update', 'user');
    }

    public function delete(User $user): bool
    {
        return $this->checkPermission($user, 'delete', 'user');
    }
}
