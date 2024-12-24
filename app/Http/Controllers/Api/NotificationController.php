<?php

namespace App\Http\Controllers\Api;

use App\Models\Notification;
use App\Traits\ApiResponser;

class NotificationController
{
    use ApiResponser;

    public function index()
    {
        $notifications = Notification::with('clients')->get();

        return $this->successResponse($notifications, 'All Notifications', 200);
    }
}
