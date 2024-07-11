@extends('layouts.app')
@section('content')
    <div class="container-fluid py-8 px-4 md:px-8">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Clients</a></li>
                <li class="breadcrumb-item active" aria-current="page">Client Details</li>
            </ol>
        </nav>

        <div class="card shadow mb-4">
            <div class="card-body">
                <h1 class="h3 mb-4 text-gray-800">{{ $client->name }}</h1>
                <p><strong>Name:</strong> {{ $client->name }}</p>
                <p><strong>Email:</strong> {{ $client->email }}</p>
                <p><strong>Phone:</strong> {{ $client->phone }}</p>
                <p><strong>City:</strong>{{ $client->city->name }}</p>
                <p><strong>Blood Type:</strong> {{ $client->bloodType->name }}</p>
                <p><strong>Birth Date:</strong> {{ $client->birth_date }}</p>
                <p><strong>Last Donation Date:</strong> {{ $client->last_donation_date }}</p>
                <p><strong>Created At:</strong> {{ $client->created_at->format('Y-m-d H:i:s') }}</p>
            </div>
        </div>
    </div>
@endsection
