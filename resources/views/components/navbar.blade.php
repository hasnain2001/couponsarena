<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
    <title>Navbar Example</title>
    <style>
        nav {
            background-color: #0054a6;
            color: white;
        }
        nav a {
            color: white !important;
        }
        .logo {
            height: 40px;
        }
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 15px;
        }
        .search-language-container {
            display: flex;
            align-items: center;
        }
        .language-selector {
            margin-left: 10px;
        }
    </style>
</head>
<body>
<header>
    <div class="header-container">
        <!-- Logo on the left side -->
        <a class="navbar-brand" href="/"><img src="{{asset('images/logo.png') }}" alt="Logo" class="logo"></a>

        <!-- Search form and language selector on the right side -->
        <div class="search-language-container">
            <!-- Search Form -->
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search Voucher Codes" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

            <!-- Language Selector -->
            <div class="language-selector">
                <select class="form-select" aria-label="Language selector" id="languageSelector">
                    <option value="en" selected>EN</option>
                    <option value="es">ES</option>
                    <option value="fr">FR</option>
                    <option value="de">DE</option>
                    <option value="nl">NL</option>
                </select>



            </div>
        </div>
    </div>

    <!-- Use navbar-dark to ensure light text on a dark background -->
    <nav class="navbar navbar-expand-lg navbar-dark text-white">
        <div class="container-fluid">
            <!-- Toggler for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories') }}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<script>
    document.getElementById('languageSelector').addEventListener('change', function () {
        var selectedLang = this.value;
        var url = `/${selectedLang}`;
        window.location.href = url;
    });
</script>

<!-- Include Bootstrap JS -->
<script src="{{ asset('bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
