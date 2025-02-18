<?php
header("X-Robots-Tag:index, follow");
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Your custom meta tags go here -->
   <title>{!! $blog->meta_title !!}</title>
    <link rel="canonical" href="{{ url()->current() }}">
        <meta name="description" content="{!! $blog->meta_description !!}">

 <meta name="keywords" content="{!! $blog->meta_keyword !!}">
 <meta http-equiv="Content-Type" content="">
 <meta name="robots" content="index, follow">
 <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
 <!----Custom Css ------>
 <link rel="stylesheet" href="{{ asset('cssfile/blog-detail.css') }}">
 <style>
  .blog-title {
    font-size: 30px;
    font-weight: 400;
    color: #333;
    margin-bottom: 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;  
  }
  /* Ensure the image fits perfectly inside the circular div */
.store-image {
    width: 100%; /* Make the image fill the width of the container */
    height: 100%; /* Make the image fill the height of the container */
   object-fit: contain; /* Ensures the image covers the area without distortion */
    border-radius: 70%; /* Makes the image circular */
}

/* Optional: Add some responsive adjustments for smaller screens */
@media (max-width: 768px) {
    .rounded-circle {
        width: 120px; /* Reduce size for tablets */
        height: 120px;
    }
}

@media (max-width: 480px) {
    .rounded-circle {
        width: 100px; /* Further reduce size for mobile devices */
        height: 100px;
    }
}
 </style>
 </head>
<body class="body">
@include('components.navbar')
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
          <h1 class=" blog-title">{{ $blog->title }}</h1>
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
                            $language = $store->language->code; // Fixed variable name from $store to $relatedStore
                            $storeSlug = Str::slug($store->slug); // Fixed variable name from $store to $relatedStore

                            // Conditionally generate the URL based on the language
                            $storeurl = $store->slug
                                ? ($language === 'en'
                                    ? route('store_details', ['slug' => $storeSlug])  // English route without 'lang'
                                    : route('store_details.withLang', ['lang' => $language, 'slug' => $storeSlug]))  // Other languages
                                : '#';
                        @endphp
            <div class="col-md-6 col-sm-4 col-6">
                            <a href="{{ $storeurl }}" >
<div class=" shadow d-flex justify-content-center align-items-center overflow-hidden" style="width: 150px; height: 150px;">
    <!-- Store Image -->
    <img src="{{ asset('uploads/stores/' . $store->store_image) }}" alt="{{ $store->name }}" class="img-fluid store-image">
</div>

<!-- Store Name -->
                <p class="text-capitalize text-dark">{{ $store->name }}</p>
                      </a>
         
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

@include('components.footer')



</body>
</html>
