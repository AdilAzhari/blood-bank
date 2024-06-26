<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Client;
use App\Models\Governorate;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:client')->except('logout');
        $this->middleware('auth:client')->only('logout');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('phone', 'password');

        if (Auth::guard('client')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return to_route('home');
        }

        return redirect()->back()->withErrors([
            'phone' => __('auth.failed'),
        ])->withInput($request->only('phone', 'remember'));
    }
    public function showRegistrationForm()
    {
        $governorates = Governorate::all();
        $cities = City::all();
        $bloodTypes = BloodType::all();
        return view('auth.register', compact('governorates', 'cities', 'bloodTypes'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clients',
            'd_o_b' => 'required|date',
            'phone' => 'required|string|max:255',
            'last_donation_date' => 'required|date',
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

    // public function authLogout(Request $request)
    // {
        // Auth::guard('client')->logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();
        // dd('here');
        // return redirect()->route('home');
    // }
}
