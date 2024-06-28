<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Auth::guard('client')->user()->favorites;
        return view('front.profile', compact('favorites'));
    }

    public function toggle(Post $post)
    {
        $user = Auth::guard('client')->user();
        if ($user->favorites()->where('post_id', $post->id)->exists()) {
            $user->favorites()->detach($post->id);
        } else {
            $user->favorites()->attach($post->id);
        }

        return redirect()->back();
    }

}
