<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{!! $category->title !!}</title>
    <link rel="canonical" href="https://budgetheaven.com/related_category/{{ Str::slug($category->title) }}">

    <!-- Your custom meta tags go here -->
    <meta name="description" content="{!! $category->meta_description !!}">
    <meta name="keywords" content="{!! $category->meta_keyword !!}">


<link rel="stylesheet" href="{{ asset('cssfile/related-category.css') }}">


  <meta name="author" content="John Doe">
 <meta name="robots" content="index, follow">

     <link rel="icon" href="{{ asset('images/icons.png') }}" type="image/x-icon">

  </head>
  <body>

    <!-- navbar ! -->

<x-nav/>

  <a href="#" class="scroll-to-top text-white">
  <i class="fas fa-chevron-up"></i>
</a>

<!-- End navbar! -->

<div class="container">
    <h1 class="text-center">{{$category->title}}</h1>
    <p class="h5 m-0">Total stores: <span class="fw-bold">{{ $stores->count() }}</span></p>

        <div class="row card-list g-4">
            @forelse ($stores as $store)
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    @if ($store->slug)
                        <a href="{{ route('store_details', ['slug' => Str::slug($store->slug)]) }}" class="card-link text-decoration-none">
                    @endif

                    <div class="shadow-bg h-100">
                        <div class="card-body text-center">
                            <img class="stores-img rounded-circle shadow" src="{{ $store->store_image ? asset('uploads/store/' . $store->store_image) : asset('front/assets/images/no-image-found.jpg') }}" loading="lazy" alt="Card Image">
                            <h5 class="card-title mt-3">{{ $store->name ?: "Title not found" }}</h5>
                        </div>
                    </div>

                    @if ($store->slug)
                        </a>
                    @endif
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center" role="alert">
                        No Stores in category!!!
                    </div>
                </div>
            @endforelse
        </div>
    </div>
<x-footer/>

  </body>
</html>
