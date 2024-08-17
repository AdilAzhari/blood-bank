@extends('layouts.app')
@section('content')
    <div class="container-fluid py-8 px-4 md:px-8">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('donation-request') }}">Donation requets</a></li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-body">
                <h1 class="h3 mb-4 text-gray-800">{{ $donation->patient_name }}</h1>
                <p><strong>Client:</strong> {{ $donation->client->name }}</p>
                <p><strong>Blood Type:</strong> {{ $donation->bloodtype->name }}</p>
                <p><strong>Patient Name:</strong> {{ $donation->patient_name }}</p>
                <p><strong>Hospital Name:</strong> {{ $donation->hospital_name }}</p>
                <p></p><strong>City:</strong> {{ $donation->city->name }}</p>
                <p><strong>Patient Phone Number:</strong> {{ $donation->patient_phone_number }}</p>
                <p><strong>Number Of Bags Needed:</strong> {{ $donation->bags_number }}</p>
                <p><strong>Details:</strong> {{ $donation->details }}</p>
                <p><strong>Created At:</strong> {{ $donation->created_at }}</p>
                @can('update', $donation)
                    <a href="{{ route('donations.edit', $donation) }}" class="btn btn-warning mt-3">Edit</a>
                @endcan
            </div>
        </div>
    </div>
@endsection
