<x-front.master bodyClass="signin-account">

    <!--form-->
    <div class="form">
        <div class="container">
            <x-breadcrumb :items="['Home', 'Sign in']" :routes="['/', '']" />
            <x-alert />
        </div>
        <div class="signin-form">
            <form method="POST"
                action="{{ route('login') }}>
                    @csrf
                    <div class="logo">
                <img src="{{ asset('front/imgs/logo.png') }}">
        </div>
        <div class="form-group">
            <input type="number" class="form-control" id="exampleInputPhone" aria-describedby="phoneHelp"
                placeholder="Telephone number" name="phone">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder=" Password"
                name="password">
        </div>
        <div class="row options">
            <div class="col-md-6 remember">
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" value="">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>

            </div>
            <div class="col-md-6 forgot">
                <img src="{{ asset('front/imgs/complain.png') }}">
                <a href="#">Forgot password</a>
            </div>
        </div>
        <div class="row buttons">
            <div class="col-md-6 right">
                <a href="{{ route('login') }}">Sign in</a>
            </div>
            <div class="col-md-6 left">
                <a href="{{ route('register') }}">create new account</a>
            </div>
        </div>
        </form>
    </div>

</x-front.master>
