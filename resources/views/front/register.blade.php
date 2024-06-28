<x-front.master bodyClass="create">
    <div class="form">
        <div class="container">
            <x-breadcrumb :items="['Home', 'Sign in']" :routes="['/', '']" />
            {{-- <x-alert/> --}}
            <div class="account-form">
                <form method="POST" action="{{ route('front.register.store') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="nameHelp" placeholder="Name"
                            name="name" value="{{ old('name') }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp"
                            placeholder="E-mail" name="email" value="{{ old('email') }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input placeholder="Birth date" class="form-control @error('d_o_b') is-invalid @enderror" type="date" onfocus="(this.type='date')"
                            id="d_o_b" value="{{ old('d_o_b') }}" name="d_o_b">
                        @error('d_o_b')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <select class="form-control @error('blood_type_id') is-invalid @enderror" name="blood_type_id">
                            <option selected disabled>Blood Type</option>
                            @foreach ($bloodTypes as $bloodType)
                                <option value="{{ $bloodType->id }}"
                                    {{ old('blood_type_id') == $bloodType->id ? 'selected' : '' }}>{{ $bloodType->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('blood_type_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <select class="form-control @error('governorate_id') is-invalid @enderror" name="governorate_id">
                            <option selected disabled>Governorate</option>
                            @foreach ($governorates as $governorate)
                                <option value="{{ $governorate->id }}"
                                    {{ old('governorate_id') == $governorate->id ? 'selected' : '' }}>
                                    {{ $governorate->name ?? 'N/A' }}</option>
                            @endforeach
                        </select>
                        @error('governorate_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <select class="form-control @error('city_id') is-invalid @enderror" name="city_id">
                            <option selected disabled>City</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                    {{ $city->name ?? 'N/A' }}</option>
                            @endforeach
                        </select>
                        @error('city_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="telephone" aria-describedby="telephoneHelp"
                            placeholder="Telephone number" name="phone" value="{{ old('phone') }}">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input placeholder="Last date for donation" class="form-control @error('last_donation_date') is-invalid @enderror" type="date"
                            onfocus="(this.type='date')" id="last_donation_date" name="last_donation_date"
                            value="{{ old('last_donation_date') }}">
                        @error('last_donation_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation"
                            placeholder="Confirm Password" name="password_confirmation">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="create-btn">
                        <input type="submit" value="Create">
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-front.master>
