@extends('layouts.app')

@section('content')
    <div class="container-fluid py-8 px-4 md:px-8">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissions</a></li>
                <li class="breadcrumb-item active" aria-current="page">Permission Details</li>
            </ol>
        </nav>

        <div class="card shadow mb-4">
            <div class="card-body">
                <h1 class="h3 mb-4 text-gray-800">{{ $permission->name }}</h1>
                <p><strong>ID:</strong> {{ $permission->id }}</p>
                <p><strong>Name:</strong> {{ $permission->name }}</p>
                <p><strong>Created At:</strong> {{ $permission->created_at->format('Y-m-d H:i:s') }}</p>
                <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-warning mt-3">Edit</a>
            </div>
        </div>
    </div>
@endsection
