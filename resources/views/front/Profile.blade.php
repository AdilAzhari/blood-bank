<x-front.master>
    <div class="profile">
        <div class="container mt-5">
            <div class="profile-header text-center mb-4">
                <h2>{{ Auth::guard('client')->user()->name }}'s Profile</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h3>Edit Profile</h3>
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ Auth::guard('client')->user()->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ Auth::guard('client')->user()->email }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                id="phone" name="phone" value="{{ Auth::guard('client')->user()->phone }}">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h3>Favorite Articles</h3>
                    <div class="favorites row">
                        @foreach ($favorites as $favorite)
                            <div class="col-md-6 mb-4">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $favorite->title }}</h4>
                                        <p class="card-text">{{ Str::limit($favorite->content, 100) }}</p>
                                    </div>
                                    <div class="card-footer bg-transparent border-top-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="{{ route('article-details', $favorite) }}"
                                                class="btn btn-primary">Read more</a>
                                            <form method="POST" action="{{ route('favorite.toggle', $favorite) }}"
                                                class="ml-2">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-heart"></i> Unfavorite
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .profile-header {
            color: #343a40;
        }

        .favorites .card {
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.2s;
        }

        .favorites .card:hover {
            transform: scale(1.05);
        }

        .favorites .card .card-body {
            padding: 1.5rem;
        }

        .favorites .card .card-title {
            font-size: 1.25rem;
            font-weight: 700;
        }

        .favorites .card .card-text {
            font-size: 1rem;
            color: #6c757d;
        }

        .favorites .card .btn {
            font-size: 0.875rem;
            font-weight: 600;
        }

        .favorites .card .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .favorites .card .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .favorites .card .btn i {
            margin-right: 0.5rem;
        }
    </style>
</x-front.master>
