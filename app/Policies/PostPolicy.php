<?php

namespace App\Policies;

use App\Models\User;

class PostPolicy extends BasePolicy
{
    public function viewAny(User $user): bool
    {
        return $this->checkPermission($user, 'viewAny', 'post');
    }

    public function view(User $user): bool
    {
        return $this->checkPermission($user, 'view', 'post');
    }

    public function create(User $user): bool
    {
        return $this->checkPermission($user, 'create', 'post');
    }

    public function update(User $user): bool
    {
        return $this->checkPermission($user, 'update', 'post');
    }

    public function delete(User $user): bool
    {
        return $this->checkPermission($user, 'delete', 'post');
    }
}
