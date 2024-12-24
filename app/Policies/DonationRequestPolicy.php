<?php

namespace App\Policies;

use App\Models\User;

class DonationRequestPolicy extends BasePolicy
{
    public function viewAny(User $user): bool
    {
        return $this->checkPermission($user, 'viewAny', 'Donation');
    }

    public function view(User $user): bool
    {
        return $this->checkPermission($user, 'view', 'Donation');
    }

    public function create(User $user): bool
    {
        return $this->checkPermission($user, 'create', 'Donation');
    }

    public function update(User $user): bool
    {
        return $this->checkPermission($user, 'update', 'Donation');
    }

    public function delete(User $user): bool
    {
        return $this->checkPermission($user, 'delete', 'Donation');
    }

    public function trashed(User $user): bool
    {
        return $this->checkPermission($user, 'trashed', 'Donation');
    }

    public function restore(User $user): bool
    {
        return $this->checkPermission($user, 'restore', 'Donation');
    }

    public function forceDelete(User $user): bool
    {
        return $this->checkPermission($user, 'forceDelete', 'Donation');
    }
}
