@inject('settings', 'App\Models\Setting')
@extends('layouts.app')
@section('content')
    <div class="container-fluid py-8 px-4 md:px-8">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('settings.index') }}">Settings</a></li>
                <li class="breadcrumb-item active" aria-current="page">Settings</li>
            </ol>

        </nav>
        <div class="card shadow mb-4">
            <div class="card-body">
                <h1 class="h3 mb-4 text-gray-800">Settings</h1>
                <form action="{{ route('settings.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mt-3">
                        <label for="site_name">Site Name</label>
                        <input type="text" name="site_name" class="form-control @error('site_name') is-invalid @enderror"
                            id="site_name" value="{{ old('site_name', $settings->site_name) }}">
                        @error('site_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="site_email">Site Email</label>
                        <input type="email" name="site_email"
                            class="form-control @error('site_email') is-invalid @enderror" id="site_email"
                            value="{{ old('site_email', $settings->site_email) }}">
                        @error('site_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
    @endsection
