<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::guard('client')->user();
        $favorites = $user->favorites()->paginate(10); // Adjust pagination as needed

        return view('front.Profile', compact('favorites'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients,email,' . Auth::guard('client')->id(),
            'phone' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $client = Auth::guard('client')->user();

        if ($request->filled('password')) {
            $client->password = bcrypt($request->password);
        }

        $client->fill($request->only('name', 'email', 'phone'));
        $client->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }

}
