<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/css/flag-icon.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .header-container {
            background-color: #000;
            padding: 0px 0px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 1050;
        }
        .logo-container img {
            height: 120px;
        }
        .navbar-toggler {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: white;
            transition: transform 0.3s ease-in-out;
        }
        .navbar-toggler.active {
            transform: rotate(90deg);
        }
        .navbar-menu {
            position: fixed;
            top: 0;
            right: -100%;
            width: 100%;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.9);
            transition: right 0.5s ease-in-out;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 2000;
            opacity: 0;
        }
        .navbar-menu.active {
            right: 0;
            opacity: 1;
        }
        .navbar-nav {
            list-style: none;
            padding: 0;
            text-align: center;
            width: 100%;
        }
        .navbar-nav .nav-link {
            color: white;
            padding: 15px;
            text-decoration: none;
            display: block;
            font-size: 18px;
            transition: color 0.3s ease-in-out;
        }
        .navbar-nav .nav-link:hover {
            color: #f39c12;
        }
        .close-menu {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 30px;
            cursor: pointer;
            color: white;
            transition: transform 0.3s;
        }
        .close-menu:hover {
            transform: rotate(90deg);
        }
        .search-container {
            margin-left: auto;
            margin-right: 20px;
        }
        .search-container input {
            height: 35px;
            border-radius: 5px;
        }
        .social-icons {
            display: flex;
            gap: 15px;
        }
        .social-icons a {
            color: white;
            font-size: 18px;
            transition: color 0.3s;
            padding-right: 5px;
        }
        .social-icons a:hover {
            color: #f39c12;
        }
        .language-dropdown {
            position: relative;
            display: inline-block;
        }
        .language-dropdown .dropdown-menu {
            display: none;
            position: absolute;
            background-color: white;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.2);
            min-width: 100px;
            border-radius: 5px;
            overflow: hidden;
        }
        .language-dropdown:hover .dropdown-menu {
            display: block;
        }
        .language-dropdown .dropdown-item {
            padding: 10px;
            text-align: left;
            color: black;
            display: block;
            text-decoration: none;
        }
        .language-dropdown .dropdown-item:hover {
            background-color: #110f0b;
            color: white;
        }
        .modal-body {
    max-height: 400px; /* Adjust height as needed */
    overflow-y: auto; /* Enables scrolling */
}

        @media (max-width: 992px) {
    .header-container {
        flex-wrap: wrap;
        padding: 10px;
        text-align: center;
    }

    .logo-container {
        flex: 1 1 100%;
        text-align: center;
    }

    .logo-container img {
        height: 80px;
    }

    .search-container {
        flex: 1 1 100%;
        display: flex;
        justify-content: center;
        margin: 10px 0;
    }

    .search-container input {
        width: 80%;
        max-width: 250px;
    }

    .social-icons {
        flex: 1 1 100%;
        justify-content: center;
        margin-top: 10px;
    }

    .language-dropdown {
        margin-top: 10px;
        text-align: center;
    }

    .navbar-toggler {
        position: absolute;
        top: 15px;
        right: 15px;
    }
}

    </style>
</head>
<body>
    <header class="header-container">
        <div class="logo-container">
            <a href="/">
                <img src="{{ asset('images/logodesktop.png') }}" alt="Logo">
            </a>
        </div>

        <div class="search-container">
            <form action="{{ route('storesearch') }}" method="GET" class="d-flex">
                <input class="form-control me-2" type="search" name="query" placeholder="@lang('message.search')" aria-label="Search">
                <button class="btn btn-outline-dark" type="submit"><i class="fas fa-search text-white"></i></button>
            </form>
        </div>

        <div class="social-icons">
            <a href="https://web.facebook.com/people/Coupons-Arena/61571970471132/" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/coupons.arena/#" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://x.com/couponsarena" target="_blank"><i class="fab fa-x-twitter"></i></a>
        </div>

        <div class="language-dropdown">
            <button class="btn btn-outline-light dropdown-toggle"> {{ strtoupper(app()->getLocale()) }} </button>
            <div class="dropdown-menu">
                @foreach ($langs as $lang)
  
                    <a href="{{ url('/' . $lang->code) }}" class="dropdown-item ">
                        {{ strtoupper($lang->code) }}
                    </a>

            @endforeach
            </div>
        </div>

        <button class="navbar-toggler" onclick="toggleMenu()">
            <i class="fas fa-bars"></i>
        </button>
    </header>

    <nav class="navbar-menu" id="navbarMenu">
        <span class="close-menu" onclick="toggleMenu()">&times;</span>
        <ul class="navbar-nav">
            <li><a class="nav-link" href="{{ url(app()->getLocale() . '/') }}">@lang('message.home')</a></li>
            <li><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#categoryModal">@lang('message.category')</a></li>
            <li><a class="nav-link" href="{{ url(app()->getLocale() . '/contact') }}">@lang('message.contact')</a></li>
            <li><a class="nav-link" href="{{ url(app()->getLocale() . '/blog') }}">@lang('message.news')</a></li>
            <li><a class="nav-link" href="{{ route('coupons') }}">Coupons</a></li>
        </ul>
        <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@lang('message.category')</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
                        @foreach ($categories as $category)
<a href="{{ route('related_category', ['slug' => Str::slug($category->slug)]) }}" class="dropdown-item">{{ $category->title }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
    </nav>



    <script>
        function toggleMenu() {
            const menu = document.getElementById('navbarMenu');
            menu.classList.toggle('active');
        }
    </script>

    <script src="{{ asset('bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
