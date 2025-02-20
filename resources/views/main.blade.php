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
    <!--<meta http-equiv="refresh" content="70">-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="{{ url()->current() }}">

    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">

    <meta name="author" content="Uzair">
    <meta name="robots" content="index, follow">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('cssfile/home.css')}}">
    <!-- Google tag (gtag.js) -->
    <meta name="verify-admitad" content="f0d873ca8d" />
    <meta name="63711d15cd5e7aa" content="31f76a5fad0bded704d8c077fe66a830" />
    <meta name="mylead-verification" content="f7ea0dd41c6c08d393d95a3019348565">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-L63MY7QC0K"></script>
    <meta name="linkbuxverifycode" content="32dc01246faccb7f5b3cad5016dd5033" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
  window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-L63MY7QC0K');
    </script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-20TPD768B2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-20TPD768B2');
</script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-B9GQCLK2K1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date()); gtag('config', 'G-B9GQCLK2K1');
</script>
<meta name="mylead-verification" content="f7ea0dd41c6c08d393d95a3019348565">

<style>
  img{
   object-fit: contain;
  }
</style>

    </head>
    <body>

        @include('components.navbar')
@yield('main-content')
        @include('components.footer')


    </body>
</html>
