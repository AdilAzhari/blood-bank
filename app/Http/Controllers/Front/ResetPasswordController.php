<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = '/home';

    protected function broker()
    {
        return Password::broker('clients');
    }

    public function showResetForm($token)
    {
        return view('auth.passwords.reset')->with(['token' => $token, 'email' => request('email')]);
    }
}
