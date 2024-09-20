@extends('main')
@section('title')
    Dashboard
@endsection
@section('main-content')
  <!-- Custom CSS for Styling -->
  <style>
    .conatain{

       padding: 5%;
    }
    .coupon-card {
    transition: transform 0.5s ease-in-out, box-shadow 0.5s ease-in-out, border 0.5s ease-in-out;
}

.coupon-card:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2); /* Larger shadow with a darker color */
    border: 2px solid #0054a6;
}



    .coupon-image {
      width: 100%;
      height: 150px;
      object-fit: contain;
      padding: 10px;
      background-color: #f9f9f9;
      border-bottom: 1px solid #ddd;
    }

    .no-image-placeholder {
      height: 150px;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f8f9fa;
    }

    .coupon-body {
      text-align: left;
      padding-left: 12px;
      padding-right: 12px;
    }

    .btn {
background-color: #0054a6;
color: white;
    }
    .btn:hover{
        background-color: #237cd4;
        color: black;
    }

    .modal-content {
      background: #f7f7f7;
    }
  </style>

<div class="conatain">
    <div class="row mb-4">
      <div class="col-12">
        <h2 class="title text-center">Trending Promo Codes To Save Everyday</h2>
      </div>
    </div>
    <div class="row coupon-grid g-4">
      @foreach ($topcoupon as $coupon)
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="coupon-card h-100 card rounded ">
          @php
          // Retrieve associated store and handle unavailable images
          $store = App\Models\Stores::where('slug', $coupon->store)->first();
          @endphp

          <div class="coupon-header text-center">
            @if ($store && $store->store_image)
            <img src="{{ asset('uploads/stores/' . $store->store_image) }}"
                 alt="{{ $store->name }} Image" class="coupon-image img-fluid"
                 loading="lazy">
            @else
            <div class="no-image-placeholder bg-light text-center py-4">
              <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-image-fill" viewBox="0 0 16 16">
                <path d="M.002 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-12a2 2 0 0 1-2-2zm1 9v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V9.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062zm5-6.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
              </svg>
              <p>No image available</p>
            </div>
            @endif
          </div>

          <div class="mb-4 coupon-body py-3 ">

            <h6 class="text-left">{{ $coupon->name }}</h6>
            <span class="d-block mb-2 {{ \Carbon\Carbon::parse($coupon->ending_date)->isPast() ? 'text-danger' : 'text-muted' }}">
                Ends: {{ \Carbon\Carbon::parse($coupon->ending_date)->format('d M, Y') }}
            </span>

            <div class="d-grid gap-2">
                <a href="{{ $coupon->code }}" class="btn btn-dark" target="_blank">Get Code</a>
            </div>

        </div>



        </div>
      </div>

      <!-- Modal for Coupon Code -->
      <div class="modal fade" id="codeModal{{ $coupon->id }}" tabindex="-1"
           aria-labelledby="exampleModalLabel{{ $coupon->id }}" aria-hidden="true">
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

<div class="conatain">
    <div class="row mb-4">
      <div class="col-12">
        <h2 class="title text-center">Top Deals Today</h2>
      </div>
    </div>
    <div class="row coupon-grid g-4">
      @foreach ($Coupons as $coupon)
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="coupon-card h-100 card rounded ">
          @php
          // Retrieve associated store and handle unavailable images
          $store = App\Models\Stores::where('slug', $coupon->store)->first();
          @endphp

          <div class="coupon-header text-center">
            @if ($store && $store->store_image)
            <img src="{{ asset('uploads/stores/' . $store->store_image) }}"
                 alt="{{ $store->name }} Image" class="coupon-image img-fluid"
                 loading="lazy">
            @else
            <div class="no-image-placeholder bg-light text-center py-4">
              <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-image-fill" viewBox="0 0 16 16">
                <path d="M.002 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-12a2 2 0 0 1-2-2zm1 9v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V9.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062zm5-6.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
              </svg>
              <p>No image available</p>
            </div>
            @endif
          </div>

          <div class="mb-4 coupon-body py-3 ">

            <h6 class="text-left">{{ $coupon->name }}</h6>
            <span class="d-block mb-2 {{ \Carbon\Carbon::parse($coupon->ending_date)->isPast() ? 'text-danger' : 'text-muted' }}">
                Ends: {{ \Carbon\Carbon::parse($coupon->ending_date)->format('d M, Y') }}
            </span>

            <div class="d-grid gap-2">
                <a href="{{ $coupon->destination_url }}" class="btn btn-dark" target="_blank">Get Deal</a>
            </div>

        </div>



        </div>
      </div>

      <!-- Modal for Coupon Code -->
      <div class="modal fade" id="codeModal{{ $coupon->id }}" tabindex="-1"
           aria-labelledby="exampleModalLabel{{ $coupon->id }}" aria-hidden="true">
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


    <script src="{{ asset('front/assets/js/java.js') }}"></script>
@endsection
