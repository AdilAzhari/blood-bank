<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    use ApiResponser;
    public function index()
    {
        $user = Auth::guard('sanctum')->user();
        $favourites = $user->favourites()->get();
        return $this->successResponse(PostResource::collection($favourites), 'Favourites retrieved successfully.');
    }

    public function toggle(Post $post)
    {
        $user = Auth::guard('sanctum')->user();

        $user->favourites()->toggle($post->id);

        return $this->successResponse([], 'Post toggled successfully.');
    }
}
