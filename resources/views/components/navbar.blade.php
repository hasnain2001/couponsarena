<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/css/flag-icon.min.css">

    <title>Navbar Example</title>
    <style>
        .navbar {
            flex-grow: 1;
            color: white;
            height: auto;

        }
        nav a {
            color: white !important;
        }
        .logo {
            width: 100%;
            height: 100px;
            padding-left: 0%;
        }
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 15px;
        }
        .form-control{
            width:350px;
        }
        .searchbtn {
            background-color: #10355a;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .searchbtn:hover {
            background-color: #003d7a;
            transform: scale(1.05);
        }
        .search-language-container {
            display: flex;
            align-items: center;
        }
        .language-selector {
            margin-left: 10px;
            width: 80px;
        }

        #myBtn, .loader {
            position: fixed;
        }
        ::-webkit-scrollbar {
            width: 20px;
        }
        .loader {
            width: 120px;
            height: 20px;
            background: linear-gradient(#0054a6 0 0) 0/0 no-repeat #ddd;
            animation: 2s linear infinite l1;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
        }

        /* Mega menu styling */
        .mega-dropdown {
            position: static !important;
        }
        .mega-menu {
            width: 100%;
            left: 0;
            right: 0;
        }
        .logo-container {
            background-color: white;
            padding-left: 0;
            padding-top: 15px;
        }
        .header-container {
            padding-left: 0;
            height: 110px;
            background-color: #003d7a;
        }

        /* Media Queries for Mobile */
        @media (max-width: 768px) {
            .mb-logo {
                max-width: 150px;
                height: 100px;
                padding-right: 20%;
            }
            .header-container {
                padding: 10px;
                flex-direction: column;
                height: auto;
            }
            .navbar {
                flex-grow: 0;
                padding: 0;
                padding-left: 0;
            }
            .search-language-container {
                flex-direction: column;
                width: 100%;
                align-items: stretch;
            }
            .searchbtn {
                width: 20%;
                margin-top: 10px;
            }
            .language-selector {
                margin-left: 0;
                margin-top: 10px;
                width: 90%;
            }
            .logo {
                height: auto;
                max-height: 80px;
            }
            .form-control{
                width:90%;
            }
        }
        #myBtn,
.loader {
    position: fixed;
}

::-webkit-scrollbar {
    width: 20px;
}
::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px rgb(97, 82, 82);
    border-radius: 10px;
}
::-webkit-scrollbar-thumb {
    background: #003d7a;
    border-radius: 5px;
}
::-webkit-scrollbar-thumb:hover {
    background: #372cd3;
}
.loader {
    width: 120px;
    height: 20px;
    background: linear-gradient(#6d12aa 0 0) 0/0 no-repeat #ddd;
    animation: 2s linear infinite l1;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 9999;
}
@keyframes l1 {
    100% {
        background-size: 100%;
    }
}
#myBtn {
    display: none;
    bottom: 20px;
    right: 30px;
    z-index: 99;
    border: none;
    outline: 0;
    background-color: #003d7a;
    color: #fff;
    cursor: pointer;
    padding: 15px;
    border-radius: 10px;
    font-size: 18px;
}
#myBtn:hover {
    background-color: #555;
}
#languageSelector option[data-icon="flag-icon flag-icon-gb"] {
    background-image: url('https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/flags/4x3/gb.svg');
}
#languageSelector option[data-icon="flag-icon flag-icon-es"] {
    background-image: url('https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/flags/4x3/es.svg');
}
#languageSelector option[data-icon="flag-icon flag-icon-fr"] {
    background-image: url('https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/flags/4x3/fr.svg');
}
#languageSelector option[data-icon="flag-icon flag-icon-de"] {
    background-image: url('https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/flags/4x3/de.svg');
}
#languageSelector option[data-icon="flag-icon flag-icon-nl"] {
    background-image: url('https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/flags/4x3/nl.svg');
}

    </style>
</head>
<body>
    <header class="header-container">
        <!-- Logo section with white background -->
        <div class="logo-container d-sm-block d-none">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/AOlSOt.png') }}" alt="Logo" class="logo">
            </a>
        </div>

        <!-- Navbar section -->
        <nav class="navbar navbar-expand-lg navbar-dark text-white">
            <div class="container-fluid">
                <a class="navbar-brand d-block d-sm-none mb-logo" href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item dropdown mega-dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                            <div class="dropdown-menu mega-menu p-3" aria-labelledby="navbarDropdown">
                                <div class="row">
                                    @foreach ($categories as $category)
                                    <div class="col-md-3">
                                        <a href="{{ route('related_category', ['slug' => Str::slug($category->slug)]) }}" class="dropdown-item text-dark">{{ $category->title }}</a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('blog') }}">News</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Search form and language selector on the right -->
            <div class="search-language-container">
                <form action="{{ route('search') }}" method="GET" class="d-flex" role="search">
                    <input class="form-control me-2" type="search" name="query" placeholder="Search Voucher Codes" aria-label="Search" >
                    <button class="searchbtn" type="submit"><i class="fas fa-search"></i></button>
                </form>
                <div class="language-selector">
                    <select class="form-select" aria-label="Language selector" id="languageSelector">
                        <option value="en" data-icon="flag-icon flag-icon-gb" selected>EN</option>
                        <option value="es" data-icon="flag-icon flag-icon-es" selected>ES</option>
                        <option value="fr" data-icon="flag-icon flag-icon-fr" selected>FR</option>
                        <option value="de" data-icon="flag-icon flag-icon-de" selected>DE</option>
                        <option value="nl" data-icon="flag-icon flag-icon-nl" selected>NL</option>
                    </select>
                </div>
                
            </div>
        </nav>
    </header>

<button onclick="topFunction()" id="myBtn" title="Go to top">
        <i class="fas fa-chevron-up"></i>
    </button>

<script>
document.getElementById('languageSelector').addEventListener('change', function () {
    var selectedLang = this.value;
    var url = `/${selectedLang}`;
    
    // Check if the selected language is "EN" to redirect to the homepage
    if (selectedLang === 'en') {
        url = '/';  // Redirect to the homepage for English
    }

    window.location.href = url;
});

    // Scroll-to-top button logic
    let mybutton = document.getElementById("myBtn");
    window.onscroll = function() {scrollFunction()};
    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>

</body>
</html>
