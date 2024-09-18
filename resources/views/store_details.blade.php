<?php
header("X-Robots-Tag:index, follow");
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    @if(isset($store) && is_object($store))
  <title>{!! $store->title !!}</title>
  <link rel="canonical" href="https://budgetheaven.com/store/{{ Str::slug($store->name) }}">
  <meta name="description" content="{!! $store->meta_description !!}">
  <meta name="keywords" content="{!! $store->meta_keyword !!}">
  <meta name="author" content="John Doe">
  <meta name="robots" content="index, follow">
  @else
  <link rel="canonical" href="https://budgetheaven.com/store/example">
  @endif


<link rel="stylesheet" href="{{ asset('cssfile/storedetail.css') }}">


   <link rel="icon" href="{{ asset('images/icons.png') }}" type="image/x-icon">




</head>
<body>
  <!-- Navbar -->
  <x-nav/>
  <!-- End Navbar -->

  <a href="#" class="scroll-to-top text-white ">
    <i class="fas fa-chevron-up"></i>
  </a>
   @if(session('success'))
    <div class="alert alert-light alert-dismissable">


        <b>{{ session('success') }}</b>
    </div>
    @endif
<div class="contain">
    <hr>
    <div class="row">
<div class="col-md-8">
    <div class="row row-cols-1">
        @foreach ($coupons as $coupon)
        <div class="col mb-4">
            <div class="coupon-card shadow-sm p-3 rounded">
                <div class="card-body d-flex flex-column flex-md-row align-items-center">
                    <div class="text-center mb-4 mb-md-0">
                        @if ($store->store_image)
                        <img src="{{ asset('uploads/store/' . $store->store_image) }}" class="logo" alt="{{ $store->name }}">
                        @endif
                    </div>
                    <div class="flex-grow-1 text-left">
                        <h5 class="text-left">{{ $coupon->name }}</h5>
                        <p class="text-left mb-3">{{ $coupon->description }}</p>
                        <span class="used">Used By: {{ $coupon->clicks }}</span>
                        <br>
                        <!-- Ensure date is visible and aligned left on mobile -->

                    </div>
                    <div class="ml-auto text-right mt-3 mt-md-0 text-center text-md-right">
                        @if ($coupon->code)
                        <div class="mb-2 d-flex flex-column flex-md-row align-items-md-center">
                            <span id="codeIndex{{ $coupon->id }}" class="badge text-dark scratch">Code: {{ $coupon->code }}</span>
                            <button class="btn btn-success btn-sm ml-2 d-none" id="copyBtn{{ $coupon->id }}" onclick="copyCouponCode('{{ $coupon->id }}')">Copy Code</button>
                            <a href="{{ $coupon->destination_url }}" target="_blank" class="getcode text-white btn btn-sm" id="getCode{{ $coupon->id }}" onclick="toggleCouponCode('{{ $coupon->id }}')">Coupon Code</a>
                            <div id="copyMessage{{ $coupon->id }}" class="alert alert-success mt-2 d-none">Code copied successfully!</div>
                        </div>
                        @else
                        <div class="mb-2 d-flex flex-row justify-content-between align-items-center">
                            <a href="{{ $coupon->destination_url }}" class="btn-sm btn text-white get" target="_blank" onclick="countClicks('{{ $coupon->id }}')">Get Deal</a>
                        </div>

                        @endif
                        <form method="post" action="{{ route('update.clicks') }}" id="clickForm">
                            @csrf
                            <input type="hidden" name="coupon_id" id="coupon_id">
                        </form>
                          <span class="date" style="color: {{ strtotime($coupon->ending_date) < strtotime(now()) ? '#951d1d' : '#909090' }}">
                            {{ $coupon->ending_date }}
                        </span>
                    </div>

                </div>
            </div>
        </div>
        @endforeach


    </div>
</div>


        <!-- Sidebar with Store Information -->
        <div class="col-md-4">
            <div class="store-info-card card shadow-sm p-3 mb-5 bg-white rounded">
                <div class="text-center">
                    @if ($store->store_image)
                    <img src="{{ asset('uploads/store/' . $store->store_image) }}" class="logo img-fluid rounded-circle mb-3" alt="{{ $store->name }}">
                    @endif
                </div>
                <h3 class="text-center font-weight-bold">{{ $store->name }}</h3>
                <div class="text-center mb-3">
                    <div class="rating-stars text-warning">
                        <i class="fas fa-star" data-rating="1"></i>
                        <i class="fas fa-star" data-rating="2"></i>
                        <i class="fas fa-star" data-rating="3"></i>
                        <i class="fas fa-star" data-rating="4"></i>
                        <i class="fas fa-star text-dark" data-rating="5"></i>
                    </div>
                </div>
                <p class="card-text text-left">{{ $store->description }}</p>
                <div class="text-center">
                    <a href="{{ $store->website_url }}" class="get" target="_blank">Visit Website</a>
                </div>
            </div>
            <hr>      {{-- @for ($i = 1; $i <= 5; $i++)
            @if ($i <= $store->rating)
                <i class="fas fa-star"></i>
            @else
                <i class="far fa-star"></i>
            @endif
        @endfor --}}
            <!-- Related Stores -->
                 <!-- Related Stores -->
                 <div class="store-info-card card shadow-sm p-3 mb-5 bg-white rounded">
                    <h4 class="text-center mb-4">Related Stores</h4>
                    <div class="row row-cols-2 gy-3">
                        @foreach ($relatedStores as $relatedStore)
                        <div class="col">
                            <div class="text-center">
                                @if ($relatedStore->store_image)
                                <img src="{{ asset('uploads/store/' . $relatedStore->store_image) }}" class="logo img-fluid rounded-circle mb-3" alt="{{ $relatedStore->name }}">
                                @endif
                                <h5>{{ $relatedStore->name }}</h5>
                                <br>
                                @if ($relatedStore->slug)
                                <a href="{{ route('store_details', ['slug' => Str::slug($relatedStore->slug)]) }}" class="btn-sm get">Visit store</a>
                                @else
                                   <p>no slug/url</p>
                                @endif

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
        </div>
    </div>
    <br><br>
</div>

<x-footer/>


<script>
    function toggleCouponCode(couponId) {
        // Send an AJAX request to update the click count and toggle visibility
        $.ajax({
            url: "{{ route('update.clicks') }}", // The route to update clicks
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                coupon_id: couponId,
            },
            success: function(response) {
                const codeElement = document.getElementById(`codeIndex${couponId}`);
                const copyButton = document.getElementById(`copyBtn${couponId}`);

                if (codeElement.classList.contains('scratch')) {
                    codeElement.classList.remove('scratch');
                    copyButton.classList.remove('d-none');
                }
            },
            error: function(xhr) {
                console.error("An error occurred while processing the request:", xhr);
            }
        });
    }

    // Function to copy coupon code to clipboard
    function copyCouponCode(couponId) {
    const codeElement = document.getElementById(`codeIndex${couponId}`);
    const code = codeElement.innerText.trim();
    const copyMessage = document.getElementById(`copyMessage${couponId}`);

    navigator.clipboard.writeText(code)
        .then(() => {
            // Show success message
            copyMessage.classList.remove('d-none');
            // Hide the message after 3 seconds
            setTimeout(() => {
                copyMessage.classList.add('d-none');
            }, 3000);
        })
        .catch(err => {
            console.error('Failed to copy: ', err);
        });
}

    // Function to count clicks
    function countClicks(couponId) {
        document.getElementById('coupon_id').value = couponId;
        document.getElementById('clickForm').submit();
    }
    </script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
