@extends('layouts.app')

@section('content')
    <div class="container-fluid py-8 px-4 md:px-8">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('blood_types.index') }}">Blood Types</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blood Type Details</li>
            </ol>
        </nav>

        <div class="card shadow mb-4">
            <div class="card-body">
                <h1 class="h3 mb-4 text-gray-800">{{ $bloodType->name }}</h1>
                <p><strong>ID:</strong> {{ $bloodType->id }}</p>
                <p><strong>Name:</strong> {{ $bloodType->name }}</p>
                <p><strong>Created At:</strong> {{ $bloodType->created_at->format('Y-m-d H:i:s') }}</p>
                <a href="{{ route('blood_types.edit', $bloodType) }}" class="btn btn-warning mt-3">Edit</a>
            </div>
        </div>
    </div>
@endsection
