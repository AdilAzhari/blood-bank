@extends('layouts.app')

@section('content')
    <div class="container-fluid py-8 px-4 md:px-8">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                <li class="breadcrumb-item active" aria-current="page">Role Details</li>
            </ol>
        </nav>

        <div class="card shadow mb-4">
            <div class="card-body">
                <h1 class="h3 mb-4 text-gray-800">{{ $role->name }}</h1>
                <p><strong>ID:</strong> {{ $role->id }}</p>
                <p><strong>Name:</strong> {{ $role->name }}</p>
                <p><strong>Permissions:</strong> {{ $role->permissions->pluck('name')->join(', ') }}</p>
                <p><strong>Created At:</strong> {{ $role->created_at->format('Y-m-d H:i:s') }}</p>
                <a href="{{ route('roles.edit', $role) }}" class="btn btn-warning mt-3">Edit</a>
            </div>
        </div>
    </div>
@endsection
