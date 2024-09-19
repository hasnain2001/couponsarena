<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('cssfile/home.css') }}">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('cssfile/404.css') }}">
    <style>

    </style>
</head>
<body>
    <nav>
        @include('components.navbar')
    </nav>
    <br>
    <div class="container py-6">
    <div class="error-container">
        <h1>404</h1>
        <h2>Oops! The page you're looking for isn't here.</h2>
        <p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
        <a href="{{ url('/') }}" class="get">Go to Homepage</a>
    </div>

<!-- Coupon Cards Section -->

  <div class="row mb-4">
    <div class="col-12 ">
      <h2 class="title">Today's Top Trending Coupons & Voucher Codes</h2>
    </div>
  </div>
  <div class="row coupon-grid g-4">
    @foreach ($Coupons as $coupon)
      <div class="col-md-4 col-sm-6">
        <div class="coupon-card  h-100 card rounded shadow">
          @php
            // Retrieve associated store and handle unavailable images
            $store = App\Models\Stores::where('name', $coupon->store)->first();
          @endphp

          <div class="coupon-header">
            @if ($store && $store->store_image)
              <img src="{{ asset('uploads/store/' . $store->store_image) }}"
                   alt="{{ $store->name }} Image" class="coupon-image"
                   loading="lazy">
            @else
              <div class="no-image-placeholder bg-light text-center py-4">
                <i class="fas fa-store-alt fa-3x text-primary"></i>
              </div>
            @endif
          </div>

          <div class="coupon-body p-4">
            <h4 class="coupon-store mb-3 text-dark font-italic">{{ $coupon->store }}</h4>
            <h6 class="coupon-description font-weight-bold text-gray-700 mb-3">{{ $coupon->description }}</h6>

            @if ($coupon->code)
              <button type="button" class="getcode"
                      data-bs-toggle="modal" data-bs-target="#codeModal{{ $coupon->id }}"
                      onclick="openCouponInNewTab('{{ $coupon->destination_url }}', '{{ $coupon->id }}')">
                Get Code
              </button>
            @else
              <a href="{{ $coupon->destination_url }}" class="get"
                 target="_blank">Get Deal</a>
            @endif
@if ($coupon->slug)

<a href="{{ route('store_details', ['slug' => Str::slug($coupon->store)]) }}"
    class="get ">Visit Store</a>
@else
<p>no slug</p>
@endif
          </div>
        </div>
      </div>

      <!-- Modal for Coupon Code -->
      <div class="modal fade" id="codeModal{{ $coupon->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $coupon->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel{{ $coupon->id }}">{{ $coupon->name }}</h3>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <h3>{{ $coupon->code ? $coupon->code : "Code not found" }}</h3>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-dark" onclick="copyCoupon('{{ $coupon->code }}')">Copy</button>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
</div>
<br><br>


    <footer>
        @include('components.footer')
    </footer> 
    <script src="{{ asset('js/home.js') }}"></script>
</body>
</html>
