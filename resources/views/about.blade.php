<?php
header("X-Robots-Tag:index, follow");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title>About Us - Best Deals and Discounts |BudgetHeaven</title>
     <meta name="description" content="Find the best deals, discounts, and coupons on BudgetHeaven. Save money on your favorite products from top brands.">

 <meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing">

  <meta name="author" content="John Doe">
 <meta name="robots" content="index, follow">

<link rel="canonical" href="https://budgetheaven.com/about">

  <link rel="icon" href="{{ asset('images/icons.png') }}" type="image/x-icon">
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


  </style>
</head>
<body>
<x-nav/>

<div class="container">
<main>
  <section class="about">
    <div class="container py-5 bg-light">
      <h1 class="text-center display-4">About Budget Heaven</h1>
    </div>
  </section>

 <section class="welcome-section py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 order-md-2">
        <img src="{{ asset('images/about.jpg') }}" alt="About Us Image" class="img-fluid custom-thumbnail">

      </div>
      <div class="col-md-6 order-md-1">
        <h1 class="display-4">Welcome to Budget Heaven</h1> <p class="lead">Your ultimate destination for savvy shoppers seeking to unlock the secret to saving money while indulging in their favorite shopping sprees. We are more than just a website; we are your trusted companion in the world of discounts, deals, promo codes, bundle offers, comparisons, and invaluable money-saving tips.</p>
      </div>
    </div>
  </div>
</section>

  <section class="vision-section bg-light py-5">
    <div class="container">
      <h2>Our Vision</h2>
      <p>Budget Heaven was born out of the desire to create a haven for frugal-minded individuals, a place where saving money is not just a hobby but a way of life. Our vision is to empower you to be a smart and informed shopper, giving you the tools and resources you need to enjoy a fulfilling shopping experience without breaking the bank.</p>
    </div>
  </section>

<section class="offer-section py-5">
  <div class="container">
    <h2>What We Offer</h2>
    <div class="row row-cols-1 row-cols-md-2 g-4">
      <div class="col">
        <i class="fas fa-tags text-primary fs-3 mb-3"></i>
        <h5>Discount Codes</h5>
        <p>We curate a wide range of discount codes from your favorite brands and retailers.</p>
      </div>
      <div class="col">
        <i class="fas fa-fire text-warning fs-3 mb-3"></i>
        <h5>Deals and Promotions</h5>
        <p>Discover the latest and hottest deals, ensuring you never miss out on a saving opportunity.</p>
      </div>
      <div class="col">
        <i class="fas fa-boxes text-info fs-3 mb-3"></i>
        <h5>Bundle Offers</h5>
        <p>Save even more by exploring our curated product bundles designed to maximize your savings.</p>
      </div>
      <div class="col">
        <i class="fas fa-balance-scale text-success fs-3 mb-3"></i>
        <h5>Product Comparisons</h5>
        <p>Make informed decisions with detailed product comparisons to choose the best option for your needs and budget.</li>
      </div>
      <div class="col">
        <i class="fas fa-lightbulb text-light fs-3 mb-3"></i> <h5>Money-Saving Blogs</h5>
        <p>Our blog section is filled with tips, tricks, and articles on frugal living, budgeting, and money-saving strategies.</li>
      </div>
    </div>
  </div>
</section>


<section class="why-choose-section bg-light py-5">
  <div class="container">
    <h2>Why Choose Budget Heaven?</h2>
    <div class="row row-cols-1 row-cols-md-2 g-4">
      <div class="col">
        <div class="d-flex align-items-center">
          <i class="fas fa-check-circle text-primary fs-3 me-3"></i>
          <div>
            <h5 class="card-title">Trustworthy Information</h5>
            <p class="mb-0">We pride ourselves on providing accurate and up-to-date information.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="d-flex align-items-center">
          <i class="fas fa-star text-warning fs-3 me-3"></i>
          <div>
            <h5 class="card-title">Diverse Range of Deals</h5>
            <p class="mb-0">We have deals to cater to your diverse shopping preferences.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="d-flex align-items-center">
          <i class="fas fa-users text-info fs-3 me-3"></i>
          <div>
            <h5 class="card-title">Community and Support</h5>
            <p class="mb-0">Our community offers support and shares money-saving experiences.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="d-flex align-items-center">
          <i class="fas fa-shopping-cart text-success fs-3 me-3"></i>
          <div>
            <h5 class="card-title">Your Frugal Shopping Partner</h5>
            <p class="mb-0">Budget Heaven is your partner in the quest for frugal living.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</main>
</div>
<br>
<x-footer/>


</body>
</html>
