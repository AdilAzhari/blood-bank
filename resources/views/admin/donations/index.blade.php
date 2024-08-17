@extends('layouts.app')
@section('content')
    <div class="container-fluid py-8 px-4 md:px-8">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('donations.index') }}">Donation requets</a></li>
            </ol>
        </nav>

        <div class="card shadow mb-4">
            <div class="card-body">
                <h1 class="h3 mb-4 text-gray-800">Donations</h1>
                @can('restore', App\Models\DonationRequest::class)
                    <a href="{{ route('donations.trashed') }}" class="btn btn-warning mb-3">Trash</a>
                @endcan

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>Blood Type</th>
                            <th>Patient Name</th>
                            <th>Hospital Name</th>
                            <th>City</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($donations as $donation)
                            <tr>
                                <td>{{ $donation->id }}</td>
                                <td>{{ $donation->client->name }}</td>
                                <td>{{ $donation->bloodtype->name }}</td>
                                <td>{{ $donation->patient_name }}</td>
                                <td>{{ $donation->hospital_name }}</td>
                                <td>{{ $donation->city->name }}</td>
                                <td>{{ $donation->created_at->diffForHumans() }}</td>
                                <td>
                                    @can('delete', $donation)
                                        <form action="{{ route('donations.destroy', $donation) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    @endcan
                                    {{-- @can('view', $donation) --}}
                                        <a href="{{ route('donations.show', $donation) }}" class="btn btn-info">View</a>
                                    {{-- @endcan --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $donations->links() }}
            </div>
        </div>
    </div>
@endsection
