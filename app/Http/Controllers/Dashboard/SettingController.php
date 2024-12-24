<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Setting::class);

        $settings = Setting::first();

        return view('admin.settings.index', compact('settings'));
    }

    public function update(UpdateSettingRequest $request)
    {
        $settings = Setting::first();
        $settings->update($request->all());

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
