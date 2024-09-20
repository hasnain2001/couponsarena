<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CouponsArena | Latest Discount Codes of 2024</title>

        <link rel="shortcut icon" href="{{ asset('images/favicon.png')}}" type="image/x-icon">
        <meta http-equiv="refresh" content="70">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
   <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">

        <!-- Styles -->
        <style>
.carousel {
    padding-left: 5%;
    width: 95%;
    position: relative;
}

.slider-image {
    width: 100%; /* Ensures the image takes the full width of its container */
    height: 400px; /* Default height for larger screens */
    object-fit: cover; /* Ensures images fit nicely within their container */
    border-radius: 10px; /* Rounded corners for modern look */
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Adds depth */
}

/* For tablet screens and smaller devices */
@media (max-width: 992px) {
    .slider-image {
        height: 300px;
    }
}

/* For mobile devices */
@media (max-width: 768px) {
    .slider-image {
        height: 250px; /* Reduce height on mobile devices */
    }
}

/* For very small mobile devices */
@media (max-width: 576px) {
    .slider-image {
        height: 200px; /* Further reduce height on very small screens */
    }
}

.custom-carousel-indicators [data-bs-target] {
    width: 15px;
    height: 15px;
    background-color: #ffffff; /* Default indicator color */
    border-radius: 40%; /* More rounded shape */
    border: 2px solid rgb(34, 29, 29); /* Darker border */
    transition: background-color 0.3s ease;
    margin: 0 5px; /* Spacing between indicators */
}

.custom-carousel-indicators .active {
    background-color: #ff4b2b; /* Highlight the active indicator */
    border-color: #ff4b2b; /* Match border to active color */
}

/* Optional: Adjust positioning */
.carousel-indicators {
    bottom: 20px; /* Adjust if you want the indicators higher/lower */
    z-index: 10;
}


.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: rgba(238, 224, 224, 0.5);
    padding: 20px;
    border-radius: 50%;
    transition: background-color 0.3s ease;
}

.carousel-control-prev-icon:hover,
.carousel-control-next-icon:hover {
    background-color: rgba(0, 0, 0, 0.7); /* Darken on hover */
}

.carousel-control-prev-icon::before,
.carousel-control-next-icon::before {
    font-size: 30px;
    color: white;
}

.carousel-control-prev,
.carousel-control-next {
    width: 5%; /* Keeps the buttons narrow */
}


        </style>

    </head>
    <body >
<x-navbar/>



<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators custom-carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('images/login.png') }}" class="d-block w-100 slider-image" alt="Slide 1">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/login1.png') }}" class="d-block w-100 slider-image" alt="Slide 2">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/38f2093dcd.png') }}" class="d-block w-100 slider-image" alt="Slide 3">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

@yield('main-content')


<script src="{{ asset('bootstrap-5.0.2-dist/js/bootstrap.min.js') }}"></script>
    </body>
</html>
