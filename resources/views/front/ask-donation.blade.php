<x-front.master bodyClass="ask-donation">
    <div class="container mt-5">
        <h2>Ask for Donation</h2>

        @session('success')
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endsession
        <form method="POST" action="{{ route('donation-request.store') }}">
            @csrf
            <div class="form-group">
                <label for="patient_name">Patient Name</label>
                <input type="text" class="form-control @error('patient_name') is-invalid @enderror" id="patient_name" name="patient_name" value="{{ old('patient_name') }}" required>
                @error('patient_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="patient_age">Patient Age</label>
                <input type="number" class="form-control @error('patient_age') is-invalid @enderror" id="patient_age" name="patient_age" value="{{ old('patient_age') }}" required>
                @error('patient_age')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="bags_number">Number of Bags Needed</label>
                <input type="number" class="form-control @error('bags_number') is-invalid @enderror" id="bags_number" name="bags_number" value="{{ old('bags_number') }}" required>
                @error('bags_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="hospital_name">Hospital Name</label>
                <input type="text" class="form-control @error('hospital_name') is-invalid @enderror" id="hospital_name" name="hospital_name" value="{{ old('hospital_name') }}" required>
                @error('hospital_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="hospital_address">Hospital Address</label>
                <input type="text" class="form-control @error('hospital_address') is-invalid @enderror" id="hospital_address" name="hospital_address" value="{{ old('hospital_address') }}" required>
                @error('hospital_address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="patient_phone_number">Patient Phone Number</label>
                <input type="text" class="form-control @error('patient_phone_number') is-invalid @enderror" id="patient_phone_number" name="patient_phone_number" value="{{ old('patient_phone_number') }}" required>
                @error('patient_phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="details">Details</label>
                <textarea class="form-control @error('details') is-invalid @enderror" id="details" name="details" rows="4" required>{{ old('details') }}</textarea>
                @error('details')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="latitude">Latitude</label>
                <input type="number" class="form-control @error('latitude') is-invalid @enderror" id="latitude" name="latitude" value="{{ old('latitude') }}" step="any" min="-90" max="90">
                @error('latitude')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="longitude">Longitude</label>
                <input type="number" class="form-control @error('longitude') is-invalid @enderror" id="longitude" name="longitude" value="{{ old('longitude') }}" step="any" min="-180" max="180">
                @error('longitude')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="blood_type_id">Blood Type</label>
                <select class="form-control @error('blood_type_id') is-invalid @enderror" id="blood_type_id" name="blood_type_id" required>
                    <option selected disabled>Choose blood type</option>
                    @foreach ($bloodTypes as $bloodType)
                        <option value="{{ $bloodType->id }}" {{ old('blood_type_id') == $bloodType->id ? 'selected' : '' }}>{{ $bloodType->name }}</option>
                    @endforeach
                </select>
                @error('blood_type_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="city_id">City</label>
                <select class="form-control @error('city_id') is-invalid @enderror" id="city_id" name="city_id" required>
                    <option selected disabled>Choose city</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                    @endforeach
                </select>
                @error('city_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="client_id">Governorate</label>
                <select class="form-control @error('governorate_id') is-invalid @enderror" id="governorate_id" name="governorate_id" required>
                    <option selected disabled>Choose governorate</option>
                    @foreach ($governorates as $governorate)
                        <option value="{{ $governorate->id }}" {{ old('governorate_id') == $governorate->id ? 'selected' : '' }}>{{ $governorate->name }}</option>
                    @endforeach
                </select>
                @error('client_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-front.master>
