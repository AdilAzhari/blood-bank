<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    use App\Http\Controllers\Front\SendsPasswordResetEmails;

    protected function broker()
    {
        return Password::broker('clients');
    }

    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }
}
