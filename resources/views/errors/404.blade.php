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
<br><br>


    <footer>
        @include('components.footer')
    </footer>
    <script src="{{ asset('js/home.js') }}"></script>
</body>
</html>
