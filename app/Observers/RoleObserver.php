<?php

namespace App\Observers;

use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role as ModelsRole;

class RoleObserver
{
    /**
     * Handle the role "created" event.
     */
    public function creating(Role $role): void
    {
        $role->description = ucfirst($role->description);
    }

    /**
     * Handle the role "updated" event.
     */
    public function updated(role $role): void
    {
        $role->description = ucfirst($role->description);
    }
}
