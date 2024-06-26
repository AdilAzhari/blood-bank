<x-front.master bodyClass="forgot-password">
    <div class="form">
        <div class="container">
            <x-breadcrumb :items="['Home', 'Forgot Password']" :routes="['/', '']" />
            <x-alert />
            <div class="account-form">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                        placeholder="E-mail" name="email" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="create-btn">
                        <input type="submit" value="Send Password Reset Link">
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-front.master>
