
<?php
header("X-Robots-Tag:index, follow");
?>
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<title>Blog- Best Deals and Discounts |CouponsArena</title>
<meta name="description" content="Find the best deals, discounts, and coupons on CouponsArena. Save money on your favorite products from top brands.">

<meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing">

<meta name="author" content="John Doe">
<meta name="robots" content="index, follow">

<link rel="canonical" href="https://CouponsArena.com/blog">

<link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
<!-- Styles -->
<link rel="stylesheet" href="{{asset('cssfile/styles.css')}}">
        <link rel="stylesheet" href="{{asset('cssfile/blog.css')}}">

<link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

<style>
.sidebar{background-color:#f8f9fa}.frugal-heaven-text{color:#676a6df5}.list-group-item{border:none;padding:15px 10px;transition:background-color .3s}.list-group-item:hover{background-color:#e9ecef}.btn-dark{background-color:#343a40;border:none}.btn-dark:hover{background-color:#495057}.rounded-circle{border:1px solid #343a40}
.frugal-heaven-text-name{color:#495057 }
</style>

</head>
<body>
<x-navbar/>
<br>


<div class="container">
    
    <nav aria-label="breadcrumb" style="background-color: #f8f9fa; border-radius: 0.25rem; padding: 10px;">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a href="/" class="text-decoration-none text-primary" style="font-weight: 500;">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page" style="font-weight: 600; color: #6c757d;">Blog</li>
        </ol>
    </nav>

<div class="row">
<div class="col-md-8">
<div class="row blog-posts">
    @foreach ($blogs as $blog)
    @php
    $blogurl = $blog->slug
    ? route('blog-details', ['slug' => Str::slug($blog->slug)])
    : '#';
    @endphp
    <div class="col-md-12 blog-post">

        <div class="blog-image-wrapper">
<a href="{{ $blogurl }}">
        <img src="{{ asset($blog->category_image) }}" alt="Blog Post Image">
    </a>
        </div>
        <div class="post-content">
        <h2>{{ $blog->title }}</h2>

            <a href="{{$blogurl }}" class="btn btn-dark btn-black rounded-pill text-white">Read More</a>

        </div>

    </div>
    @endforeach
</div>
</div>


<div class="col-md-4 sidebar p-3 frugal-heaven-sidebar bg-light rounded shadow-sm">

<h3 class="frugal-heaven-text text-center mb-4">Latest Stores</h3>

<ul class="list-group list-group-flush">
    @foreach ($chunks as $store)
    @php
        // Ensure 'lang' parameter is set properly (fallback to 'en' if needed)
        $language = app()->getLocale() ?? 'en';
    
        // Generate store URL or fallback to '#' if store slug is missing
        $storeurl = $store->slug 
            ? route('store_details', ['lang' => $language, 'slug' => $store->slug]) 
            : '#';
    @endphp
    
    <a href="{{ $storeurl }}" class="btn btn-dark btn-sm">
        <li class="list-group-item d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img src="{{ asset('uploads/stores/' . $store->store_image) }}" alt="{{ $store->name }}" class="rounded-circle" style="width: 60px; height: 60px;">
                <div class="store-info ml-3">
                    <span class="fw-bold frugal-heaven-text-name">{{ $store->name }}</span>
                </div>
            </div>
            Visit Store
        </li>
    </a>
    @endforeach
    

</ul>

</div>



</div>

</div>

</div>

<br><br>
<div class="container">
{{ $blogs->links('vendor.pagination.bootstrap-5') }}
</div>

<x-footer/>

<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
