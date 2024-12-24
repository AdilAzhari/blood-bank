<?php

namespace App\Policies;

use App\Models\User;

class ContactPolicy extends BasePolicy
{
    public function viewAny(User $user): bool
    {
        return $this->checkPermission($user, 'viewAny', 'contact');
    }

    public function delete(User $user): bool
    {
        return $this->checkPermission($user, 'delete', 'contact');
    }
}
