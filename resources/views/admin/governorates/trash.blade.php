@extends('layouts.app')

@section('content')
    <div class="container-fluid py-8 px-4 md:px-8">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blood Types</li>
            </ol>
        </nav>

        @include('components.alert')

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Blood Types</h1>
            <a href="{{ route('blood_types.create') }}" class="btn btn-primary">Create</a>
        </div>

        <form action="{{ route('blood_types.index') }}" method="GET" class="mb-4 d-flex flex-column flex-md-row">
            <input type="text" name="name" class="form-control mb-2 mb-md-0 me-md-2" placeholder="Search by name"
                value="{{ request('name') }}">
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
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bloodTypes as $bloodType)
                                <tr>
                                    <td>{{ $bloodType->id }}</td>
                                    <td><a href="{{ route('blood_types.show', $bloodType) }}">{{ $bloodType->name }}</a>
                                    </td>
                                    <td>{{ $bloodType->created_at->diffForHumans() }}</td>
                                    <td class="d-flex">
                                        @can('update', $bloodType)
                                            <a href="{{ route('blood_types.edit', $bloodType) }}"
                                                class="btn btn-warning btn-sm me-2">Edit</a>
                                        @endcan
                                        @can('delete', $bloodType)
                                            <form action="{{ route('blood_types.destroy', $bloodType) }}" method="POST"
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
                                    <td colspan="4" class="text-center">No blood types found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-4">
            {{ $bloodTypes->links() }}
        </div>
    </div>
@endsection
