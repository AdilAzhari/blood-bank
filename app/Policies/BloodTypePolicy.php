<?php

namespace App\Policies;

use App\Models\User;

class BloodTypePolicy extends BasePolicy
{

    public function viewAny(User $user): bool
    {
        return $this->checkPermission($user, 'viewAny','bloodType');
    }

    public function view(User $user): bool
    {
        return $this->checkPermission($user, 'view','bloodType');
    }
}
