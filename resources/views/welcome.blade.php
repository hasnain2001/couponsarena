@extends('main')
@section('title')
CouponsArena | Latest Discount Codes of 2024
@endsection
@section('description')
Find the latest coupon codes and deals for your favorite stores. Save money on your online shopping with our exclusive discount codes.
@endsection
@section('keywords')
coupon codes, discount codes, promo codes, deals, offers, vouchers, discounts, savings, online shopping
@endsection

@section('main-content')
<!-- Custom CSS for Styling -->
 <style>
.blog{
    padding: 10px;
}
.item {
    position: relative;
    overflow: hidden;
}

.card-overlay {
    padding-left: 10px;
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 140px; /* Height of the overlay at the bottom */
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black */
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
}

.item:hover .card-overlay {
    opacity: 1;
    background-color: rgba(0, 0, 0, 0.8); /* Slightly darker on hover */
}


.card-title {
    font-size: 18px;
    text-align: center;
}
.bg-light {
    position: relative;
}

.custom-prev-btn,
.custom-next-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent black */
    color: white;
    border: none;
    font-size: 24px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    cursor: pointer;
    z-index: 1000;
    transition: background-color 0.3s ease;
}

.custom-prev-btn:hover,
.custom-next-btn:hover {
    background-color: rgba(0, 0, 0, 0.8);
}

.custom-prev-btn {
    left: -10px; /* Adjust as needed */
}

.custom-next-btn {
    right: -10px; /* Adjust as needed */
}

.custom-carousel-btn {
    width: 50px;
    height: 50px;
    background-color: rgba(0, 0, 0, 0.5); /* Red with opacity */
    border: none;
    border-radius: 20%;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: background-color 0.3s ease;
    position: absolute;
    top: 10%;
    transform: translateY(-50%);
}

.custom-carousel-btn:hover {
    background-color: rgba(116, 107, 107, 0.8); /* Darker red on hover */
}



.carousel-control-prev.custom-carousel-btn {
    left: 20px;
}

.carousel-control-next.custom-carousel-btn {
    right: 20px;
}

/* Customizing carousel indicators */
.custom-indicators button {
    width: 12px;
    height: 12px;
    border-radius: 40%;
    background-color: #ccc;
    border: none;
    transition: background-color 0.3s ease;
}

.custom-indicators button.active {
    background-color: red; /* Active indicator in red */
}

.custom-indicators button:hover {
    background-color: darkred; /* Dark red on hover */
}
 </style>

<main class=" container-fluid">
<section class="blog">
    <div class="bg-light position-relative">
        <div class="owl-carousel owl-theme">
            @foreach ($blogs as $blog)
            @php
            $blogurl = $blog->slug
            ? route('blog-details', ['slug' => Str::slug($blog->slug)])
            : '#';
            @endphp
                <div class="item">
                    <div class="card shadow-sm h-100 position-relative">
                        <a href="{{$blogurl }}" class=" text-white text-decoration-none">
                        <img class="cardimg" src="{{ asset($blog->category_image) }}" alt="Blog Post Image" style="height:250px; width:100%;">

                        <div class="card-overlay">

                                <span class="card-title">{{ $blog->title }}</span>
                            </a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Previous and Next Buttons -->
        <button class="custom-prev-btn">&#8249;</button>
        <button class="custom-next-btn">&#8250;</button>
    </div>
</section>
<section>
    <div class="container-fluid">
        <h3 class="mb-4 title text-center">@lang('message.Popular Stores Today')</h3>
        <div id="storeCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($stores->chunk(6) as $chunkIndex => $storeChunk)
                <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                    <div class="row">
                        @foreach ($storeChunk as $store)
                        <div class="col-6 col-md-2"> <!-- Show 2 on mobile, 6 on larger screens -->
                            <a href="{{ route('store_details', ['slug' => Str::slug($store->slug)]) }}" class="card-link text-decoration-none">
                                <div class="card h-100 text-center ">
                                    <img class=" shadow" src="{{ $store->store_image ? asset('uploads/stores/' . $store->store_image) : asset('front/assets/images/no-image-found.jpg') }}" loading="lazy" alt="{{ $store->name }}" style="height: 200px; object-fit: fill;">
                                    <span class="top-store-name text-truncate d-block mt-2">{{ $store->name }}</span>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev custom-carousel-btn" type="button" data-bs-target="#storeCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next custom-carousel-btn" type="button" data-bs-target="#storeCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </div>
</section>


