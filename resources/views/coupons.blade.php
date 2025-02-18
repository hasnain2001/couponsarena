@extends('main')

@section('title')
    Coupon Codes
@endsection

@section('description')
    Find the latest coupon codes and deals for your favorite stores. Save money on your online shopping with our exclusive discount codes.
@endsection

@section('keywords')
    coupon codes, discount codes, promo codes, deals, offers, vouchers, discounts, savings, online shopping
@endsection

@section('main-content')
<style>
    /* General Styles */
    body {
        background-color: #121212;
        color: #fff;
    }
    .coupon-container {
        margin: 20px auto;
        max-width: 1200px;
    }
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease-in-out;
        /* background-color: #1e1e1e; */
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .store-logo img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 10px;
        transition: transform 0.3s ease-in-out;
    }
    .store-logo img:hover {
        transform: scale(1.1);
    }
    .coupon-name {
        font-size: 1.5rem;
        font-weight: bold;
        color: #6f42c1;
    }
    .coupon-description {
        font-size: 0.9rem;
        color: #ccc;
    }
    .ending-date {
        font-size: 0.8rem;
        color: #888;
    }

    /* Button Styles */
    .btn-view-deal {
        background-color: #41266f;
        color: #fff;
        border-radius: 10px 10px;
        padding: 12px 100px;
        font-weight: bold;
        transition: all 0.3s ease-in-out;
        text-decoration: none
    }
    .btn-view-deal:hover {
        background-color: #472188;
        transform: scale(1.05);
        color: #121212;
    }

    /* Reveal Code Button (Unique Design) */
    .btn-reveal-code {
        background: linear-gradient(135deg, #6f42c1, #563d7c);
        color: #fff;
        border: none;
        border-radius: 55px 10px;
        padding: 10px 20px;
        font-weight: bold;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease-in-out;
    }
    .btn-reveal-code::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.2);
        transform: skewX(-45deg);
        transition: left 0.5s ease;
    }
    .btn-reveal-code:hover {
        transform: scale(1.05);
    }
    .btn-reveal-code:hover::before {
        left: 100%;
    }

    /* Modal Styles */
    .modal-header {
        background: linear-gradient(135deg, #6f42c1, #563d7c);
        color: #fff;
        border-radius: 15px 15px 0 0;
    }
    .modal-body {
        text-align: center;
    }
    .modal-body img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #f3e6ff;
    }
    .modal-body h5 {
        font-size: 1.2rem;
        font-weight: bold;
        color: #6f42c1;
    }
    .alert-purple {
        background: #f3e6ff;
        border: 1px solid #d6b3ff;
        border-radius: 10px;
        padding: 15px;
    }
    .alert-purple strong {
        font-size: 1.2rem;
        color: #563d7c;
    }
    .copy-btn {
        background: linear-gradient(135deg, #6f42c1, #563d7c);
        color: #fff;
        border-radius: 25px;
        padding: 10px 20px;
        font-weight: bold;
        transition: all 0.3s ease-in-out;
    }
    .copy-btn:hover {
        transform: scale(1.05);
    }

  
    /* Responsive Styles */
    @media (max-width: 768px) {
        .coupon-name {
            font-size: 1.2rem;
        }
        .coupon-description {
            font-size: 0.8rem;
        }
        .btn-reveal-code,
        .btn-view-deal {
            font-size: 0.9rem;
            padding: 8px 16px;
        }
        .store-logo img {
            width: 60px;
            height: 60px;
        }
    }
</style>

<main class="container-fluid">
    <div class="text-center bg-dark py-4 rounded-top">
        <h2 class="">Coupon Codes</h2>
        <hr class="border-light">
    </div>
    <div class="coupon-container">
        @foreach ($coupons as $coupon)
        @php
        $store = App\Models\Stores::where('slug', $coupon->store)->first();
        @endphp
        <div class="card mb-4 p-3">
            <div class="row g-3 align-items-center">
                <!-- Store Logo -->
                <div class="col-md-2 col-4 store-logo text-center">
                    @if ($store && $store->store_image)
                    <a href="{{ route('store_details', ['slug' => Str::slug($coupon->store)]) }}">
                        <img src="{{ asset('uploads/stores/' . $store->store_image) }}" alt="{{ $store->name }} Logo" class="img-fluid rounded">
                    </a>
                    @else
                    <span class="text-muted">{{ $coupon->store }} | No Logo</span>
                    @endif
                </div>
                <!-- Coupon Details -->
                <div class="col-md-7 col-8">
                    <h4 class="coupon-name">{{ $coupon->name }}</h4>
                    <p class="coupon-description">{{ $coupon->description }}</p>
                    <a href="{{ route('store_details', ['slug' => Str::slug($coupon->store)]) }}" class="text-decoration-none text-purple">See All Offers</a>
                    <p class="ending-date text-muted">Ends: {{ \Carbon\Carbon::parse($coupon->ending_date)->format('d-m-Y') }}</p>
                    <p class="text-success">Used: {{ $coupon->clicks }}</p>
                </div>
                <!-- Action Buttons -->
                <div class="col-md-3 text-center">
                    @if ($coupon->code)
                    <button class=" btn-reveal-code w-100" id="getCode{{ $coupon->id }}" 
                        onclick="handleRevealCode('{{ $coupon->id }}', '{{ $coupon->code }}')">Reveal Code</button>
                    @else
                    <a href="{{ $coupon->destination_url }}" target="_blank" class=" btn-view-deal w-100" onclick="updateClickCount('{{ $coupon->id }}')">View Deal</a>
                    @endif
                    <br><br>
                    <a href="{{ route('store_details', ['slug' => Str::slug($coupon->store)]) }}" class="btn btn-dark w-100 text-decoration-none">See All Offers</a>
                </div>
            </div>
        </div>
        @endforeach
        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $coupons->links('vendor.pagination.custom') }}
        </div>
    </div>
    <!-- Coupon Code Modal -->
    <div class="modal fade" id="couponModal" tabindex="-1" aria-labelledby="couponModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title text-white">Limited Time Offer</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Store Logo -->
                    @if ($store && $store->store_image)
                    <img src="{{ asset('uploads/stores/' . $store->store_image) }}" alt="Brand Logo" class="mb-3">
                    @else
                    <span class="text-muted">No Logo</span>
                    @endif
                    <!-- Coupon Name -->
                    <h5>{{ $coupon->name }}</h5>
                    <!-- Coupon Code -->
                    <div class="alert-purple d-inline-block px-4 py-3 text-center shadow-sm">
                        <strong>Coupon Code:</strong>
                        <strong id="couponCode" class="fs-4 text-dark">XXXX-XXXX</strong>
                        <button class="copy-btn mt-3 w-100" onclick="copyToClipboard()">Copy Code</button>
                    </div>
                    <!-- Copy Confirmation Message -->
                    <p id="copyMessage" class="text-success fw-bold mt-2" style="display: none;">Copied to clipboard! 🎉</p>
                    <!-- Description -->
                    <p class="text-muted mt-3">
                        Use this code at <a href="{{ $coupon->destination_url }}" class="text-decoration-none fw-semibold text-purple">{{ $coupon->store }}</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>



<script>
    // Handle the "Reveal Code" button click
    function handleRevealCode(couponId, couponCode) {
        document.getElementById('couponCode').textContent = couponCode;
        updateClickCount(couponId);
        const modal = new bootstrap.Modal(document.getElementById('couponModal'));
        modal.show();
    }

    // Update click count via AJAX
    function updateClickCount(couponId) {
        fetch('{{ route("update.clicks") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ coupon_id: couponId })
        }).then(response => response.json())
          .then(data => {
              if (data.success) {
                  document.getElementById(`usedCount${couponId}`).textContent = `Used By: ${data.clicks}`;
              }
          });
    }

    // Copy the coupon code to the clipboard
    function copyToClipboard() {
        const code = document.getElementById('couponCode').textContent;
        navigator.clipboard.writeText(code).then(() => {
            const copyMessage = document.getElementById('copyMessage');
            copyMessage.style.display = 'block';
            setTimeout(() => {
                copyMessage.style.display = 'none';
            }, 3000); // Hide the message after 3 seconds
        });
    }
</script>
@endsection