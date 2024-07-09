<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController
{
    use ApiResponser;
    public function index()
    {
        $posts = Post::all();
        return $this->successResponse($posts, 'Posts Retrieved Successfully');
    }
    public function post($id){
        $post = Post::find($id);
        if($post){
            return $this->successResponse($post, 'Post Retrieved Successfully');
        }else{
            return $this->errorResponse('Post Not Found', 404);
        }
    }

    public function listFavourites()
    {
        $user = Auth::guard('client')->user();
        return $this->successResponse($user->favourites, 'Favourites Retrieved Successfully');
    }

    public function toggleFavourite($postId)
    {
        $user = Auth::guard('client')->user();
        $favourite = $user->favourites()->where('post_id', $postId)->first();

        if ($favourite) {
            $favourite->delete();
            return $this->successResponse([], 'Removed from favourites');
        } else {
            $user->favourites()->create(['post_id' => $postId]);
            return $this->successResponse([], 'Added to favourites');
        }
    }
}
