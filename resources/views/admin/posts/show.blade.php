@extends('layouts.app')

@section('content')
    <div class="container-fluid py-8 px-4 md:px-8">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></li>
                <li class="breadcrumb-item active" aria-current="page">Post Details</li>
            </ol>
        </nav>

        <div class="card shadow mb-4">
            <div class="card-body">
                <h1 class="h3 mb-4 text-gray-800">{{ $post->title }}</h1>
                <p><strong>ID:</strong> {{ $post->id }}</p>
                <p><strong>Title:</strong> {{ $post->title }}</p>
                <p><strong>Content:</strong> {{ $post->content }}</p>
                <p><strong>Created At:</strong> {{ $post->created_at->format('Y-m-d H:i:s') }}</p>
            </div>
        </div>
    </div>
@endsection
