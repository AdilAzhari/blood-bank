<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-post')->only(['index', 'show']);
        $this->middleware('permission:create-post')->only(['create', 'store']);
        $this->middleware('permission:edit-post')->only(['edit', 'update']);
        $this->middleware('permission:delete-post')->only('destroy');
        $this->middleware('permission:viewAny-post')->only('index');

    }
    public function index()
    {
        $posts = Post::with('category')->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
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
        $post->load('category');
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }
    public function show(Post $post)
    {
        // $clients = Client::whereHas('posts', function ($query) use ($post) {
        //     $query->where('clientables.client_id', $post); // Corrected reference
        // })->get();
        // dd($clients);
        return view('posts.show', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
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
        $post->delete();
        return to_route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
