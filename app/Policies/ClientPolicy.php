<?php

namespace App\Policies;

use App\Models\User;
class ClientPolicy extends BasePolicy
{
    public function viewAny(User $user): bool
    {
        return $this->checkPermission($user, 'viewAny','client');
    }

    public function view(User $user): bool
    {
        return $this->checkPermission($user, 'view','client');
    }
    public function update(User $user): bool
    {
        return $this->checkPermission($user, 'update','client');
    }

    public function delete(User $user): bool
    {
        return $this->checkPermission($user, 'delete','client');
    }
}