<section class="my-4">
    <div class="row">
        <!-- Recent Posts Section (Left Side) -->
        <div class="col-md-4">
            <h2 class="text-dark mb-3">@lang('message.trending-posts')</h2>
            @foreach ($topblogs as $blog)
            @php
            $blogurl = $blog->slug
            ? route('blog-details', ['slug' => Str::slug($blog->slug)])
            : '#';
            @endphp
                <div class="d-flex mb-3">
                    <a href="{{ $blogurl }}" class="text-dark text-decoration-none">
                    <img src="{{ asset($blog->category_image) }}" alt="Blog Post Image" class="rounded" style="width: 100px; height: 100px; object-fit: cover; margin-right: 15px;">
                    <div>
                            <span>{{ $blog->title }}</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-md-8">
            <h3 class="heading text-center">@lang('message.Trending Promo Codes To Save Everyday')</h3>
            <div class="row coupon-grid g-4">
                @foreach ($topcouponcode as $coupon)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="coupon-card h-100 card rounded">
                        @php
                        $store = App\Models\Stores::where('slug', $coupon->store)->first();
                        @endphp

                        <div class="coupon-header text-center position-relative">
                            @if ($store && $store->store_image)
                                <a href="{{ route('store_details', ['slug' => Str::slug($store->slug)]) }}">
                                    <img src="{{ asset('uploads/stores/' . $store->store_image) }}" alt="{{ $store->name }} Image" class="coupon-image" loading="lazy">
                                </a>
                            @else
                                <div class="no-image-placeholder bg-light text-center py-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-image-fill" viewBox="0 0 16 16">
                                        <path d="M.002 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-12a2 2 0 0 1-2-2zm1 9v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V9.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062zm5-6.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
                                    </svg>
                                    <span>{{ $coupon->store }}</span>
                                </div>
                            @endif
                        </div>

                        <div class="mb-4 coupon-body py-3">
                            <span>{{ $coupon->store }}</span>
                            <h6 class="text-left">{{ $coupon->name }}</h6>
                            <span class="d-block mb-2 {{ \Carbon\Carbon::parse($coupon->ending_date)->isPast() ? 'text-danger' : 'text-muted' }}">
                                Ends: {{ \Carbon\Carbon::parse($coupon->ending_date)->format('d M, Y') }}
                            </span>
                            <div class="d-grid gap-2">
                                <a href="{{ $coupon->destination_url }}" target="_blank" class="btn btn-dark " id="getCode{{ $coupon->id }}" onclick="toggleCouponCode('{{ $coupon->id }}')">@lang('message.Get Code')</a>
                                <div class="coupon-card d-flex flex-column">
                                    <span class="codeindex text-dark scratch" style="display: none;" id="codeIndex{{ $coupon->id }}">{{ $coupon->code }}</span>
                                    <button class="btn btn-info text-white btn-sm copy-btn btn-hover d-none mt-2" id="copyBtn{{ $coupon->id }}" onclick="copyCouponCode('{{ $coupon->id }}')">Copy Code</button>
                                    <p class="text-success copy-confirmation d-none mt-3" id="copyConfirmation{{ $coupon->id }}">Code copied!</p>

                                    <form method="post" action="{{ route('update.clicks') }}" id="clickForm">
                                        @csrf
                                        <input type="hidden" name="coupon_id" id="coupon_id">
                                    </form>
                                </div>
                                <p class="used font-weight-bold mt-2" id="output_{{ $coupon->id }}">@lang('message.Used By'): {{ $coupon->clicks }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <h2 class="title text-center mt-5">@lang('message.Top Deals Today')</h2>
            <div class="row coupon-grid g-4">
                @foreach ($Couponsdeals as $coupon)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="coupon-card h-100 card rounded">
                        @php
                        $store = App\Models\Stores::where('slug', $coupon->store)->first();
                        @endphp

                        <div class="coupon-header text-center position-relative">
                            @if ($store && $store->store_image)
                                <a href="{{ route('store_details', ['slug' => Str::slug($store->slug)]) }}">
                                    <img src="{{ asset('uploads/stores/' . $store->store_image) }}" alt="{{ $store->name }} Image" class="coupon-image" loading="lazy">
                                </a>
                            @else
                                <div class="no-image-placeholder bg-light text-center py-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-image-fill" viewBox="0 0 16 16">
                                        <path d="M.002 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-12a2 2 0 0 1-2-2zm1 9v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V9.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062zm5-6.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
                                    </svg>
                                    <span>{{ $coupon->store }}</span>
                                </div>
                            @endif
                        </div>

                        <div class="mb-4 coupon-body py-3">
                            <span>{{ $coupon->store }}</span>
                            <h6 class="text-left">{{ $coupon->name }}</h6>
                            <span class="d-block mb-2 {{ \Carbon\Carbon::parse($coupon->ending_date)->isPast() ? 'text-danger' : 'text-muted' }}">
                                Ends: {{ \Carbon\Carbon::parse($coupon->ending_date)->format('d M, Y') }}
                            </span>
                            <div class="d-grid gap-2">
                                <a href="{{ $coupon->destination_url }}" class="btn btn-dark " onclick="updateClickCount('{{ $coupon->id }}')" target="_blank">@lang('message.Get Deal')</a>
                                <form method="post" action="{{ route('update.clicks') }}" id="clickForm">
                                    @csrf
                                    <input type="hidden" name="coupon_id" id="coupon_id">
                                </form>
                            </div>
                            <p class="used font-weight-bold mt-2" id="output_{{ $coupon->id }}">@lang('message.Used By'): {{ $coupon->clicks }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>



    <section>

    </section>


</main>
<script>

    // Function to toggle coupon code visibility and copy button
    function toggleCouponCode(couponId) {
    // Set the coupon ID in localStorage to remember the state
    localStorage.setItem('copiedCouponId', couponId);

    const codeElement = document.getElementById(`codeIndex${couponId}`);
    const copyButton = document.getElementById(`copyBtn${couponId}`);

    if (codeElement.style.display === 'none') {
    codeElement.style.display = 'inline';
    copyButton.classList.remove('d-none');
    } else {
    codeElement.style.display = 'none';
    copyButton.classList.add('d-none');
    }

    // Update the click count via AJAX
    updateClickCount(couponId);
    }

    // Check localStorage on page load to restore the state
    document.addEventListener('DOMContentLoaded', function() {
    const copiedCouponId = localStorage.getItem('copiedCouponId');
    if (copiedCouponId) {
    const codeElement = document.getElementById(`codeIndex${copiedCouponId}`);
    const copyButton = document.getElementById(`copyBtn${copiedCouponId}`);

    codeElement.style.display = 'inline';
    copyButton.classList.remove('d-none');
    }
    });

    // Clear localStorage on refresh
    window.addEventListener('beforeunload', function () {
    localStorage.removeItem('copiedCouponId');
    });

    // Function to copy coupon code to clipboard
    function copyCouponCode(couponId) {
    const codeElement = document.getElementById(`codeIndex${couponId}`);
    const code = codeElement.innerText.trim();

    navigator.clipboard.writeText(code)
    .then(() => {
        // Show success message
        const copyMessage = document.getElementById(`copyConfirmation${couponId}`);
        copyMessage.classList.remove('d-none');
        setTimeout(() => {
            copyMessage.classList.add('d-none');
        }, 1500);
    })
    .catch(err => {
        console.error('Failed to copy: ', err);
    });
    }

    // Function to update click count via AJAX
    function updateClickCount(couponId) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '{{ route("update.clicks") }}', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

    xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
        console.log('Click count updated successfully.');
    }
    };

    xhr.send('coupon_id=' + couponId);
    }

    // Function to count clicks (fallback if not using AJAX)
    function countClicks(couponId) {
    document.getElementById('coupon_id').value = couponId;
    document.getElementById('clickForm').submit();
    }

    </script>
    <script>
$(document).ready(function () {
    var owl = $(".owl-carousel");

    // Initialize Owl Carousel
    owl.owlCarousel({
        loop: true, // Enables infinite loop
        margin: 10,
        nav: false, // Disable default navigation
        dots: true, // Show dots below the carousel
        autoplay: true, // Optional: Adds autoplay
        autoplayTimeout: 3000, // Optional: Time between slides
        autoplayHoverPause: true, // Optional: Pause on hover
        responsive: {
            0: {
                items: 1, // Show 1 item on small screens
            },
            600: {
                items: 2, // Show 2 items on medium screens
            },
            1000: {
                items: 3, // Show 3 items on large screens
            },
        },
    });

    // Custom Navigation Buttons
    $(".custom-prev-btn").click(function () {
        owl.trigger("prev.owl.carousel");
    });

    $(".custom-next-btn").click(function () {
        owl.trigger("next.owl.carousel");
    });
});

    </script>



@endsection
