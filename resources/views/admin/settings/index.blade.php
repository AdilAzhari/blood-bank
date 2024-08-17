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
                        <label for="site_name">About App</label>
                        <textarea name="about_app" class="form-control @error('about_app') is-invalid @enderror">{{ old('about_app', $settings->about_app) }}</textarea>
                        @error('about_app')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="site_name">Phone Number</label>
                        <input type="text" name="phone_number"
                            class="form-control @error('phone_number') is-invalid @enderror"
                            value="{{ old('phone_number', $settings->phone_number) }}">
                        @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="site_name">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $settings->email) }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="fb_link">Facebooke Link</label>
                        <input type="text" name="fb_link" class="form-control @error('fb_link') is-invalid @enderror"
                            value="{{ old('fb_link', $settings->fb_link) }}">
                        @error('fb_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="tw_link">Twitter Link</label>
                        <input type="text" name="tw_link" class="form-control @error('tw_link') is-invalid @enderror"
                            value="{{ old('tw_link', $settings->tw_link) }}">
                        @error('tw_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="insta_link">Instagram Link</label>
                        <input type="text" name="insta_link"
                            class="form-control @error('insta_link') is-invalid @enderror"
                            value="{{ old('insta_link', $settings->insta_link) }}">
                        @error('insta_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="notification_setting_text">Notification Setting Text</label>
                        <textarea name="notification_setting_text"
                            class="form-control @error('notification_setting_text') is-invalid @enderror">{{ old('notification_setting_text', $settings->notification_setting_text) }}</textarea>

                        @error('notification_setting_text')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
