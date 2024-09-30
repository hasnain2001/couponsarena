<?php
header("X-Robots-Tag:index, follow");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Categories  - Best Deals and Discounts |CouponsArena</title>
     <meta name="description" content="Find the best deals, discounts, and coupons on CouponsArena. Save money on your favorite products from top brands.">

 <meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing">

  <meta name="author" content="John Doe">
 <meta name="robots" content="index, follow">

<link rel="canonical" href="https://CouponsArena.com/categories">
<!-- Fonts -->

     <link rel="shortcut icon" href="{{ asset('images/favicon.png')}}" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->

                <link rel="stylesheet" href="{{asset('cssfile/categories.css')}}">

</style>


</head>
<body class="body">
@include('components.navbar')


     <div class="main_content">
        <div class="container">
            <nav aria-label="breadcrumb" style="background-color: #f8f9fa; border-radius: 0.25rem; padding: 10px;">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="/" class="text-decoration-none text-primary" style="font-weight: 500;">Home</a>
                    </li>
   <li class="breadcrumb-item active" aria-current="page" style="font-weight: 600; color: #6c757d;">categories</li>
                </ol>
            </nav>
          <div class="row mt-3">
            <h1 class="text-center display-4 mb-4">Our Categories</h1>

            <!-- Categories grid -->
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-6 g-4">
              @foreach ($categories as $category)
              <div class="col">
                <div class="card shadow-sm h-100 overflow-hidden border-0">
                  <!-- Category link -->
                  @php

                  $storeurl = $category->slug
                  ? route('related_category', ['slug' => Str::slug($category->slug)])
                  : '#';
                  @endphp
                  <a href="{{ $storeurl }}" class="text-decoration-none">
                    @if ($category->category_image)
                    <img src="{{ asset('uploads/categories/' . $category->category_image) }}" class="card-img-top" alt="{{ $category->title }} Image">
                    @else
                    <div class="d-flex align-items-center justify-content-center bg-light text-muted" style="height: 200px;">
                      <i class="fas fa-image fa-3x"></i>
                      <p class="ms-2">No image available</p>
                    </div>
                    @endif
                  </a>

                  <!-- Card body -->
                  <div class="card-body">
                    <a href="{{ $storeurl}}" class="btn text-primary">
                      <h5 class="text-dark text-left">{{ $category->title }}</h5>
                    </a>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>


<x-footer/>

</body>
</html>
