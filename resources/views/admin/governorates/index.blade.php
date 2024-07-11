@extends('layouts.app')

@section('content')
    <div class="container-fluid py-8 px-4 md:px-8">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Governorates</li>
            </ol>
        </nav>

        @include('components.alert')

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Governorates</h1>
            @can('create', App\Models\Governorate::class)
                <a href="{{ route('governorates.create') }}" class="btn btn-primary">Create</a>
            @endcan
            @can('restore', App\Models\Governorate::class)
                <a href="{{ route('governorates.trashed') }}" class="btn btn-warning">Trash</a>
            @endcan
        </div>

        <form action="{{ route('governorates.index') }}" method="GET" class="mb-4 d-flex flex-column flex-md-row">
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
                                <th>Cities</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($governorates as $governorate)
                                <tr>
                                    <td>{{ $governorate->id }}</td>
                                    <td><a
                                            href="{{ route('governorates.show', $governorate) }}">{{ $governorate->name }}</a>
                                    </td>
                                    <td><a
                                            href="{{ route('governorates.show', $governorate) }}">{{ $governorate->cities->count() }}</a>
                                    </td>
                                    <td>{{ $governorate->created_at->diffForHumans() }}</td>
                                    <td class="d-flex">
                                        @can('update', $governorate)
                                            <a href="{{ route('governorates.edit', $governorate) }}"
                                                class="btn btn-warning btn-sm me-2">Edit</a>
                                        @endcan
                                        @can('delete', $governorate)
                                            <form action="{{ route('governorates.destroy', $governorate) }}" method="POST"
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
                                    <td colspan="4" class="text-center">No governorates found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-4">
            {{ $governorates->links() }}
        </div>
    </div>
@endsection
