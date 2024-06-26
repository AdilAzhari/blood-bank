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
}
