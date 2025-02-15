<?php
header("X-Robots-Tag:index, follow");
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Your custom meta tags go here -->
   <title>{!! $blog->meta_title !!}</title>
    <link rel="canonical" href="https://CouponsArena.com/blog-details/{{ Str::slug($blog->title) }}">
        <meta name="description" content="{!! $blog->meta_description !!}">

 <meta name="keywords" content="{!! $blog->meta_keyword !!}">
 <meta http-equiv="Content-Type" content="">
 <meta name="robots" content="index, follow">

 <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
 <!----Custom Css ------>
 <link rel="stylesheet" href="{{ asset('cssfile/blog-detail.css') }}">

 </head>
<body class="body">
<x-navbar/>
<br>
<!-- Blog posts -->
<br>
<div class="container">
    <nav aria-label="breadcrumb" style="background-color: #f8f9fa; border-radius: 0.25rem; padding: 10px;">
        <ol class="breadcrumb mb-0">
<li class="breadcrumb-item">
<a href="/" class="text-decoration-none text-primary" style="font-weight: 500;">Home</a>
</li>
<li class="breadcrumb-item">
  <a href="{{ url(app()->getLocale() . '/blog') }}" class="text-decoration-none text-primary" style="font-weight: 500;">blog</a>
  </li>
            <li class="breadcrumb-item active" aria-current="page" style="font-weight: 600; color: #6c757d;">{{ $blog->title }}</li>
        </ol>
    </nav>

  <div class="row">
    <!-- Blog Post Column -->
 <div class="col-md-8">
      <div class="blog-post card shadow rounded-lg border border-light mb-4">
 <img class="" src="{{ asset($blog->category_image) }}" alt="Blog Image" style="max-width:700px; height:400px;">
        <div class="card-body">
          <h1 class="card-title text-3xl font-semibold text-gray-800 mb-4">{{ $blog->title }}</h1>
          <p class="card-text text-gray-700 text-lg leading-relaxed">{!! $blog->content !!}</p>

        </div>
      </div>
    </div>

    <!-- Sidebar Column -->
    <div class="col-md-4">
      <aside class="sidebar p-3 bg-light">
        <!-- Sidebar Title -->
        <h2 class="bold text-dark mb-3">Latest Stores</h2>
        <!-- Store Listings -->
        <div class="row gx-2 gy-2">
          @foreach ($chunks as $store)
          @php
          // Ensure 'lang' parameter is set properly (fallback to 'en' if needed)
          $language = app()->getLocale() ?? 'en';
      
          // Generate store URL or fallback to '#' if store slug is missing
          $storeurl = $store->slug 
              ? route('store_details', ['lang' => $language, 'slug' => $store->slug]) 
              : '#';
      @endphp
            <div class="col-md-6 col-sm-4 col-6">
                 <!-- Store Image -->
                <img src="{{ asset('uploads/stores/' . $store->store_image) }}" alt="{{ $store->name }}" class="mb-2 rounded-circle shadow" style="width: 100px; height: 100px; object-fit: cover;">
                <!-- Store Name -->
                <p class="text-capitalize text-dark">{{ $store->name }}</p>
         
            <a href="{{ $storeurl }}" class="btn btn-dark btn-sm">
                    Visit Store
                </a>
       

            </div>
          @endforeach
        </div>
      </aside>
    </div>
  </div>
</div>



<x-footer/>

</body>
</html>
