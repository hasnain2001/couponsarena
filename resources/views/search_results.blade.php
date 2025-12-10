@extends('main')
@section('title', 'Search Results - Find Your Favorite Stores')
@section('description','Discover amazing stores and deals. Find the best coupon codes and discounts for your favorite brands.')
@section('keywords','search, stores, deals, discounts, coupons, brands, shopping')

@section('main-content')

<div class="search-results-page">
    <!-- Hero Section -->
    <section class="search-hero py-2 mb-5">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="hero-title display-5 fw-bold mb-3">Search Results</h1>
                    <p class="hero-subtitle lead mb-4">
                        Discover amazing stores matching your search criteria
                    </p>
                    <div class="search-stats">
                        <span class="badge bg-primary fs-6">
                            <i class="fas fa-search me-2"></i>
                            {{ $stores->total() }} results found
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/" class="text-decoration-none">
                        <i class="fas fa-home me-2"></i>Home
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-search me-2"></i>Search Results
                </li>
            </ol>
        </nav>

        <!-- Search Header -->
        <div class="search-header mb-5">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2 class="search-results-title mb-2">
                        Stores Matching Your Search
                    </h2>
                    <p class="search-results-subtitle text-muted mb-0">
                        Found {{ $stores->total() }} store{{ $stores->total() !== 1 ? 's' : '' }} for you
                    </p>
                </div>
                <div class="col-md-4 text-md-end">
                    <div class="search-sort">
                        <select class="form-select form-select-sm" style="max-width: 200px;">
                            <option>Sort by: Relevance</option>
                            <option>Sort by: Name A-Z</option>
                            <option>Sort by: Most Popular</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search Results Grid -->
        @if ($stores->isEmpty())
        <div class="empty-search-state text-center py-8">
            <div class="empty-icon mb-4">
                <i class="fas fa-search fa-4x text-muted"></i>
            </div>
            <h3 class="text-muted mb-3">No Stores Found</h3>
            <p class="text-muted mb-4">Try adjusting your search criteria or browse our popular categories</p>
            <div class="empty-actions">
                <a href="/stores" class="btn btn-primary me-3">
                    <i class="fas fa-store me-2"></i>Browse All Stores
                </a>
                <a href="/categories" class="btn btn-outline-primary">
                    <i class="fas fa-tags me-2"></i>Explore Categories
                </a>
            </div>
        </div>
        @else
        <div class="search-results-grid">
            <div class="row g-4">
                @foreach ($stores as $store)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="store-search-card card border-0 shadow-sm h-100">
                        <a href="{{  route('store_details', ['slug' => Str::slug($store->slug)]) }}" class="store-search-link text-decoration-none">
                            <div class="store-image-container">
                                <img src="{{ $store->store_image ?
                                            asset('uploads/stores/' . $store->store_image) :
                                            asset('front/assets/images/no-image-found.jpg') }}"
                                     class="store-search-image"
                                     alt="{{ $store->name }}"
                                     loading="lazy">
                                <div class="store-overlay">
                                    <span class="view-store-btn">
                                        View Store <i class="fas fa-arrow-right ms-1"></i>
                                    </span>
                                </div>
                                <div class="store-badge">
                                    <i class="fas fa-store me-1"></i>
                                    {{ $store->coupons()->count() ?? 0 }} offers
                                </div>
                            </div>
                            <div class="card-body text-center p-3">
                                <h5 class="store-search-title mb-2">{{ $store->name }}</h5>
                                <div class="store-search-meta">
                                    <small class="text-muted">
                                        <i class="fas fa-tag me-1"></i>
                                        {{ $store->category ?? 'General' }}
                                    </small>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Pagination -->
        @if($stores->hasPages())
        <div class="search-pagination mt-6">
            <nav aria-label="Search results pagination">
                {{ $stores->links('vendor.pagination.custom') }}
            </nav>
        </div>
        @endif

        {{-- <!-- Popular Categories Suggestion -->
        @if(!$stores->isEmpty())
        <section class="popular-categories mt-6 pt-5 border-top">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h3 class="mb-4">Can't Find What You're Looking For?</h3>
                    <p class="text-muted mb-4">Browse our popular categories to discover more amazing stores</p>
                    <div class="categories-suggestions">
                        <a href="/categories/fashion" class="btn btn-outline-primary btn-sm me-2 mb-2">Fashion</a>
                        <a href="/categories/electronics" class="btn btn-outline-primary btn-sm me-2 mb-2">Electronics</a>
                        <a href="/categories/home-garden" class="btn btn-outline-primary btn-sm me-2 mb-2">Home & Garden</a>
                        <a href="/categories/beauty" class="btn btn-outline-primary btn-sm me-2 mb-2">Beauty</a>
                        <a href="/categories/food-drink" class="btn btn-outline-primary btn-sm me-2 mb-2">Food & Drink</a>
                        <a href="/categories/travel" class="btn btn-outline-primary btn-sm me-2 mb-2">Travel</a>
                    </div>
                </div>
            </div>
        </section>
        @endif --}}
    </div>
