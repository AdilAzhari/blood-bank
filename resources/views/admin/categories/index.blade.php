@extends('layouts.app')

@section('content')
    <div class="container-fluid py-8 px-4 md:px-8">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categories</li>
            </ol>
        </nav>

        @include('components.alert')

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Categories</h1>
            @can('create', App\Models\Category::class)
                <a href="{{ route('categories.create') }}" class="btn btn-primary">Create</a>
            @endcan
            @can('restore', App\Models\Category::class)
                <a href="{{ route('categories.trashed') }}" class="btn btn-warning">Trash</a>
            @endcan
        </div>

        <form action="{{ route('categories.index') }}" method="GET" class="mb-4 d-flex flex-column flex-md-row">
            <input type="text" name="name" class="form-control mb-2 mb-md-0 me-md-2" placeholder="Search by name">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Related Posts</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></td>
                                    <td><a
                                            href="{{ route('categories.show', $category) }}">{{ $category->posts->count() }}</a>
                                    </td>
                                    <td>{{ $category->created_at->diffForHumans() }}</td>
                                    <td class="d-flex">
                                        @can('update', $category)
                                            <a href="{{ route('categories.edit', $category) }}"
                                                class="btn btn-warning btn-sm me-2">Edit</a>
                                        @endcan
                                        @can('delete', $category)
                                            <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                                onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No Categories found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-4">
            {{ $categories->links() }}
        </div>
    </div>
@endsection
