<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\NotificationResource;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController
{
    use ApiResponser;
    public function index()
    {
        $user = Auth::guard('sanctum')->user();
        $notifications = $user->notifications;

        return NotificationResource::collection($notifications);
    }

}
