<x-front.master bodyClass="reset-password">
    <div class="form">
        <div class="container">
            <x-breadcrumb :items="['Home', 'Reset Password']" :routes="['/', '']" />
            <x-alert />
            <div class="account-form">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}">

                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input type="password" class="form-control" id="password_confirmation"
                        placeholder="Confirm Password" name="password_confirmation">
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="create-btn">
                        <input type="submit" value="Reset Password">
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-front.master>
