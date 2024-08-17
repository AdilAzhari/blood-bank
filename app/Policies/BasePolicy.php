<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Cache;

class BasePolicy
{
    protected function hasPermission(User $user, string $permissionName): bool
    {
        $cacheKey = "user_{$user->id}_permission_{$permissionName}";

        return Cache::remember($cacheKey, now()->addMinutes(60), function () use ($user, $permissionName) {
            return $user->hasPermissionTo($permissionName);
        });
    }

    protected function checkPermission(User $user, string $action, string $model): bool
    {
        return $this->hasPermission($user, "{$action}-{$model}");
    }
}
