<?php
header("X-Robots-Tag:index, follow");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @if(isset($store) && is_object($store))
  <title>{!! $store->title !!}</title>
  <link rel="canonical" href="https://couponsarena.com/store/{{ Str::slug($store->name) }}">
  <meta name="description" content="{!! $store->meta_description !!}">
  <meta name="keywords" content="{!! $store->meta_keyword !!}">
  <meta name="author" content="Najeeb">
  <meta name="robots" content="index, follow">
  @else
  <link rel="canonical" href="https://vouchmenot.com/stores">
  @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
<link rel="stylesheet" href="{{asset('cssfile/storedetail.css')}}">
</head>
<body>
<nav>
    @include('components.navbar')
</nav>

<br>


@if(session('success'))
<div class="alert alert-light alert-dismissable">
    <b>{{ session('success') }}</b>
</div>
@endif

<!-- Store Information and Coupons Section -->
<div class="container-fluid">
    <!-- Breadcrumb Navigation -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/" class="text-dark text-decoration-none">Home</a>
            </li>
            <li class="breadcrumb-item">
                @if ($store->category)
                    <a href="{{ route('related_category', ['slug' => Str::slug($store->category)]) }}" class="text-dark text-decoration-none">{{ $store->category }}</a>
                @else
                    <span class="text-muted">Invalid Category</span>
                @endif
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $store->name }}</li>
        </ol>
    </nav>
    <hr>

    <div class="row">
    <section class="store">
        <!-- Store Information Card -->
        <div class="col-12 card shadow-sm p-4 mb-4">
            <div class="d-flex align-items-center">
                @if ($store->store_image)
                    <img src="{{ asset('uploads/stores/' . $store->store_image) }}" class="stores-img img-thumbnail me-3" alt="{{ $store->name }}">
                @endif
                <div>
                    <h3 class="card-title mb-1">{{ $store->name }}</h3>
                    <p class="card-text mb-0">{!! $store->description !!}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Coupons Section for mobile -->
    <div class="col-md-8">
        <div class="row">
            @foreach ($coupons as $coupon)
                <div class="col-12 mb-4">
                    <div class="coupon-card card p-3 rounded shadow-sm">
                        <div class="card-body d-flex flex-row align-items-center">
                            <!-- Coupon Image (Left Side) -->
                            <div class="me-3">
                                @if ($store->store_image)
                                    <img class="stores-img shadow" src="{{ asset('uploads/stores/' . $store->store_image) }}" alt="Card Image" style="">
                                @endif
                            </div>

                            <!-- Coupon Information (Right Side) -->
                            <div class="flex-grow-1">
                                <div class="d-flex flex-column flex-md-row align-items-md-center gap-2 flex-wrap">
                                    <h5 class="mb-0">{{ $coupon->name }}</h5>
                                    <p class="mb-0 text-truncate" style="max-width: 250px;">{{ $coupon->description }}</p>
                                </div>

                                <!-- Coupon Code or Get Deal Button -->
                                <div class="d-flex justify-content-end mb-2">
                                    @if ($coupon->code)
                                        <a href="{{ $coupon->destination_url }}" target="blank" class="getcode me-2" id="getCode{{ $coupon->id }}" onclick="toggleCouponCode('{{ $coupon->id }}')">Reveal Code</a>
                                        <div class="coupon-card d-flex flex-column">
                                            <span class="codeindex text-dark scratch" style="display: none;" id="codeIndex{{ $coupon->id }}">{{ $coupon->code }}</span>
                                            <button class="btn btn-info text-white btn-sm copy-btn btn-hover d-none mt-2" id="copyBtn{{ $coupon->id }}" onclick="copyCouponCode('{{ $coupon->id }}')">Copy Code</button>
                                            <p class="text-success copy-confirmation d-none mt-3" id="copyConfirmation{{ $coupon->id }}">Code copied!</p>
                                        </div>
                                    @else
                                        <a href="{{ $coupon->destination_url }}" onclick="updateClickCount('{{ $coupon->id }}')" class="get" target="_blank">Get Deal</a>
                                    @endif
                                    <form method="post" action="{{ route('update.clicks') }}" id="clickForm">
                                        @csrf
                                        <input type="hidden" name="coupon_id" id="coupon_id">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-2">
                            <span class="used">Used By: {{ $coupon->clicks }}</span>
                            <span class="date" style="color: {{ strtotime($coupon->ending_date) < strtotime(now()) ? '#951d1d' : '#909090' }};">
                                Ends: {{ \Carbon\Carbon::parse($coupon->ending_date)->format('d-m-Y') }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
            @if ($store->content)
                <div class="content">{!! $store->content !!}</div>
            @else
                <span>no content</span>
            @endif
        </div>
    </div>

        <!-- Sidebar with Store Information -->
        <div class="col-md-4">
            <hr>
            <!-- Filter Section -->
            <div class="store-info-card card shadow-sm p-3 mb-5 bg-white rounded" style="max-width: 100%;">
                <h4 class="text-center mb-4">Filter By Voucher Codes</h4>
                <div class="d-flex flex-column">
                    <div class="btn-group" role="group">
                        <a href="{{ url()->current() }}" class="btn btn-dark mb-2">All</a>
                        <a href="{{ url()->current() }}?sort=codes" class="btn btn-dark mb-2">Codes</a>
                        <a href="{{ url()->current() }}?sort=deals" class="btn btn-dark mb-2">Online Sales</a>
                    </div>
                </div>
            </div>
            <h3 class="text-center mb-4">About {{ $store->name }}</h3>
            <div class="card shadow-sm p-4 mb-4 bg-white rounded">
                <div class="card-body">
                    <p class="card-text">{{ $store->about }}</p>
                </div>
            </div>

            <!-- Social Share Section -->
            <div class="social-container widget-col-item">
                <p class="widget-title">Share</p>
                <div class="social-box1 footer-social">
                    <ul class="list-inline d-flex justify-content-center">
                        <li class="list-inline-item">
                            <a class="btn btn-primary btn-sm rounded-circle" href="http://www.facebook.com/sharer.php?u=https://Couponsarena.com/{{ Str::slug($store->name) }}-us" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-info btn-sm rounded-circle" href="https://twitter.com/share?url=https://Couponsarena.com/{{ Str::slug($store->name) }}-us" target="_blank"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-danger btn-sm rounded-circle" href="https://pinterest.com/pin/create/button/?url=https://Couponsarena.com/{{ Str::slug($store->name) }}-us" target="_blank"><i class="fab fa-pinterest"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-danger btn-sm rounded-circle" href="https://www.instagram.com/?url=https://Couponsarena.com/{{ Str::slug($store->name) }}-us" target="_blank"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-success btn-sm rounded-circle" href="https://api.whatsapp.com/send?text=https://Couponsarena.com/{{ Str::slug($store->name) }}-us" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Related Stores Section -->
          <!-- Related Stores Section -->
          <div class="store-info-card card shadow-sm p-3 mb-5 bg-white rounded">
            <h4 class="text-center mb-4">Related Stores</h4>
            <div class="row row-cols-2 gy-3"> <!-- Adjusted for responsive layout -->
                @foreach ($relatedStores as $relatedStore)
                    @php
                        $language = $relatedStore->language->code; // Fixed variable name from $store to $relatedStore
                        $storeSlug = Str::slug($relatedStore->slug); // Fixed variable name from $store to $relatedStore

                        // Conditionally generate the URL based on the language
                        $storeurl = $relatedStore->slug
                            ? ($language === 'en'
                                ? route('store_details', ['slug' => $storeSlug])  // English route without 'lang'
                                : route('store_details.withLang', ['lang' => $language, 'slug' => $storeSlug]))  // Other languages
                            : '#';
                    @endphp

                    <div class="col"> <!-- Each store is wrapped in a column -->
                        <a href="{{ $storeurl }}" class="card-link text-decoration-none d-block">
                            <div class="related-store-box text-left border p-3 rounded">
                                <span class="store-link">{{ $relatedStore->name }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </div>
    <br><br>
</div>


<footer>
    @include('components.footer')
</footer>

<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
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
</body>
</html>
