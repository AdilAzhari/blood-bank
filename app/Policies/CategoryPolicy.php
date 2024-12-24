<?php

namespace App\Policies;

use App\Models\User;

class CategoryPolicy extends BasePolicy
{
    public function viewAny(User $user): bool
    {
        return $this->checkPermission($user, 'viewAny', 'category');
    }

    public function view(User $user): bool
    {
        return $this->checkPermission($user, 'view', 'category');
    }

    public function create(User $user): bool
    {
        return $this->checkPermission($user, 'create', 'category');
    }

    public function update(User $user): bool
    {
        return $this->checkPermission($user, 'update', 'category');
    }

    public function trashed(User $user): bool
    {
        return $this->checkPermission($user, 'trashed', 'category');
    }

    public function delete(User $user): bool
    {
        return $this->checkPermission($user, 'delete', 'category');
    }

    public function restore(User $user): bool
    {
        return $this->checkPermission($user, 'restore', 'category');
    }

    public function forceDelete(User $user): bool
    {
        return $this->checkPermission($user, 'forceDelete', 'category');
    }
}
