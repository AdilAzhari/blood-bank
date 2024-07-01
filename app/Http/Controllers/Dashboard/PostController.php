<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Post::class);
        $posts = Post::with('category')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $this->authorize('create', Post::class);

        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Post::class);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post = new Post($request->only('title', 'content', 'category_id'));
        if ($request->hasFile('image')) {
            $post->image = $request->file('image')->store('images', 'public');
        }
        $post->save();

        return redirect()->route('posts.index')->with('Info', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        $this->authorize('update', Post::class);
        $post->load('category');
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }
    public function show(Post $post)
    {
        $this->authorize('view', Post::class);

        // $clients = Client::whereHas('posts', function ($query) use ($post) {
        //     $query->where('clientables.client_id', $post); // Corrected reference
        // })->get();
        // dd($clients);
        return view('admin.posts.show', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', Post::class);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post->fill($request->only('title', 'content', 'category_id'));
        if ($request->hasFile('image')) {
            $post->image = $request->file('image')->store('images', 'public');
        }
        $post->save();

        return to_route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', Post::class);

        $post->delete();
        return to_route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
