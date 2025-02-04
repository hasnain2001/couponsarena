<nav class="navbar navbar-expand-lg navbar-light bg-dark text-white border-bottom">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" 
        href="/">
         <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
     </a>
   
     
     

        <!-- Hamburger Menu -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto ">
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="  @if (Auth::check() && Auth::user()->role === 'admin')
                {{ route('admin.dashboard') }}
            @elseif (Auth::check() && Auth::user()->role === 'employee')
                {{ route('employee.dashboard') }}
            @else
                {{ route('dashboard') }}
            @endif">
                       Dashboard
                    </a>
                </li>
            </ul>

            <!-- User Dropdown -->
            <ul class="navbar-nav ms-auto ">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">{{ __('Log Out') }}</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
