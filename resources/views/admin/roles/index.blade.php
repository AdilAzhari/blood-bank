@extends('layouts.app')

@section('content')
    <div class="container-fluid py-8 px-4 md:px-8">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Roles</li>
            </ol>
        </nav>

        @include('components.alert')

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Roles</h1>
            @can('create', Spatie\Permission\Models\Role::class)
                <a href="{{ route('roles.create') }}" class="btn btn-primary">Create</a>
            @endcan
            @can('viewAny', Spatie\Permission\Models\role::class)
                <a href="{{ route('roles.trashed') }}" class="btn btn-info">Trashed</a>
            @endcan
        </div>

        <form action="{{ route('roles.index') }}" method="GET" class="mb-4 d-flex flex-column flex-md-row">
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
                                <th>Permissions</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td><a href="{{ route('roles.show', $role) }}">{{ $role->name }}</a></td>
                                    <td>{{ $role->permissions->pluck('name')->join(', ') }}</td>
                                    <td>{{ $role->created_at->diffForHumans() }}</td>
                                    <td class="d-flex">
                                        @can('view', $role)
                                            <a href="{{ route('roles.show', $role) }}"
                                                class="btn btn-info btn-sm me-2">View</a>
                                        @endcan
                                        @can('update', $role)
                                            <a href="{{ route('roles.edit', $role) }}"
                                                class="btn btn-warning btn-sm me-2">Edit</a>
                                        @endcan
                                        @can('delete', $role)
                                            <form action="{{ route('roles.destroy', $role) }}" method="POST"
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
                                    <td colspan="5" class="text-center">No roles found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-4">
            {{ $roles->links() }}
        </div>
    </div>
@endsection
