<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
  
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
.button{
  background-color: #0054a6;
color: white;
}
.btn{
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
.title{
 color: #0054a6;
}
.top-store-name{
 color: #1e1e1f;
 font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
 font-size: 14px;
 padding: 5px 5px 5px 0;
}
.card-body-store{
 color: #1e1e1f;
 background-color: #dbdbdb;
 border-radius:5%;
}

.card-body-store {
height: 100%; /* Ensure the store name takes full height */
padding: 15px;
}
.top-store-name {
white-space: nowrap; 
overflow: hidden; 
text-overflow:ellipsis; 
max-width: 100%; 
}
@media (max-width: 768px) {
.top-store-name {
   white-space: normal; 
}
}
    </style>
</head>
<body>
   <x-navbar/>
    <br>
    <div class="container py-6">
    <div class="error-container">
        <h1>404</h1>
        <h2>Oops! The page you're looking for isn't here.</h2>
        <p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
        <a href="javascript:void(0);" class=" btn btn-dark " onclick="history.back();">Go to Previous Page</a>

    </div> </div> 

    <div class="conatain">
      <div class="row mb-4">
        <div class="col-12">
          <h2 class="title text-center">Trending Promo Codes To Save Everyday</h2>
        </div>
      </div>
      <div class="row coupon-grid g-4">
        @foreach ($topcoupon as $coupon)
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="  card rounded ">
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
                <span>{{ $coupon->store }}</span>
  
  
              </div>
  
                        @endif
            </div>
  
            <div class="mb-4 coupon-body py-3 ">
  
              <h6 class="text-left">{{ $coupon->name }}</h6>
              <span class="d-block mb-2 {{ \Carbon\Carbon::parse($coupon->ending_date)->isPast() ? 'text-danger' : 'text-muted' }}">
                  Ends: {{ \Carbon\Carbon::parse($coupon->ending_date)->format('d M, Y') }}
              </span>
  
              <div class="d-grid gap-2">
  
                  <a href="{{ $coupon->destination_url }}" target="_blank" class=" btn  btn-sm btn-primary btn-hover" id="getCode{{ $coupon->id }}" onclick="toggleCouponCode('{{ $coupon->id }}')">Get Code</a>
                  <div class="coupon-card d-flex flex-column">
                      <span class="codeindex text-dark scratch" style="display: none;" id="codeIndex{{ $coupon->id }}">{{ $coupon->code }}</span>
                      <button class="btn btn-info text-white btn-sm copy-btn btn-hover d-none mt-2" id="copyBtn{{ $coupon->id }}" onclick="copyCouponCode('{{ $coupon->id }}')">Copy Code</button>
                      <p class="text-success copy-confirmation d-none mt-3" id="copyConfirmation{{ $coupon->id }}">Code copied!</p>
  
                      <form method="post" action="{{ route('update.clicks') }}" id="clickForm">
                          @csrf
                          <input type="hidden" name="coupon_id" id="coupon_id">
                      </form>
                  </div>
                  <p class="used font-weight-bold mt-2" id="output_{{ $coupon->id }}">Used By: {{ $coupon->clicks }}</p>
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
         <span>{{ $coupon->store }}</span>
  
              </div>
  
              @endif
  
            </div>
  
            <div class="mb-4 coupon-body py-3 ">
  
              <h6 class="text-left">{{ $coupon->name }}</h6>
              <span class="d-block mb-2 {{ \Carbon\Carbon::parse($coupon->ending_date)->isPast() ? 'text-danger' : 'text-muted' }}">
                  Ends: {{ \Carbon\Carbon::parse($coupon->ending_date)->format('d M, Y') }}
              </span>
  
              <div class="d-grid gap-2">
                  <a href="{{ $coupon->destination_url }}" class="btn " style="background-color: #0054a6; color:#dbdbdb;" onclick="updateClickCount('{{ $coupon->id }}')" target="_blank">Get Deal</a>
                  <form method="post" action="{{ route('update.clicks') }}" id="clickForm">
                      @csrf
                      <input type="hidden" name="coupon_id" id="coupon_id">
                  </form>
              </div>
              <p class="used font-weight-bold mt-2" id="output_{{ $coupon->id }}">Used By: {{ $coupon->clicks }}</p>
          </div>
  
  
  
          </div>
        </div>
  
  
        @endforeach
      </div>
    </div>     
<br><br>


    <footer>
        @include('components.footer')
    </footer>
    <script src="{{ asset('js/home.js') }}"></script>
</body>
</html>
