<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Client;
use App\Models\Governorate;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('phone', 'password');

        if (Auth::guard('client')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return to_route('home');
        }

        return redirect()->back()->withErrors([
            'phone' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('phone', 'remember'));
    }
    public function showRegistrationForm()
    {
        $governorates = Governorate::all();
        $cities = City::all();
        $bloodTypes = BloodType::all();
        return view('front.register', compact('governorates', 'cities', 'bloodTypes'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clients,email',
            'd_o_b' => 'required|date',
            'phone' => 'required|string|min:10|max:14|unique:clients,phone',
            'last_donation_date' => 'required|date|before:today',
            'city_id' => 'required|exists:cities,id',
            'blood_type_id' => 'required|exists:blood_types,id',
            'password' => 'required|string|min:8|confirmed',
            'governorate_id' => 'required|exists:governorates,id',
            'status' => 'in:active,inactive'
        ]);


        $request->merge(['password' => bcrypt($request->password)]);

        $user = Client::create($request->only([
            'name',
            'email',
            'd_o_b',
            'phone',
            'last_donation_date',
            'city_id',
            'blood_type_id',
            'password',
            'status' => 0,
        ]));

        event(new Registered($user));

        Auth::guard('client')->login($user);

        return to_route('home');
    }

    public function authLogout(Request $request)
    {
        Auth::guard('client')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
