@extends('main')
@section('title')

@endsection
@section('main-content')
<!-- Custom CSS for Styling -->
 <style>
.blog{
    padding: 10px;
}
.item {
    position: relative;
    overflow: hidden;
}

.card-overlay {
    padding-left: 10px; 
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 140px; /* Height of the overlay at the bottom */
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black */
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
}

.item:hover .card-overlay {
    opacity: 1;
    background-color: rgba(0, 0, 0, 0.8); /* Slightly darker on hover */
}


.card-title {
    font-size: 18px;
    text-align: center;
}
.bg-light {
    position: relative;
}

.custom-prev-btn,
.custom-next-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent black */
    color: white;
    border: none;
    font-size: 24px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    cursor: pointer;
    z-index: 1000;
    transition: background-color 0.3s ease;
}

.custom-prev-btn:hover,
.custom-next-btn:hover {
    background-color: rgba(0, 0, 0, 0.8);
}

.custom-prev-btn {
    left: -10px; /* Adjust as needed */
}

.custom-next-btn {
    right: -10px; /* Adjust as needed */
}


 </style>

<main class=" container-fluid">
<section class="blog">
    <div class="bg-light position-relative">
        <div class="owl-carousel owl-theme">
            @foreach ($blogs as $blog)
            @php
            $blogurl = $blog->slug
            ? route('blog-details', ['slug' => Str::slug($blog->slug)])
            : '#';
            @endphp
                <div class="item">
                    <div class="card shadow-sm h-100 position-relative">
                        <a href="{{$blogurl }}" class=" text-white text-decoration-none">
                        <img class="cardimg" src="{{ asset($blog->category_image) }}" alt="Blog Post Image" style="height:450px; width:100%;">
                     
                        <div class="card-overlay">
                            
                                <span class="card-title">{{ $blog->title }}</span>
                            </a>
                   
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    
        <!-- Previous and Next Buttons -->
        <button class="custom-prev-btn">&#8249;</button>
        <button class="custom-next-btn">&#8250;</button>
    </div>
</section>
<section class=" my-4">
    <div class="row">
        <!-- Recent Posts Section (Left Side) -->
        <div class="col-md-4">
            <h2 class="text-dark mb-3">Trending Posts</h2>
            @foreach ($topblogs as $blog)
            @php
            $blogurl = $blog->slug
            ? route('blog-details', ['slug' => Str::slug($blog->slug)])
            : '#';
            @endphp
                <div class="d-flex mb-3">
                    <a href="{{ $blogurl }}" class="text-dark text-decoration-none">
                    <img src="{{ asset($blog->category_image) }}" alt="Blog Post Image" class="rounded" style="width: 100px; height: 100px; object-fit: cover; margin-right: 15px;">
                    <div>
   
                            <span>{{ $blog->title }}</span>
                        </a>

                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-md-8">
            <h2 class="text-dark mb-3">Shopping Hacks & Savings Tips & Tricks</h2>
            <div class="row">
                @foreach ($todayblogs as $blog)
                @php
                $blogurl = $blog->slug
                ? route('blog-details', ['slug' => Str::slug($blog->slug)])
                : '#';
                @endphp
                    <div class="col-12 col-sm-6 col-md-4 mb-4"> <!-- Adjust column sizes for different screen sizes -->
                        <div class="card shadow-sm h-100">
                            <a href="{{ $blogurl }}" class="text-dark text-decoration-none">
                                <img class="card-img-top" src="{{ asset($blog->category_image) }}" alt="Blog Post Image" style="height: 150px; ">
                                <div class="card-body text-left">
                                    <h6 class="card-title mb-4">{{ $blog->title }}</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        
        </div>
    </div>
</section>


    
    <section>
        
    </section>

     
</main>
    
    <script>
$(document).ready(function () {
    var owl = $(".owl-carousel");

    // Initialize Owl Carousel
    owl.owlCarousel({
        loop: true, // Enables infinite loop
        margin: 10,
        nav: false, // Disable default navigation
        dots: true, // Show dots below the carousel
        autoplay: true, // Optional: Adds autoplay
        autoplayTimeout: 3000, // Optional: Time between slides
        autoplayHoverPause: true, // Optional: Pause on hover
        responsive: {
            0: {
                items: 1, // Show 1 item on small screens
            },
            600: {
                items: 2, // Show 2 items on medium screens
            },
            1000: {
                items: 3, // Show 3 items on large screens
            },
        },
    });

    // Custom Navigation Buttons
    $(".custom-prev-btn").click(function () {
        owl.trigger("prev.owl.carousel");
    });

    $(".custom-next-btn").click(function () {
        owl.trigger("next.owl.carousel");
    });
});

    </script>
    


@endsection
