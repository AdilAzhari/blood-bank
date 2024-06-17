<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        return view('settings.index',compact('settings'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'about_app' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'notification_setting_text' => 'required|string',
            'email' => 'required|string|email|max:255',
            'fb_link' => 'required|string|url|max:255',
            'tw_link' => 'required|string|url|max:255',
            'insta_link' => 'required|string|url|max:255',

        ]);

        $settings = Setting::first();
        $settings->update($request->all());

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
