<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm border-bottom px-3 admin-navbar">
    <a class="navbar-brand fw-bold text-primary" href="{{ route('admin.dashboard') }}">
        <i class="fas fa-ticket-alt me-2"></i><x-application-logo class="admin-logo "/>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="adminNavbar">
        <ul class="navbar-nav ms-auto">
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-bold" href="#" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle text-success me-2"></i>
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="fas fa-user me-2"></i> My Profile
                            </a>
                        </li>

                        @if(Auth::user()->is_admin)
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.settings') }}">
                                <i class="fas fa-cog me-2"></i> Admin Settings
                            </a>
                        </li>
                        @endif

                        <li><hr class="dropdown-divider"></li>

                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <a class="dropdown-item text-danger logout-link" href="#">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                            </a>
                        </li>
                    </ul>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-primary px-3" href="{{ route('login') }}">
                        <i class="fas fa-sign-in-alt me-2"></i> Login
                    </a>
                </li>
                @if(Route::has('register'))
                <li class="nav-item ms-2">
                    <a class="nav-link btn btn-primary px-3" href="{{ route('register') }}">
                        <i class="fas fa-user-plus me-2"></i> Register
                    </a>
                </li>
                @endif
            @endauth
        </ul>
    </div>
</nav>
