<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('bootstrap-5.0.2-dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('cssfile/navbar.css')}}">

    <style>
        .no-scroll {
            overflow: hidden;
        }

    .loading-spinner {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999;
    }
    </style>
</head>
<body>
    <!-- Navbar -->
    <header class="header-container  text-capitalize">
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
            <a href="{{ url(app()->getLocale() . '/') }}">@lang('message.home')</a>
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
            <a href="{{ route('store.show', ['lang' => app()->getLocale()]) }}">@lang('message.brands')</a>

            <div class="search-container">
                <form id="searchForm" action="{{ route('storesearch') }}" method="GET" class="d-flex" role="search">
                    <input type="search" name="query" id="searchInput" placeholder="@lang('message.search')">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
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
            <a href="{{ url(app()->getLocale() . '/') }}">@lang('message.home')</a>

            <div class="mobile-categories">
                <a href="#" class="" data-bs-toggle="modal" data-bs-target="#categoriesModal">
                    @lang('message.category')
                </a>

                <!-- Modal -->
                <div class="modal fade" id="categoriesModal" tabindex="-1" aria-labelledby="categoriesModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-dark ">
                            <div class="modal-header">
                                <h5 class="modal-title text-white" id="categoriesModalLabel"> @lang('message.category')</h5>
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
            <a href="{{ route('store.show', ['lang' => app()->getLocale()]) }}">@lang('message.brands')</a>

            <div class="search-container">
                <form id="searchForm" action="{{ route('storesearch') }}" method="GET" class="d-flex" role="search">
                    <input type="search" name="query" id="searchInput" placeholder="@lang('message.search')">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
<!-- Loading Spinner -->
<div class="loading-spinner" id="loadingSpinner">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

    <button onclick="topFunction()" id="myBtn" title="Go to top">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script>
            // Hide loading spinner when content is loaded
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('loadingSpinner').style.display = 'none';
    });

        // Scroll to Top Button
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

        // Show/Hide Scroll to Top Button
        window.onscroll = function() {
            const myBtn = document.getElementById('myBtn');
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                myBtn.style.display = "block";
            } else {
                myBtn.style.display = "none";
            }
        };
    </script>
    <script>
        // Toggle Mobile Menu
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('active');
            document.body.classList.toggle('no-scroll');
        }

        // Toggle Mega Menu (Desktop)
        function toggleMegaMenu() {
            const megaMenu = document.getElementById('megaMenu');
            megaMenu.classList.toggle('active');
        }
    </script>
    <script>
        //fore auto complte search //
        $(document).ready(function() {
            $('#searchInput').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: '{{ route("search") }}',
                        dataType: 'json',
                        data: {
                            query: request.term
                        },
                        success: function(data) {
                            response(data.stores); // Ensure `data.stores` is an array of strings or objects
                        }
                    });
                },
                minLength: 1 // Minimum characters to trigger autocomplete
            });
        });
          </script>


</body>
</html>
