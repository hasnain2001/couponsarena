<?php
header("X-Robots-Tag:index, follow");
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title>Contact - Best Deals and Discounts |BudgetHeaven</title>
     <meta name="description" content="Find the best deals, discounts, and coupons on BudgetHeaven. Save money on your favorite products from top brands.">

 <meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing">

  <meta name="author" content="John Doe">
 <meta name="robots" content="index, follow">
    <link rel="icon" href="{{ asset('images/icons.png') }}" type="image/x-icon">
<link rel="canonical" href="https://budgetheaven.com/about">
    <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
      



</head>
<body>
<x-nav/>
<section class="contact-us py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mb-4 mb-md-0">
        <img src="images/contactus.jpg" alt="Company Image" class="img-fluid rounded shadow-sm" style="height:400px; width:100%;">
      </div>
      <div class="col-md-6">
        <h1 class="display-4 text-center mb-4">Contact Us</h1>
        <form action="#" method="POST" class="row justify-content-center">
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label for="firstName" class="form-label">First Name</label>
              <input type="text" class="form-control" id="firstName" name="firstName" required>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label for="lastName" class="form-label">Last Name</label>
              <input type="text" class="form-control" id="lastName" name="lastName" required>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label for="website" class="form-label">Website Name</label>
              <input type="text" class="form-control" id="website" name="website" required>
            </div>
          </div>
          <div class="col-12 mb-3">
            <div class="form-group">
              <label for="message" class="form-label">Write your message</label>
              <textarea class="form-control" id="message" name="message" rows="8" required></textarea>
            </div>
          </div>
          <button type="submit" class="btn btn-dark btn-lg">Submit</button>
        </form>
      </div>
      <div class="col-5 mt-4">

        <div class="embed-responsive embed-responsive-16by9">
<!-- for map div---->
        </div>
      </div>
    </div>
  </div>
</section>


<br>
   <br>
<x-footer/>

</body>
</html>
