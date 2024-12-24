<?php

namespace App\Policies;

use App\Models\User;

class SettingPolicy extends BasePolicy
{
    public function viewAny(User $user): bool
    {
        return $this->hasPermission($user, 'viewAny-setting');
    }

    public function view(User $user): bool
    {
        return $this->checkPermission($user, 'view', 'setting');
    }

    public function create(User $user): bool
    {
        return $this->checkPermission($user, 'create', 'setting');
    }

    public function update(User $user): bool
    {
        return $this->checkPermission($user, 'update', 'setting');
    }

    public function delete(User $user): bool
    {
        return $this->checkPermission($user, 'delete', 'setting');
    }
}
