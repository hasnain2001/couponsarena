@extends('main')
@section('title', 'The Real Deal by ' . config('app.name') . ': Daily Savings, Buying Guides & Expert Reviews')
@section('description','Get savings tips, smart shopping advice and deals from ' . config('app.name') . 's blog, The Real Deal. Read consumer news, product reviews and gift guides for all occasions.')

<style>
    .sidebar{background-color:#f8f9fa}.frugal-heaven-text{color:#676a6df5}.list-group-item{border:none;padding:15px 10px;transition:background-color .3s}.list-group-item:hover{background-color:#e9ecef}.btn-dark{background-color:#343a40;border:none}.btn-dark:hover{background-color:#495057}.rounded-circle{border:1px solid #343a40}
    .frugal-heaven-text-name{color:#495057 }
    </style>

@section('main-content')





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
    $language = $blog->language ? $blog->language->code : 'en'; // Default to 'en' if no language is set
    $slug = Str::slug($blog->slug);

    // Generate the URL based on whether the language is 'en' or not
    if ($language === 'en') {
        $blogurl = route('blog-details', ['slug' => $slug]);
    } else {
        $blogurl = route('blog-details.withLang', ['lang' => $language, 'slug' => $slug]);
    }
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
     {{ $blogs->links('vendor.pagination.custom') }}
</div>
</div>


<div class="col-md-4 sidebar p-3 frugal-heaven-sidebar bg-light rounded shadow-sm">

<h3 class="frugal-heaven-text text-center mb-4">Latest Stores</h3>

<ul class="list-group list-group-flush">
    @foreach ($chunks as $store)

    @php
    $storeurl = $store->slug
      ? route('store_details', ['slug' => Str::slug($store->slug)])
      : '#';
    @endphp

        <li class="list-group-item d-flex align-items-center justify-content-between">
             <a href="{{ $storeurl }}" class="btn btn-light btn-sm">
            <div class="d-flex align-items-center">
            <img src="{{ asset('uploads/stores/' . $store->store_image) }}" alt="{{ $store->name }}" class="rounded-circle" style="width: 60px; height: 60px;">
                <div class="store-info ml-3">
                    <span class="fw-bold frugal-heaven-text-name">{{ $store->name }}</span>
                </div>
            </div>
             </a>
            <a href="{{ $storeurl }}" class="btn btn-dark btn-sm">Visit Store</a>
        </li>

    @endforeach


</ul>

</div>



</div>

</div>

</div>

@endsection


