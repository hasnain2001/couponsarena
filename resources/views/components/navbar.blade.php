<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('bootstrap-5.0.2-dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('cssfile/navbar.css')}}">
    <title>Custom Navbar</title>

</head>
<body>
    <!-- Navbar -->
    <header class="header-container">
        <div class="navbar-brand d-sm-block d-none">
            <a href="/">
                <img src="{{ asset('images/logodesktop.png') }}" alt="Logo" class="logo">
            </a>
        </div>
   <nav class="navbar">
         <!-- Logo -->
         <div class="navbar-brand d-block d-sm-none ">
            <a href="/">
                <img src="{{ asset('images/mb-logo.png') }}" alt="Logo" class="logo">
            </a>
        </div>

        <!-- Desktop Menu -->
        <div class="navbar-menu">
            <a href="{{ url(app()->getLocale() . '/') }}">Home</a>
            <li class="mega-dropdown d-none d-sm-block">
                <a href="#" class="dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">@lang('message.category')</a>
                <div class="dropdown-menu mega-menu" aria-labelledby="navbarDropdown">
                    <div class="row">
                        @foreach ($categories as $category)
                            <div class="col-md-3">
                                <a href="{{ route('related_category', ['slug' => Str::slug($category->slug)]) }}">{{ $category->title }}</a>
                            </div>
                            @if ($loop->iteration % 4 == 0)
                                </div><div class="row">
                            @endif
                        @endforeach
                    </div>
                </div>
            </li>
            <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}">@lang('message.contact')</a>
            <a href="{{ route('blog', ['lang' => app()->getLocale()]) }}">@lang('message.news')</a>
            <a href="{{ route('store.show', ['lang' => app()->getLocale()]) }}">Brands</a>

            <form action="{{ route('storesearch') }}" method="GET" class="d-flex" role="search">
                <input class="form-control me-2" type="search" name="query" placeholder="@lang('message.search')" aria-label="Search">
                <button class="searchbtn" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>

        <!-- Social Icons -->
        <div class="social-icons">
            <a href="https://web.facebook.com/people/Coupons-Arena/61571970471132/" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/coupons.arena/#" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>

        <!-- Language Selector -->
        <div class="language-selector">
            <a href="#">{{ strtoupper(app()->getLocale()) }}</a>
            <ul>
                @foreach ($langs as $lang)
                <li><a href="{{ url('/' . $lang->code) }}">  {{ strtoupper($lang->code) }}</a></li>
@endforeach
            </ul>
        </div>

        <!-- Toggler for Mobile -->
        <button class="navbar-toggler" onclick="toggleMobileMenu()">
            &#9776;
        </button>
   </nav>
    </header>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <span class="close-btn" onclick="toggleMobileMenu()">&times;</span>
        <div class="social-icons">
            <a href="https://web.facebook.com/people/Coupons-Arena/61571970471132/" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/coupons.arena/#" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
        <div class="menu-links">
            <a href="{{ url(app()->getLocale() . '/') }}">Home</a>

            <div class="mobile-categories">
                <a href="#" class="" data-bs-toggle="modal" data-bs-target="#categoriesModal">
                    Categories
                </a>

                <!-- Modal -->
                <div class="modal fade" id="categoriesModal" tabindex="-1" aria-labelledby="categoriesModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-dark ">
                            <div class="modal-header">
                                <h5 class="modal-title text-white" id="categoriesModalLabel">Categories</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-dark" style="max-height: 400px; overflow-y: auto;">
                                @foreach ($categories as $category)
                                    <a href="{{ route('related_category', ['slug' => Str::slug($category->slug)]) }}" class="text-dark-">{{ $category->title }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}">@lang('message.contact')</a>
            <a href="{{ route('blog', ['lang' => app()->getLocale()]) }}">@lang('message.news')</a>
            <a href="{{ route('store.show', ['lang' => app()->getLocale()]) }}">Brands</a>

            <form action="{{ route('storesearch') }}" method="GET" class="d-flex" role="search">
                <input class="form-control me-2" type="search" name="query" placeholder="@lang('message.search')" aria-label="Search">
                <button class="searchbtn" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>

    <script>
        // Toggle Mobile Menu
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('active');
        }

        // Toggle Mega Menu (Desktop)
        function toggleMegaMenu() {
            const megaMenu = document.getElementById('megaMenu');
            megaMenu.classList.toggle('active');
        }
    </script>
</body>
</html>
