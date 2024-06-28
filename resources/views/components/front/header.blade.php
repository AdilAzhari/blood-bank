<!-- upper-bar -->
<div class="upper-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="language">
                    <a href="create-account-ltr.html" class="en active">EN</a>
                    <a href="create-account.html" class="ar inactive">عربى</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="social">
                    <div class="icons">
                        <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
            @if (Auth::guard('client')->check())
                <div class="col-md-4">
                    <div class="info" dir="ltr">
                        <div class="phone">
                            <i class="fas fa-phone-alt"></i>
                            <p>{{ Auth::guard('client')->user()->phone }}</p>
                        </div>
                        <div class="e-mail">
                            <i class="far fa-envelope"></i>
                            <p>{{ Auth::guard('client')->user()->email }}</p>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Profile
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="{{ route('profile.show') }}">
                                    <i class="far fa-user"></i> My Profile
                                </a>
                                <a class="dropdown-item" href="{{ route('favorite.index') }}">
                                    <i class="far fa-heart"></i> Favorites
                                </a>
                                <a class="dropdown-item" href="{{ route('front.logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('front.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-4">
                    <div class="accounts">
                        <a href="{{ route('front.login') }}" class="signin">Sign in</a>
                        <a href="{{ route('front.register') }}" class="create-new">create new account</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Navigation -->
<div class="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('front/imgs/logo-ltr.png') }}" class="d-inline-block align-top" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">about us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('articles') }}">articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('donation-request') }}">donation requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('who-are-us') }}">who are us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact-us') }}">contact us</a>
                    </li>
                </ul>
                @if (Route::currentRouteName() == 'donation-request')
                    <a href="{{ route('donation-request.create') }}" class="donate">
                        <img src="{{ asset('front/imgs/transfusion.svg') }}">
                        <p>Ask donation</p>
                    </a>
                @endif
            </div>
        </div>
    </nav>
</div>
