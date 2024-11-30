<?php
header("X-Robots-Tag:index, follow");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title>About Us - Best Deals and Discounts |CouponsArena</title>
     <meta name="description" content="Find the best deals, discounts, and coupons on CouponsArena. Save money on your favorite products from top brands.">

 <meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing">

  <meta name="author" content="John Doe">
 <meta name="robots" content="index, follow">

<link rel="canonical" href="https://CouponsArena.com/about">

  <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
     <link rel="icon" href="{{ asset('front/assets/images/logo-01.png') }}"  type="image/x-icon">


  <style>
  body{
      background-color:white;
  }

main{
     font-family: Nunito,Normal;
}

 .footer{
              background-color:red;
        }
        .custom-thumbnail {
    border: 8px solid #bebebe; /* Increase the border size and change color if needed */
    border-radius: 5px; /* Optional: keeps the thumbnail's rounded corners */
}

        .breadcrumb {
            background-color: #f8f9fa;
            font-size: 1.1rem;
            font-weight: 500;
        }

        .breadcrumb-item a:hover {
            text-decoration: underline;
            color: #0d6efd;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            content: ">";
            color: #6c757d;
            padding: 0 0.5rem;
        }

        .breadcrumb-item.active {
            font-weight: bold;
        }
    </style>

</head>
<body>
    @include('components.navbar')

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light shadow-sm p-3 rounded">
            <li class="breadcrumb-item">
                <a href="/" class="text-decoration-none text-primary">Home</a>
            </li>
            <li class="breadcrumb-item active text-secondary" aria-current="page">@lang('message.About-Us')</li>
        </ol>
    </nav>

    <div class="text-main">
                        <h1 class="page-heading"></h1>
            <header>
<h2>
   @lang('about.heading-1')</h2>
</header>
<section>
<p>
   @lang('about.heading-2')</p>
<h2>@lang('about.heading-3')    </h2>
<p>
   @lang('about.heading-4')</p>
<h2>
    @lang('about.heading-5')</h2>
<p>
    @lang('about.heading-6')</p>
<h3>
   @lang('about.heading-7')</h3>
<p>
   @lang('about.heading-8')</p>
<h3>
    @lang('about.heading-9')</h3>
<p>
    @lang('about.heading-10')</p>
<h3>
   @lang('about.heading-11')</h3>
<p>   @lang('about.heading-12')</p>
<h3>
    @lang('about.heading-13')
 </h3>
<p>
    @lang('about.heading-14').</p>
<p>@lang('about.heading-15').
  </p>
<h2>
    @lang('about.heading-16')</h2>
<p>@lang('about.heading-17')</p>
<ul>
    <li>
        {{-- <strong>@lang('about.Exclusive Offers:')</strong> --}}
         @lang('about.Access promotions you wont find anywhere else')</li>
    <li>
        {{-- <strong>@lang('about.Personalized Recommendations:')</strong> --}}
         @lang('about.Tailored deals based on your preferences.')</li>
    <li>
        {{-- <strong>@lang('about.Real-Time Savings:')</strong> --}}
        @lang('about.Stay ahead with the latest and most up-to-date coupons.')</li>
    <li>
        {{-- <strong>@lang('about.Community Engagement:')</strong> --}}
        @lang('about. Connect with fellow savers, share tips, and celebrate your successes.')<br />
         </li>
</ul>
<h2>@lang('about.heading-18')
    </h2>
<p>
    @lang('about.heading-19')</p>
<h2>
   @lang('about.heading-20')</h2>
<p> @lang('about.heading-21')</p>
<p>
    @lang('about.heading-22')</p>
</section>

    </div>
</div>
</div>
@include('components.footer')

</body>
</html>
