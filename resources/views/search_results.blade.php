@extends('main')
@section('title', 'Search')
@section('description','')
@section('keywords','')
@section('main-content')

<style>
    .card {
        transition: all 0.3s ease;
        border: none;
        border-radius: 12px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0,0,0,0.1);
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .card:hover .card-img-top {
        transform: scale(1.05);
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #333;
        margin-top: 15px;
        line-height: 1.4;
        min-height: 48px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .anchor-search {
        text-decoration: none;
        color: inherit;
    }

    .breadcrumb {
        border-radius: 10px;
        margin-bottom: 30px;
    }

    .pagination {
        margin-top: 40px;
        justify-content: center;
    }

    .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
    }

    .page-link {
        color: #007bff;
        transition: all 0.3s ease;
    }

    .page-link:hover {
        color: #0056b3;
        transform: translateX(3px);
    }


    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .animate-fade-in {
        animation: fadeIn 0.5s ease-in;
    }
</style>

<div class="container animate-fade-in">
    <nav aria-label="breadcrumb" style="background-color: #f8f9fa; border-radius: 10px; padding: 12px;">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a href="/" class="text-decoration-none text-primary">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Search Results</li>
        </ol>
    </nav>

    <h3 class="mt-4 mb-3 text-primary" style="font-weight: 700; letter-spacing: -0.5px;">
        Search Results
        <small class="text-muted fs-5">({{ $stores->total() }} results)</small>
    </h3>

    <div class="row g-4">
        @if ($stores->isEmpty())
            <div class="col-12 text-center py-5">
                <img src="{{ asset('front/assets/images/no-results.png') }}"
                     alt="No results"
                     style="max-width: 200px; opacity: 0.6;">
                <h4 class="mt-3 text-muted">No stores found</h4>
                <p class="text-secondary">Try adjusting your search criteria and try again</p>
            </div>
        @else
            @foreach ($stores as $store)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        @php
                            $language = $store->language ? $store->language->code : 'en';
                            $storeSlug = Str::slug($store->slug);
                            $storeurl = $store->slug
                                ? ($language === 'en'
                                    ? route('store_details', ['slug' => $storeSlug])
                                    : route('store_details.withLang', ['lang' => $language, 'slug' => $storeSlug]))
                                : '#';
                        @endphp
                        <a href="{{ $storeurl }}" class="anchor-search h-100 d-block">
                            <div class="position-relative">
                                <img src="{{ $store->store_image ?
                                            asset('uploads/stores/' . $store->store_image) :
                                            asset('front/assets/images/no-image-found.jpg') }}"
                                     class="card-img-top">
                                <div class="position-absolute bottom-0 w-100 px-3 pb-3">
                                    <h5 class="card-title mb-0">{{ $store->name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <div class="d-flex justify-content-center mt-5">
        {{ $stores->links('vendor.pagination.custom') }}
    </div>
</div>


<script>

    // Add copy protection with nicer alerts
    document.addEventListener('copy', function(e) {
        e.preventDefault();
        Swal.fire({
            icon: 'info',
            title: 'Copying Disabled',
            text: 'Copying content is not allowed on this page',
            confirmButtonText: 'Okay'
        });
    });

    document.addEventListener('contextmenu', function(e) {
        if (e.target.tagName === 'IMG') {
            e.preventDefault();
            Swal.fire({
                icon: 'warning',
                title: 'Right-click Disabled',
                text: 'Saving images is not permitted',
                confirmButtonText: 'Understood'
            });
        }
    });
</script>

@endsection