</div>

@endsection

@push('styles')
<style>
:root {
    --primary-color: #2e2bb1;
    --secondary-color: #791291;
    --text-dark: #2d3748;
    --text-light: #718096;
    --bg-light: #f7fafc;
    --border-radius: 12px;
    --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

/* Hero Section */
.search-hero {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    position: relative;
    overflow: hidden;
}

.search-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}

.hero-title {
    font-weight: 800;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.hero-subtitle {
    opacity: 0.9;
    font-weight: 300;
}

.search-stats .badge {
    font-size: 1rem;
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
}

/* Breadcrumb */
.breadcrumb {
    background: var(--bg-light);
    border-radius: 10px;
    padding: 12px 20px;
    border: 1px solid #e2e8f0;
}

.breadcrumb-item a {
    color: var(--primary-color);
    font-weight: 500;
}

.breadcrumb-item.active {
    color: var(--text-light);
    font-weight: 600;
}

/* Search Header */
.search-header {
    background: white;
    padding: 2rem;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
}

.search-results-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--text-dark);
}

.search-results-subtitle {
    font-size: 1rem;
}

.search-sort .form-select {
    border-radius: 8px;
    border: 1px solid #e2e8f0;
}

.search-sort .form-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(46, 43, 177, 0.25);
}

/* Store Cards */
.store-search-card {
    transition: all 0.3s ease;
    border-radius: var(--border-radius);
    overflow: hidden;
    background: white;
}

.store-search-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
}

.store-search-link {
    color: inherit;
}

.store-search-link:hover {
    text-decoration: none;
    color: inherit;
}

.store-image-container {
    position: relative;
    overflow: hidden;
    background: var(--bg-light);
    height: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.store-search-image {
    width: 100%;
    height: 100%;
    object-fit: contain;
    transition: all 0.3s ease;
}

.store-search-card:hover .store-search-image {
    transform: scale(1.1);
}

.store-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(46, 43, 177, 0.9);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all 0.3s ease;
}

.store-search-card:hover .store-overlay {
    opacity: 1;
}

.view-store-btn {
    color: white;
    font-weight: 600;
    font-size: 1rem;
}

.store-badge {
    position: absolute;
    top: 12px;
    right: 12px;
    background: rgba(255, 255, 255, 0.95);
    color: var(--primary-color);
    padding: 4px 8px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    backdrop-filter: blur(10px);
}

