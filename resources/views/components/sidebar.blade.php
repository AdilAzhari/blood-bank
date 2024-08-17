<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('front/assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('front/assets/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                @auth
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    <div class="d-block">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                @endauth

            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Dashboard Link -->
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <!-- Posts Link -->
                @can('viewAny', App\Models\Post::class)
                    <li class="nav-item">
                        <a href="{{ route('posts.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Posts
                            </p>
                        </a>
                    </li>
                @endcan
                <!-- Blood Types Link -->
                @can('viewAny', App\Models\BloodType::class)
                    <li class="nav-item">
                        <a href="{{ route('blood_types.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-tint"></i>
                            <p>
                                Blood Types
                            </p>
                        </a>
                    </li>
                @endcan
                <!-- Clients Link -->
                @can('viewAny', App\Models\Client::class)
                    <li class="nav-item">
                        <a href="{{ route('clients.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Clients
                            </p>
                        </a>
                    </li>
                @endcan
                <!-- Cities Link -->
                @can('viewAny', App\Models\City::class)
                    <li class="nav-item">
                        <a href="{{ route('cities.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-city"></i>
                            <p>
                                Cities
                            </p>
                        </a>
                    </li>
                @endcan

                <!-- Categories Link -->
                @can('viewAny', App\Models\Category::class)
                    <li class="nav-item">
                        <a href="{{ route('categories.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Categories
                            </p>
                        </a>
                    </li>
                @endcan
                <!-- Governorates Link -->
                @can('viewAny', App\Models\Governorate::class)
                    <li class="nav-item">
                        <a href="{{ route('governorates.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-map"></i>
                            <p>
                                Governorates
                            </p>
                        </a>
                    </li>
                @endcan
                <!-- Donations Link -->
                @can('viewAny', App\Models\DonationRequest::class)
                    <li class="nav-item">
                        <a href="{{ route('donations.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-hand-holding-heart"></i>
                            <p>
                                Donations
                            </p>
                        </a>
                    </li>
                @endcan
                <!-- Contacts Link -->
                @can('viewAny', App\Models\Contact::class)
                    <li class="nav-item">
                        <a href="{{ route('contacts.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-address-book"></i>
                            <p>
                                Contacts
                            </p>
                        </a>
                    </li>
                @endcan
                <!-- Roles Link -->
                @can('viewAny', Spatie\Permission\Models\Role::class)
                    <li class="nav-item">
                        <a href="{{ route('roles.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-shield"></i>
                            <p>
                                Roles
                            </p>
                        </a>
                    </li>
                @endcan
                <!-- Permissions Link -->
                @can('viewAny', Spatie\Permission\Models\Permission::class)
                    <li class="nav-item">
                        <a href="{{ route('permissions.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-lock"></i>
                            <p>
                                Permissions
                            </p>
                        </a>
                    </li>
                @endcan
                <!-- Users Link -->
                @can('viewAny', App\Models\User::class)
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Users
                            </p>
                        </a>
                    </li>
                @endcan
                <!-- Settings Link -->
                @can('viewAny', App\Models\Setting::class)
                    <li class="nav-item">
                        <a href="{{ route('settings.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Settings
                            </p>
                        </a>
                    </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
