@extends('main')
@section('title')
CouponsArena | Latest Discount Codes of {{ date('Y') }}
@endsection
@section('description')
Find the latest coupon codes and deals for your favorite stores. Save money on your online shopping with our exclusive discount codes.
@endsection
@section('keywords')
coupon codes, discount codes, promo codes, deals, offers, vouchers, discounts, savings, online shopping
@endsection

@section('main-content')
<main class="container-fluid px-0">
    <!-- Hero Slider Section -->
    <section class="hero-slider mb-5">
        <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators custom-indicators">
                @for($i = 0; $i < 4; $i++)
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="{{ $i }}"
                        class="{{ $i === 0 ? 'active' : '' }}"
                        aria-label="Slide {{ $i + 1 }}"></button>
                @endfor
            </div>
            <div class="carousel-inner rounded-4">
                <div class="carousel-item active">
                    <img src="{{ asset('images/banner1.png') }}" class="d-block w-100 hero-image" alt="Save Big with Coupons" loading="lazy">
                    {{-- <div class="carousel-caption d-none d-md-block">
                        <h2>Save Big on Your Favorite Brands</h2>
                        <p>Exclusive deals and coupon codes updated daily</p>
                    </div> --}}
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/couponsarenaslider.png') }}" class="d-block w-100 hero-image" alt="Coupons Arena Special Offers" loading="lazy">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/Untitled-2 (1).png') }}" class="d-block w-100 hero-image" alt="Limited Time Offers" loading="lazy">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/black friday sale.png') }}" class="d-block w-100 hero-image" alt="Black Friday Sale" loading="lazy">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- Popular Stores Section -->
    <section class="popular-stores mb-5">
        <div class="container-fluid">
            <div class="section-header text-center mb-5">
                <h2 class="section-title">@lang('message.Popular Stores Today')</h2>
                <p class="section-subtitle">Shop from our most visited stores with exclusive deals</p>
            </div>

            <div id="storesCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($stores->chunk(6) as $chunkIndex => $storeChunk)
                    <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                        <div class="row g-3">
                            @foreach ($storeChunk as $store)
                            <div class="col-6 col-md-2">
                                <a href="{{ route('store_details', ['slug' => Str::slug($store->slug)]) }}" class="store-card-link text-decoration-none">
                                    <div class="store-card text-center h-100">
                                        <div class="store-image-container">
                                            <img src="{{ $store->store_image ? asset('uploads/stores/' . $store->store_image) : asset('front/assets/images/no-image-found.jpg') }}"
                                                 loading="lazy"
                                                 alt="{{ $store->name }}"
                                                 class="store-img">
                                            <div class="store-overlay">
                                                <span class="view-deals-btn">View Deals</span>
                                            </div>
                                        </div>
                                        <div class="store-info mt-2">
                                            <h6 class="store-name">{{ $store->name }}</h6>
                                            <small class="text-muted">
                                                <div class="coupon-count">
                                                   offers: {{  $store->coupons()->count() }}
                                                </div>
                                        </small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev store-carousel-btn" type="button" data-bs-target="#storesCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next store-carousel-btn" type="button" data-bs-target="#storesCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="main-content mb-5">
        <div class="container-fluid">
            <div class="row g-4">
                <!-- Trending Posts Sidebar -->
                <div class="col-lg-4">
                    <div class="trending-posts-sidebar">
                        <div class="sidebar-header mb-4">
                            <h3 class="sidebar-title">@lang('message.trending-posts')</h3>
                            <div class="header-accent"></div>
                        </div>
                        <div class="blog-posts-list">
                            @foreach ($topblogs as $blog)
                            @php
                                $blogurl = $blog->slug ? route('blog-details', ['slug' => Str::slug($blog->slug)]) : '#';
                            @endphp
                            <article class="blog-post-card mb-3">
                                <a href="{{ $blogurl }}" class="text-decoration-none">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-4">
                                            <div class="blog-post-image">
                                                <img src="{{ asset($blog->category_image) }}"
                                                     alt="{{ $blog->title }}"
                                                     class="blog-thumbnail"
                                                     loading="lazy"
                                                     decoding="async"
                                                     width="100%"
                                                     height="100%"
                                                     >
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="blog-post-content">
                                                <h6 class="blog-post-title">{{ Str::limit($blog->title, 50) }}</h6>
                                                <div class="blog-post-meta">
                                                    <small class="text-muted">
                                                        <i class="fas fa-calendar me-1"></i>
                                                        {{ $blog->created_at->format('M d') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </article>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Coupons & Deals Main Content -->
                <div class="col-lg-8">
                    <!-- Trending Promo Codes -->
                    <div class="coupons-section mb-5">
                        <div class="section-header mb-4">
                            <h3 class="section-title">@lang('message.Trending Promo Codes To Save Everyday')</h3>
                            <p class="section-subtitle">Latest coupon codes updated regularly</p>
                        </div>
                        <div class="row g-4">
                            @foreach ($topcouponcode as $coupon)
                            <div class="col-xl-4 col-md-6">
                                <div class="coupon-card h-100">
                                    <div class="coupon-header text-center">
                                        @if ($coupon->stores->store_image)
                                        <a href="{{ route('store_details', ['slug' => Str::slug($coupon->stores->slug)]) }}">
                                            <img src="{{ asset('uploads/stores/' . $coupon->stores->store_image) }}"
                                                 alt="{{ $coupon->stores->name }}"
                                                 class="store-logo"
                                                 loading="lazy">
                                        </a>
                                        @else
                                        <div class="store-placeholder">
                                            <i class="fas fa-store fa-2x"></i>
                                            <span>{{ $coupon->store }}</span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="coupon-body">
                                        <div class="coupon-info">
                                            <span class="store-name">{{ $coupon->store }}</span>
                                            <h6 class="coupon-title">{{ $coupon->name }}</h6>
                                            <div class="coupon-meta">
                                                <span class="expiry-date {{ \Carbon\Carbon::parse($coupon->ending_date)->isPast() ? 'text-danger' : 'text-muted' }}">
                                                    <i class="fas fa-clock me-1"></i>
                                                    Ends: {{ \Carbon\Carbon::parse($coupon->ending_date)->format('M d, Y') }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="coupon-actions">
                                            <button class="btn btn-primary w-100 reveal-btn"
                                                    onclick="handleRevealCode('{{ $coupon->id }}', '{{ $coupon->stores->affiliate_url ?? $coupon->destination_url }}')"
                                                    id="getCode{{ $coupon->id }}">
                                                <i class="fas fa-eye me-2"></i>Get Code
                                            </button>
                                            <div class="code-section mt-2 d-none" id="codeContainer{{ $coupon->id }}">
                                                <div class="input-group">
                                                    <input type="text" class="form-control coupon-code-input"
                                                           value="{{ $coupon->code }}"
                                                           readonly
                                                           id="codeIndex{{ $coupon->id }}">
                                                    <button class="btn btn-outline-primary copy-btn"
                                                            onclick="copyCouponCode('{{ $coupon->id }}')">
                                                        <i class="fas fa-copy"></i>
                                                    </button>
                                                </div>
                                                <div class="copy-success text-success small mt-1 d-none text-center"
                                                     id="copyConfirmation{{ $coupon->id }}">
                                                    <i class="fas fa-check-circle me-1"></i>Copied!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="coupon-footer">
                                            <small class="usage-count">
                                                <i class="fas fa-users me-1"></i>
                                                Used by {{ $coupon->clicks }} people
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Top Deals Today -->
                    <div class="deals-section">
                        <div class="section-header mb-4">
                            <h3 class="section-title">@lang('message.Top Deals Today')</h3>
                            <p class="section-subtitle">Don't miss these amazing deals</p>
                        </div>
                        <div class="row g-4">
                            @foreach ($Couponsdeals as $coupon)
                            <div class="col-xl-4 col-md-6">
                                <div class="deal-card h-100">
                                    <div class="deal-header text-center">
                                        @if ($coupon->stores->store_image)
                                        <a href="{{ route('store_details', ['slug' => Str::slug($coupon->stores->slug)]) }}">
                                            <img src="{{ asset('uploads/stores/' . $coupon->stores->store_image) }}"
                                                 alt="{{ $coupon->stores->name }}"
                                                 class="store-logo"
                                                 loading="lazy">
                                        </a>
                                        @else
                                        <div class="store-placeholder">
                                            <i class="fas fa-store fa-2x"></i>
                                            <span>{{ $coupon->store }}</span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="deal-body">
                                        <div class="deal-info">
                                            <span class="store-name">{{ $coupon->store }}</span>
                                            <h6 class="deal-title">{{ $coupon->name }}</h6>
                                            <div class="deal-meta">
                                                <span class="expiry-date {{ \Carbon\Carbon::parse($coupon->ending_date)->isPast() ? 'text-danger' : 'text-muted' }}">
                                                    <i class="fas fa-clock me-1"></i>
                                                    Ends: {{ \Carbon\Carbon::parse($coupon->ending_date)->format('M d, Y') }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="deal-actions">
                                            <a href="{{ $coupon->stores->affiliate_url ?? $coupon->destination_url }}"
                                               class="btn btn-success w-100 get-deal-btn"
                                               onclick="updateClickCount('{{ $coupon->id }}')"
                                               target="_blank"
                                               rel="nofollow">
                                                <i class="fas fa-shopping-bag me-2"></i>Get Deal
                                            </a>
                                        </div>
                                        <div class="deal-footer">
                                            <small class="usage-count">
                                                <i class="fas fa-users me-1"></i>
                                                Used by {{ $coupon->clicks }} people
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- Hidden Form for Click Tracking -->
<form method="post" action="{{ route('update.clicks') }}" id="clickForm" class="d-none">
    @csrf
    <input type="hidden" name="coupon_id" id="coupon_id">
</form>
@endsection

@push('scripts')
    <script>
        // Handle reveal code functionality
        function handleRevealCode(couponId, destinationUrl) {
            const getCodeBtn = document.getElementById(`getCode${couponId}`);
            const codeContainer = document.getElementById(`codeContainer${couponId}`);

            // Hide reveal button and show code
            getCodeBtn.classList.add('d-none');
            codeContainer.classList.remove('d-none');

            // Open store URL in new tab
            if (destinationUrl) {
                window.open(destinationUrl, '_blank');
            }

            // Update click count
            updateClickCount(couponId);
        }

        // Copy coupon code to clipboard
        function copyCouponCode(couponId) {
            const codeElement = document.getElementById(`codeIndex${couponId}`);
            const code = codeElement.value;
            const confirmation = document.getElementById(`copyConfirmation${couponId}`);

            navigator.clipboard.writeText(code)
                .then(() => {
                    confirmation.classList.remove('d-none');
                    setTimeout(() => {
                        confirmation.classList.add('d-none');
                    }, 2000);
                })
                .catch(err => {
                    console.error('Failed to copy:', err);
                    // Fallback for older browsers
                    codeElement.select();
                    document.execCommand('copy');
                    confirmation.classList.remove('d-none');
                    setTimeout(() => {
                        confirmation.classList.add('d-none');
                    }, 2000);
                });
        }

        // Update click count via AJAX
        function updateClickCount(couponId) {
            fetch('{{ route("update.clicks") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: `coupon_id=${couponId}`
            })
            .then(response => response.json())
            .then(data => {
                console.log('Click count updated');
            })
            .catch(error => {
                console.error('Error updating click count:', error);
            });
        }
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('cssfile/home.css') }}">
@endpush
