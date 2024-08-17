@extends('layouts.app')

@section('content')
    <div class="container-fluid py-8 px-4 md:px-8">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cities.index') }}">Cities</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit City</li>
            </ol>
        </nav>

        <div class="card shadow mb-4">
            <div class="card-body">
                <h1 class="h3 mb-4 text-gray-800">Edit City</h1>
                <form action="{{ route('cities.update', $city) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">City Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="name" placeholder="Enter city name" value="{{ old('name', $city->name) }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Governorate">Governorate</label>
                        <select name="governorate_id" id="state" class="form-control @error('governorate_id_id') is-invalid @enderror">
                            <option value="">Select Governorate</option>
                            @foreach ($governorates as $governorate_id)
                                <option value="{{ $governorate_id->id }}"
                                    {{ old('Governorate_id', $governorate_id->governorate_id_id) == $governorate_id->id ? 'selected' : '' }}>
                                    {{ $governorate_id->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('governorate_id_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
