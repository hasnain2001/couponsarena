
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

<title>Blog- Best Deals and Discounts |BudgetHeaven</title>
<meta name="description" content="Find the best deals, discounts, and coupons on BudgetHeaven. Save money on your favorite products from top brands.">

<meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing">

<meta name="author" content="John Doe">
<meta name="robots" content="index, follow">

<link rel="canonical" href="https://budgetheaven.com/blog">

<link rel="icon" href="{{ asset('images/icons.png') }}" type="image/x-icon">
<!-- Styles -->
<link rel="stylesheet" href="{{asset('cssfile/styles.css')}}">
        <link rel="stylesheet" href="{{asset('cssfile/blog.css')}}">

<link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

<style>
.sidebar{background-color:#f8f9fa}.frugal-heaven-text{color:#343a40}.list-group-item{border:none;padding:15px 10px;transition:background-color .3s}.list-group-item:hover{background-color:#e9ecef}.btn-dark{background-color:#343a40;border:none}.btn-dark:hover{background-color:#495057}.rounded-circle{border:1px solid #343a40}
</style>

</head>
<body>
<x-nav/>
<br><br>

<a href="#" class="scroll-to-top text-white">
<i class="fas fa-chevron-up"></i>
</a>

<div class="container">

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

<h2 class="frugal-heaven-text text-center mb-4">Latest Stores</h2>

<ul class="list-group list-group-flush">
    @foreach ($chunks as $store)
    @php
    $storeUrl = $store->slug
        ? route('store_details', ['slug' => Str::slug($store->slug)])
        : '#';
@endphp
    <li class="list-group-item d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <img src="{{ asset('uploads/store/' . $store->store_image) }}" alt="{{ $store->name }}" class="rounded-circle" style="width: 60px; height: 60px;">
            <div class="store-info ml-3 frugal-heaven-text">
                <span class="fw-bold">{{ $store->name }}</span>
            </div>
        </div>



        <a href="{{ $storeUrl }}" class="btn btn-dark btn-sm" {{ $store->slug ? '' : 'disabled' }}>Visit Store</a>
    </li>
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
