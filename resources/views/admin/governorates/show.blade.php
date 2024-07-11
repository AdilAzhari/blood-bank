@extends('layouts.app')

@section('content')
    <div class="container-fluid py-8 px-4 md:px-8">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('governorates.index') }}">Governorates</a></li>
                <li class="breadcrumb-item active" aria-current="page">Governorate Details</li>
            </ol>
        </nav>

        <div class="card shadow mb-4">
            <div class="card-body">
                <h1 class="h3 mb-4 text-gray-800">{{ $governorate->name }}</h1>
                <p><strong>ID:</strong> {{ $governorate->id }}</p>
                <p><strong>Name:</strong> {{ $governorate->name }}</p>
                <p><strong>Cities:</strong> {{ $governorate->cities->pluck('name')->join(', ') }}</p>
                <p><strong>Created At:</strong> {{ $governorate->created_at->format('Y-m-d H:i:s') }}</p>
                @can('update', $governorate)
                    <a href="{{ route('governorates.edit', $governorate) }}" class="btn btn-warning mt-3">Edit</a>
                @endcan
            </div>
        </div>
    </div>
@endsection