.store-search-title {
    font-weight: 600;
    color: var(--text-dark);
    line-height: 1.3;
    margin-bottom: 0.5rem;
    font-size: 1rem;
    min-height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.store-search-meta {
    font-size: 0.85rem;
}

/* Empty State */
.empty-search-state {
    background: var(--bg-light);
    border-radius: var(--border-radius);
    border: 2px dashed #e2e8f0;
}

.empty-icon {
    color: #cbd5e0;
}

.empty-actions .btn {
    margin: 0.25rem;
}

/* Popular Categories */
.popular-categories {
    background: var(--bg-light);
    border-radius: var(--border-radius);
    padding: 3rem 2rem;
}

.categories-suggestions .btn {
    border-radius: 20px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.categories-suggestions .btn:hover {
    transform: translateY(-2px);
}

/* Buttons */
.btn-primary {
    background: linear-gradient(135deg, var(--primary-color), #4a46d4);
    border: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #25219c, var(--primary-color));
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(46, 43, 177, 0.3);
}

.btn-outline-primary {
    border: 2px solid var(--primary-color);
    color: var(--primary-color);
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-outline-primary:hover {
    background-color: var(--primary-color);
    color: white;
    transform: translateY(-2px);
}

/* Animations */
.store-search-card {
    animation: fadeInUp 0.6s ease;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Stagger animation for cards */
.store-search-card:nth-child(1) { animation-delay: 0.1s; }
.store-search-card:nth-child(2) { animation-delay: 0.2s; }
.store-search-card:nth-child(3) { animation-delay: 0.3s; }
.store-search-card:nth-child(4) { animation-delay: 0.4s; }

/* Responsive Design */
@media (max-width: 1200px) {
    .col-xl-3 {
        flex: 0 0 25%;
        max-width: 25%;
    }
}

@media (max-width: 992px) {
    .col-lg-4 {
        flex: 0 0 33.333%;
        max-width: 33.333%;
    }

    .search-hero {
        padding: 3rem 1rem !important;
    }

    .hero-title {
        font-size: 2.5rem;
    }
}

@media (max-width: 768px) {
    .col-md-6 {
        flex: 0 0 50%;
        max-width: 50%;
    }

    .search-header {
        padding: 1.5rem;
    }

    .search-results-title {
        font-size: 1.5rem;
    }

    .store-image-container {
        height: 180px;
    }

    .store-search-title {
        font-size: 0.9rem;
        min-height: 42px;
    }
}

@media (max-width: 576px) {
    .col-md-6 {
        flex: 0 0 100%;
        max-width: 100%;
    }

    .search-header .row {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }

    .search-sort .form-select {
        max-width: 100% !important;
    }

    .store-image-container {
        height: 160px;
    }

    .empty-actions {
        flex-direction: column;
        gap: 1rem;
    }

    .empty-actions .btn {
        width: 100%;
        margin: 0 !important;
    }
}

/* Ensure good contrast and accessibility */
.store-search-link:focus {
    outline: 2px solid var(--primary-color);
    outline-offset: 2px;
    border-radius: var(--border-radius);
}

.store-search-link:focus .store-search-card {
    box-shadow: 0 0 0 3px rgba(46, 43, 177, 0.3);
}
</style>
@endpush

@push('scripts')
<script>
// Add smooth scrolling to search results
document.addEventListener('DOMContentLoaded', function() {
    // Add loading animation to cards
    const cards = document.querySelectorAll('.store-search-card');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
    });

    // Add search functionality enhancements
    const searchSort = document.querySelector('.search-sort select');
    if (searchSort) {
        searchSort.addEventListener('change', function() {
            // Add sorting functionality here
            console.log('Sorting by:', this.value);
        });
    }
});

// Enhanced copy protection with user-friendly messages
document.addEventListener('copy', function(e) {
    e.preventDefault();
    showToast('🔒 Copying content is disabled for security reasons', 'info');
});

document.addEventListener('contextmenu', function(e) {
    if (e.target.tagName === 'IMG') {
        e.preventDefault();
        showToast('🛡️ Image saving is disabled', 'warning');
    }
});

function showToast(message, type = 'info') {
    // Create toast element
    const toast = document.createElement('div');
    toast.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
    toast.style.cssText = `
        top: 20px;
        right: 20px;
        z-index: 9999;
        min-width: 300px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    `;

    toast.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;

    document.body.appendChild(toast);

    // Auto remove after 3 seconds
    setTimeout(() => {
        if (toast.parentNode) {
            toast.parentNode.removeChild(toast);
        }
    }, 3000);
}
</script>
@endpush
