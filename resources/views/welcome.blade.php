@extends('main')
@section('title')
    Dashboard
@endsection
@section('main-content')
<div class="container">
<div class="row mb-4">
    <div class="col-12 ">
      <h2 class="title">Top Deals Today</h2>
    </div>
    </div>
    <div class="row coupon-grid g-4">
    @foreach ($Coupons as $coupon)
      <div class="col-md-4 col-sm-6">
        <div class="coupon-card  h-100 card rounded shadow">
          @php
            // Retrieve associated store and handle unavailable images
            $store = App\Models\Stores::where('slug', $coupon->store)->first();
          @endphp

          <div class="coupon-header">
            @if ($store && $store->store_image)
              <img src="{{ asset('uploads/stores/' . $store->store_image) }}"
                   alt="{{ $store->name }} Image" class="coupon-image"
                   loading="lazy">
            @else
              <div class="no-image-placeholder bg-light text-center py-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-image-fill" viewBox="0 0 16 16">
                    <path d="M.002 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-12a2 2 0 0 1-2-2zm1 9v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V9.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062zm5-6.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
                  </svg>
                 <p>no image </p>
              </div>
            @endif
          </div>

          <div class="coupon-body p-4">
            <h4 class="coupon-store mb-3 text-dark font-italic">{{ $coupon->store }}</h4>
            <h6 class="coupon-description ">{{ $coupon->name }}</h6>


<a href="{{ $coupon->destination_url }}" class="btn btn-dark "
    target="_blank">Get Deal</a>

<span>{{ $coupon->created_at }}</span>

    @if ($coupon->store)
    <a href="{{ route('store_details', ['slug' => Str::slug($coupon->store)]) }}"
    class="btn btn-primary ">Visit Store</a>
    @else
    <a href="#"
    class="get ">no store name</a>
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
    </div></div>
    <script src="{{ asset('front/assets/js/java.js') }}"></script>
@endsection
