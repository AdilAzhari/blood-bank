<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $unreadNotifications = $user->unreadNotifications;

        return view('notifications.index', compact('unreadNotifications'));
    }

    public function markAsRead($id)
    {
        $notification = auth()->user()->unreadNotifications->find($id);

        if ($notification) {
            $notification->markAsRead();
        }

        return redirect()->route('notifications.index')->with('success', 'Notification marked as read.');
    }
}
