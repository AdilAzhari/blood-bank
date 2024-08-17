<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Post::class);
        $posts = Post::with('category')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $this->authorize('view', Post::class);
        return view('admin.posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', Post::class);

        $post->delete();
        return to_route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
