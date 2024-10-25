<?php
header("X-Robots-Tag:index, follow");
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CouponsArena @yield('title') | Latest Discount Codes of 2024</title>

        <link rel="shortcut icon" href="{{ asset('images/favicon.png')}}" type="image/x-icon">
        <meta http-equiv="refresh" content="70">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="canonical" href="https://couponsarena.com">

        <meta name="description" content="Explore exclusive discounts and offers on top brands. Save money on your online shopping with CouponsArena.">
        <meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing, promo codes, cashback, online shopping, special offers, vouchers, best prices, holiday sales, seasonal discounts, gift cards, price comparison, money-saving tips">

        <meta name="author" content="Uzair">
        <meta name="robots" content="index, follow">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
        <style>
            .carousel {
           margin-left: 2.5%;
           margin-top: 1%;
            width: 95%;
                z-index: 0;
            }

            .slider-image {
                width: 100%;
                height: 350px;
            }

            .carousel-item {
                transition: transform 0.5s ease-in-out;
            }

            .carousel-control-prev-icon,
            .carousel-control-next-icon {
                filter: invert(100%);
                width: 40px;
                height: 40px;
            }

            .carousel-inner {
                border-radius: 10px;
                box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3);
            }

            .custom-carousel-indicators button {
                background-color: #fff;
                border-radius: 50%;
                width: 12px;
                height: 12px;
                margin: 4px;
            }

            .custom-carousel-indicators .active {
                background-color: #ff6347; /* Change this color for an attractive look */
            }
            @media only screen and (max-width: 1200px) {
    .slider-image {
        height: 300px; /* Slightly smaller for medium-sized screens */
    }
}

@media only screen and (max-width: 768px) {
    .slider-image {
        height: 250px; /* Adjust for tablets */
    }
}

@media only screen and (max-width: 576px) {
    .slider-image {
        height: 200px; /* Adjust for smaller mobile devices */
    }
}
        </style>
    </head>
    <body>

        @include('components.navbar')
        
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators custom-carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/banner1.png') }}" class="d-block w-100 slider-image" alt="Slide 1" loading="lazy">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/couponsarenaslider.png') }}" class="d-block w-100 slider-image" alt="Slide 2" loading="lazy">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/Untitled-2 (1).png') }}" class="d-block w-100 slider-image" alt="Slide 3" loading="lazy">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/black friday sale.png') }}" class="d-block w-100 slider-image" alt="Slide 4"  loading="lazy">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev" loading="lazy">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
<br><br>







@yield('main-content')
        @include('components.footer')


    </body>
</html>
