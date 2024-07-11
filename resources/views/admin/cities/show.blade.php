@extends('layouts.app')

@section('content')
    <div class="container-fluid py-8 px-4 md:px-8">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cities.index') }}">Cities</a></li>
                <li class="breadcrumb-item active" aria-current="page">City Details</li>
            </ol>
        </nav>

        <div class="card shadow mb-4">
            <div class="card-body">
                <h1 class="h3 mb-4 text-gray-800">{{ $city->name }}</h1>
                <p><strong>ID:</strong> {{ $city->id }}</p>
                <p><strong>Name:</strong> {{ $city->name }}</p>
                <p><strong>Governorate:</strong> {{ $city->governorate->name }}</p>
                <p><strong>Created At:</strong> {{ $city->created_at->format('Y-m-d H:i:s') }}</p>
            </div>
        </div>
    </div>
@endsection
