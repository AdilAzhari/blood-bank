@extends('layouts.app')
@section('content')
    <div class="container-fluid py-8 px-4 md:px-8">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blood Types</li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-header">
                <h1 class="h3 mb-4 text-gray-800">Blood Types</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bloodTypes as $bloodType)
                                <tr>
                                    <td>{{ $bloodType->name }}</td>
                                    <td>
                                        @can('view', $bloodType)
                                            <a href="{{ route('blood_types.show', $bloodType->id) }}"
                                                class="btn btn-info btn-sm">
                                                <i class="fas fa-eye fa-fw"></i>
                                                View
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
