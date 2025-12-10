@extends('admin.layouts.master')
@section('title')
   Admin Dashboard
@endsection
@section('main-content')
    <div class="content-wrapper">

        <!-- Welcome Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-gradient">Admin Dashboard</h1>
                        <p class="text-muted">Welcome back, {{ auth()->user()->name ?? 'Admin' }}! <span class="text-success">👋</span></p>
                    </div>
                    <div class="col-sm-6 text-sm-right">
                        <div class="alert alert-success alert-dismissible fade show d-inline-block mb-0" role="alert">
                            <i class="fas fa-check-circle"></i> {{ __("You're logged in!") }}
                            <span class="ml-2 badge badge-light">{{ now()->format('l, F j, Y') }}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <section class="content">
            <div class="container-fluid">
                <!-- Quick Stats Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0">
                                <i class="fas fa-chart-line text-primary mr-2"></i><span class="text-gradient">Quick Stats</span>
                            </h5>
                            <div class="btn-group btn-group-sm" role="group">
                                <button type="button" class="btn btn-outline-secondary active" data-period="today">Today</button>
                                <button type="button" class="btn btn-outline-secondary" data-period="week">Week</button>
                                <button type="button" class="btn btn-outline-secondary" data-period="month">Month</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Stores Card -->
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="card card-stats shadow-lg border-0">
                            <div class="card-body p-3">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="icon-shape icon-xl bg-gradient-orange text-white rounded-10 shadow">
                                            <i class="fas fa-store"></i>
                                        </div>
                                    </div>
                                    <div class="col ml--2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="card-title text-uppercase text-muted mb-0">Total Stores</h6>
                                                <h2 class="mb-0 stores-count">{{ $stores->count() }}</h2>
                                            </div>
                                            <div class="text-right">
                                                <div class="trend-indicator">
                                                    <i class="fas fa-arrow-up text-success"></i>
                                                    <span class="text-success font-weight-bold">12.5%</span>
                                                </div>
                                                <small class="text-muted">vs last month</small>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <div class="progress-wrapper">
                                                <div class="progress-info">
                                                    <span class="progress-label">Active Stores</span>
                                                    <span class="progress-value">{{ $activeStores ?? $stores->where('status', 'enable')->count() }}/{{ $stores->count() }}</span>
                                                </div>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-gradient-orange" role="progressbar"
                                                         style="width: {{ ($stores->where('status', 'enable')->count() / max($stores->count(), 1)) * 100 }}%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route('admin.store.index') }}" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Blogs Card -->
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="card card-stats shadow-lg border-0">
                            <div class="card-body p-3">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="icon-shape icon-xl bg-gradient-info text-white rounded-10 shadow">
                                            <i class="fas fa-blog"></i>
                                        </div>
                                    </div>
                                    <div class="col ml--2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="card-title text-uppercase text-muted mb-0">Total Blogs</h6>
                                                <h2 class="mb-0 blogs-count">{{ $blogs->count() }}</h2>
                                            </div>
                                            <div class="text-right">
                                                <div class="trend-indicator">
                                                    <i class="fas fa-arrow-up text-success"></i>
                                                    <span class="text-success font-weight-bold">8.3%</span>
                                                </div>
                                                <small class="text-muted">vs last month</small>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <div class="progress-wrapper">
                                                <div class="progress-info">
                                                    <span class="progress-label">Published</span>
                                                    <span class="progress-value">{{ $publishedBlogs ?? $blogs->where('status', 'enable')->count() }}/{{ $blogs->count() }}</span>
                                                </div>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-gradient-info" role="progressbar"
                                                         style="width: {{ ($blogs->where('status', 'enable')->count() / max($blogs->count(), 1)) * 100 }}%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route('admin.blog.index') }}" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Coupons Card -->
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="card card-stats shadow-lg border-0">
                            <div class="card-body p-3">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="icon-shape icon-xl bg-gradient-red text-white rounded-10 shadow">
                                            <i class="fas fa-ticket-alt"></i>
                                        </div>
                                    </div>
                                    <div class="col ml--2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="card-title text-uppercase text-muted mb-0">Total Coupons</h6>
                                                <h2 class="mb-0 coupons-count">{{ $coupons->count() }}</h2>
                                            </div>
                                            <div class="text-right">
                                                <div class="trend-indicator">
                                                    <i class="fas fa-arrow-up text-success"></i>
                                                    <span class="text-success font-weight-bold">15.2%</span>
                                                </div>
                                                <small class="text-muted">vs last month</small>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <div class="progress-wrapper">
                                                <div class="progress-info">
                                                    <span class="progress-label">Active Coupons</span>
                                                    <span class="progress-value">{{ $activeCoupons ?? $coupons->where('status', 'enable')->count() }}/{{ $coupons->count() }}</span>
                                                </div>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-gradient-red" role="progressbar"
                                                         style="width: {{ ($coupons->where('status', 'enable')->count() / max($coupons->count(), 1)) * 100 }}%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route('admin.coupon.index') }}" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Users Card -->
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="card card-stats shadow-lg border-0">
                            <div class="card-body p-3">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="icon-shape icon-xl bg-gradient-blue text-white rounded-10 shadow">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                    <div class="col ml--2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="card-title text-uppercase text-muted mb-0">Total Users</h6>
                                                <h2 class="mb-0 users-count">{{ $users->count() }}</h2>
                                            </div>
                                            <div class="text-right">
                                                <div class="trend-indicator">
                                                    <i class="fas fa-arrow-up text-success"></i>
                                                    <span class="text-success font-weight-bold">5.8%</span>
                                                </div>
                                                <small class="text-muted">vs last month</small>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <div class="progress-wrapper">
                                                <div class="progress-info">
                                                    <span class="progress-label">Today's Signups</span>
                                                    <span class="progress-value">{{ $todayUsers ?? 0 }}</span>
                                                </div>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-gradient-blue" role="progressbar"
                                                         style="width: min({{ ($todayUsers ?? 0) * 10 }}, 100)%">
                                                        <span class="progress-percentage">{{ $todayUsers ?? 0 }} new</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route('admin.user.index') }}" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Revenue Card -->
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="card card-stats shadow-lg border-0">
                            <div class="card-body p-3">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="icon-shape icon-xl bg-gradient-green text-white rounded-10 shadow">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                    </div>
                                    <div class="col ml--2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="card-title text-uppercase text-muted mb-0">Total Revenue</h6>
                                                <h2 class="mb-0">${{ number_format($totalRevenue ?? 0) }}</h2>
                                            </div>
                                            <div class="text-right">
                                                <div class="trend-indicator">
                                                    <i class="fas fa-arrow-up text-success"></i>
                                                    <span class="text-success font-weight-bold">22.7%</span>
                                                </div>
                                                <small class="text-muted">vs last month</small>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <div class="d-flex justify-content-between">
                                                <span class="text-sm">Today</span>
                                                <span class="text-sm font-weight-bold text-success">+${{ number_format($todayRevenue ?? 0) }}</span>
                                            </div>
                                            <div class="sparkline-chart mt-2" data-type="line" data-color="#38c172" data-height="30"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Categories Card -->
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="card card-stats shadow-lg border-0">
                            <div class="card-body p-3">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="icon-shape icon-xl bg-gradient-purple text-white rounded-10 shadow">
                                            <i class="fas fa-list"></i>
                                        </div>
                                    </div>
                                    <div class="col ml--2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="card-title text-uppercase text-muted mb-0">Categories</h6>
                                                <h2 class="mb-0">{{ $categories->count() }}</h2>
                                            </div>
                                            <div class="text-right">
                                                <div class="trend-indicator">
                                                    <i class="fas fa-arrow-up text-success"></i>
                                                    <span class="text-success font-weight-bold">3.2%</span>
                                                </div>
                                                <small class="text-muted">vs last month</small>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="text-sm">Most Popular:</span>
                                                <span class="badge badge-purple">{{ $popularCategory ?? 'N/A' }}</span>
                                            </div>
                                            <div class="category-distribution mt-2">
                                                <div class="d-flex justify-content-between text-xs">
                                                    <span>Electronics</span>
                                                    <span>42%</span>
                                                </div>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-gradient-purple" style="width: 42%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route('admin.category.index') }}" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Networks Card -->
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="card card-stats shadow-lg border-0">
                            <div class="card-body p-3">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="icon-shape icon-xl bg-gradient-yellow text-white rounded-10 shadow">
                                            <i class="fas fa-network-wired"></i>
                                        </div>
                                    </div>
                                    <div class="col ml--2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="card-title text-uppercase text-muted mb-0">Networks</h6>
                                                <h2 class="mb-0">{{ $networks->count() }}</h2>
                                            </div>
                                            <div class="text-right">
                                                <div class="trend-indicator">
                                                    <i class="fas fa-arrow-up text-success"></i>
                                                    <span class="text-success font-weight-bold">6.5%</span>
                                                </div>
                                                <small class="text-muted">vs last month</small>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="text-sm">Active Networks:</span>
                                                <span class="badge badge-yellow">{{ $activeNetworks ?? $networks->count() }}</span>
                                            </div>
                                            <div class="network-stats mt-2">
                                                <div class="d-flex justify-content-around text-center">
                                                    <div>
                                                        <div class="text-sm font-weight-bold text-success">+12</div>
                                                        <div class="text-xs">This Week</div>
                                                    </div>
                                                    <div>
                                                        <div class="text-sm font-weight-bold text-info">+45</div>
                                                        <div class="text-xs">This Month</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route('admin.network.index') }}" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Languages Card -->
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="card card-stats shadow-lg border-0">
                            <div class="card-body p-3">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="icon-shape icon-xl bg-gradient-cyan text-white rounded-10 shadow">
                                            <i class="fas fa-language"></i>
                                        </div>
                                    </div>
                                    <div class="col ml--2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="card-title text-uppercase text-muted mb-0">Languages</h6>
                                                <h2 class="mb-0">{{ $langs->count() }}</h2>
                                            </div>
                                            <div class="text-right">
                                                <div class="trend-indicator">
                                                    <i class="fas fa-minus text-warning"></i>
                                                    <span class="text-warning font-weight-bold">0%</span>
                                                </div>
                                                <small class="text-muted">vs last month</small>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="text-sm">Most Used:</span>
                                                <span class="badge badge-cyan">{{ $popularLanguage ?? 'English' }}</span>
                                            </div>
                                            <div class="language-stats mt-2">
                                                <div class="d-flex justify-content-between text-xs">
                                                    <span>English</span>
                                                    <span class="font-weight-bold">68%</span>
                                                </div>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-gradient-cyan" style="width: 68%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route('admin.lang.index') }}" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats Summary Row -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card shadow-sm border-0">
                            <div class="card-body p-3">
                                <div class="row text-center">
                                    <div class="col-md-3 col-6 mb-md-0 mb-3">
                                        <div class="stat-summary">
                                            <div class="stat-value active-stores-count">{{ $stores->where('status', 'enable')->count() }}</div>
                                            <div class="stat-label text-muted">Active Stores</div>
                                            <div class="stat-change text-success">
                                                <i class="fas fa-arrow-up"></i> {{ $newStoresToday ?? 0 }} today
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6 mb-md-0 mb-3">
                                        <div class="stat-summary">
                                            <div class="stat-value active-coupons-count">{{ $coupons->where('status', 'enable')->count() }}</div>
                                            <div class="stat-label text-muted">Active Coupons</div>
                                            <div class="stat-change text-warning">
                                                <i class="fas fa-clock"></i> {{ $expiringSoon ?? 0 }} expiring
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="stat-summary">
                                            <div class="stat-value">{{ $activeUsers ?? 0 }}</div>
                                            <div class="stat-label text-muted">Active Users</div>
                                            <div class="stat-change text-info">
                                                <i class="fas fa-user-clock"></i> {{ $onlineUsers ?? 0 }} online
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="stat-summary">
                                            <div class="stat-value">{{ $totalViews ?? 0 }}</div>
                                            <div class="stat-label text-muted">Page Views</div>
                                            <div class="stat-change text-primary">
                                                <i class="fas fa-eye"></i> {{ $todayViews ?? 0 }} today
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content Row -->
                <div class="row">
                    <!-- Recent Stores Section -->
                    <div class="col-lg-6 mb-4">
                        <div class="card shadow-lg border-0 h-100">
                            <div class="card-header bg-gradient-dark">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0 text-white">
                                        <i class="fas fa-store mr-2"></i>Recent Stores
                                    </h5>
                                    <a href="{{ route('admin.store.index') }}" class="btn btn-sm btn-light">View All</a>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Store</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                                <th>Added</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($recentStores as $store)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="mr-3">
                                                            <img src="{{ asset('uploads/stores/' . $store->store_image) }}"
                                                                 alt="{{ $store->name }}"
                                                                 class="rounded-circle"
                                                                 width="40"
                                                                 height="40"
                                                                 style="object-fit: cover;">
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0">{{ Str::limit($store->name, 20) }}</h6>
                                                            <small class="text-muted">{{ $store->language->name ?? 'N/A' }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-info">{{ $store->categories->title ?? 'N/A' }}</span>
                                                </td>
                                                <td>
                                                    @if($store->status == 'enable')
                                                    <span class="badge badge-success">Active</span>
                                                    @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <small class="text-muted">{{ $store->created_at->diffForHumans() }}</small>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="4" class="text-center py-4">
                                                    <i class="fas fa-store fa-2x text-muted mb-2"></i>
                                                    <p class="mb-0">No recent stores found</p>
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Coupons Section -->
                    <div class="col-lg-6 mb-4">
                        <div class="card shadow-lg border-0 h-100">
                            <div class="card-header bg-gradient-info">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0 text-white">
                                        <i class="fas fa-ticket-alt mr-2"></i>Recent Coupons
                                    </h5>
                                    <a href="{{ route('admin.coupon.index') }}" class="btn btn-sm btn-light">View All</a>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Coupon Code</th>
                                                <th>Store</th>
                                                <th>Expires</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($recentCoupons as $coupon)
                                            <tr>
                                                <td>
                                                    @if ($coupon->code)
                                                            <code class="bg-light p-1 rounded">{{ $coupon->code }}</code>
                                                    @else
                                                            <span class="text-muted">Deal</span>
                                                    @endif

                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="mr-2">
                                                            <img src="{{ asset('uploads/stores/' . ($coupon->stores->store_image ?? '')) }}"
                                                                 alt="{{ $coupon->stores->name ?? '' }}"
                                                                 class="rounded-circle"
                                                                 width="30"
                                                                 height="30"
                                                                 style="object-fit: cover;">
                                                        </div>
                                                        <span>{{ Str::limit($coupon->stores->name ?? 'N/A', 15) }}</span>
                                                    </div>
                                                </td>

                                                <td>
                                                    @if($coupon->ending_date)
                                                        @if(\Carbon\Carbon::parse($coupon->ending_date)->isPast())
                                                            <span class="badge badge-danger">Expired</span>
                                                        @elseif(\Carbon\Carbon::parse($coupon->ending_date)->diffInDays(now()) <= 3)
                                                            <span class="badge badge-warning">{{ \Carbon\Carbon::parse($coupon->ending_date)->diffForHumans() }}</span>
                                                        @else
                                                            <small class="text-muted">{{ $coupon->ending_date->format('M d') }}</small>
                                                        @endif
                                                    @else
                                                        <span class="badge badge-secondary">No expiry</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($coupon->status == 'enable')
                                                    <span class="badge badge-success">Active</span>
                                                    @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="5" class="text-center py-4">
                                                    <i class="fas fa-ticket-alt fa-2x text-muted mb-2"></i>
                                                    <p class="mb-0">No recent coupons found</p>
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Second Row: Recent Blogs & Quick Actions -->
                <div class="row">
                    <!-- Recent Blogs Section -->
                    <div class="col-lg-8 mb-4">
                        <div class="card shadow-lg border-0 h-100">
                            <div class="card-header bg-gradient-success">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0 text-white">
                                        <i class="fas fa-blog mr-2"></i>Recent Blog Posts
                                    </h5>
                                    <a href="{{ route('admin.blog.index') }}" class="btn btn-sm btn-light">View All</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @forelse($recentBlogs as $blog)
                                    <div class="col-md-6 mb-3">
                                        <div class="card border h-100">
                                            <div class="row no-gutters">
                                                <div class="col-md-4">
                                                    <img src="{{ asset($blog->category_image) }}"
                                                         class="card-img h-100"
                                                         alt="{{ $blog->title }}"
                                                         style="object-fit: cover;">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h6 class="card-title">{{ Str::limit($blog->title, 40) }}</h6>
                                                        <small class="text-muted">
                                                            <i class="far fa-calendar mr-1"></i> {{ $blog->created_at->format('M d, Y') }}
                                                        </small>
                                                        <div class="mt-2">
                                                            <span class="badge badge-info">{{ $blog->language->name ?? 'N/A' }}</span>
                                                            @if($blog->status == 'enable')
                                                            <span class="badge badge-success">Published</span>
                                                            @else
                                                            <span class="badge badge-warning">Draft</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-12 text-center py-4">
                                        <i class="fas fa-blog fa-2x text-muted mb-2"></i>
                                        <p class="mb-0">No recent blog posts found</p>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions Section -->
                    <div class="col-lg-4 mb-4">
                        <div class="card shadow-lg border-0 h-100">
                            <div class="card-header bg-gradient-primary">
                                <h5 class="mb-0 text-white">
                                    <i class="fas fa-bolt mr-2"></i>Quick Actions
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <a href="{{ route('admin.store.create') }}" class="btn btn-block btn-outline-primary">
                                            <i class="fas fa-plus mr-2"></i>Add Store
                                        </a>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <a href="{{ route('admin.blog.create') }}" class="btn btn-block btn-outline-success">
                                            <i class="fas fa-plus mr-2"></i>Add Blog
                                        </a>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <a href="{{ route('admin.coupon.create') }}" class="btn btn-block btn-outline-warning">
                                            <i class="fas fa-plus mr-2"></i>Add Coupon
                                        </a>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <a href="{{ route('admin.category.create') }}" class="btn btn-block btn-outline-info">
                                            <i class="fas fa-plus mr-2"></i>Add Category
                                        </a>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <a href="{{ route('admin.user.create') }}" class="btn btn-block btn-outline-secondary">
                                            <i class="fas fa-user-plus mr-2"></i>Add User
                                        </a>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <a href="{{ route('admin.network.create') }}" class="btn btn-block btn-outline-dark">
                                            <i class="fas fa-network-wired mr-2"></i>Add Network
                                        </a>
                                    </div>
                                </div>

                                <!-- System Status -->
                                <div class="mt-4 pt-3 border-top">
                                    <h6 class="mb-3"><i class="fas fa-server mr-2"></i>System Status</h6>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Disk Usage</span>
                                        <span class="font-weight-bold">{{ $diskUsage ?? '75%' }}</span>
                                    </div>
                                    <div class="progress mb-3">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 75%"></div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Memory Usage</span>
                                        <span class="font-weight-bold">{{ $memoryUsage ?? '62%' }}</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 62%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity Section -->
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="card shadow-lg border-0">
                            <div class="card-header bg-gradient-secondary">
                                <h5 class="mb-0 text-white">
                                    <i class="fas fa-history mr-2"></i>Recent Activity
                                </h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    @forelse($recentUsers as $user)
                                    <li class="list-group-item d-flex align-items-center">
                                        <div class="icon-shape-sm mr-3 bg-success">
                                            <i class="fas fa-user-plus text-white"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0">New user registered: {{ $user->name }}</p>
                                            <small class="text-muted">{{ $user->created_at->diffForHumans() }}</small>
                                        </div>
                                        <span class="badge badge-success">New</span>
                                    </li>
                                    @empty
                                    <!-- Default Activities -->
                                    <li class="list-group-item d-flex align-items-center">
                                        <div class="icon-shape-sm mr-3 bg-success">
                                            <i class="fas fa-user-plus text-white"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0">New user registered: John Doe</p>
                                            <small class="text-muted">2 minutes ago</small>
                                        </div>
                                        <span class="badge badge-success">New</span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <div class="icon-shape-sm mr-3 bg-info">
                                            <i class="fas fa-store text-white"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0">New store added: Amazon</p>
                                            <small class="text-muted">1 hour ago</small>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <div class="icon-shape-sm mr-3 bg-warning">
                                            <i class="fas fa-ticket-alt text-white"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0">Coupon expired: SAVE20</p>
                                            <small class="text-muted">3 hours ago</small>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <div class="icon-shape-sm mr-3 bg-primary">
                                            <i class="fas fa-blog text-white"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0">New blog published: "Top 10 Stores"</p>
                                            <small class="text-muted">5 hours ago</small>
                                        </div>
                                    </li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Performance Metrics Row -->
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-header bg-gradient-warning">
                                <h5 class="mb-0 text-white">
                                    <i class="fas fa-fire mr-2"></i>Top Performing Stores
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="list-group list-group-flush">
                                    @php
                                        $topStores = $stores->where('status', 'enable')->take(5);
                                    @endphp
                                    @forelse($topStores as $store)
                                    <div class="list-group-item d-flex align-items-center border-0 px-0 py-3">
                                        <div class="mr-3">
                                            <img src="{{ asset('uploads/stores/' . $store->store_image) }}"
                                                 alt="{{ $store->name }}"
                                                 class="rounded-circle"
                                                 width="45"
                                                 height="45"
                                                 style="object-fit: cover;">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">{{ Str::limit($store->name, 25) }}</h6>
                                            <small class="text-muted">{{ $store->categories->title ?? 'N/A' }}</small>
                                        </div>
                                        <div class="text-right">
                                            <span class="badge badge-success">4.8</span>
                                            <div class="text-xs text-muted">Rating</div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="text-center py-4">
                                        <i class="fas fa-store fa-2x text-muted mb-2"></i>
                                        <p class="mb-0">No stores found</p>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-header bg-gradient-danger">
                                <h5 class="mb-0 text-white">
                                    <i class="fas fa-chart-pie mr-2"></i>Category Distribution
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="category-chart">
                                    @php
                                        $categoryCounts = $categories->take(5);
                                    @endphp
                                    @forelse($categoryCounts as $category)
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span class="text-sm">{{ Str::limit($category->title, 20) }}</span>
                                            <span class="text-sm font-weight-bold">{{ $stores->where('category_id', $category->id)->count() }}</span>
                                        </div>
                                        <div class="progress" style="height: 8px;">
                                            @php
                                                $percentage = ($stores->where('category_id', $category->id)->count() / max($stores->count(), 1)) * 100;
                                                $colors = ['bg-gradient-primary', 'bg-gradient-success', 'bg-gradient-info', 'bg-gradient-warning', 'bg-gradient-danger'];
                                                $color = $colors[$loop->index % count($colors)] ?? 'bg-gradient-primary';
                                            @endphp
                                            <div class="progress-bar {{ $color }}" role="progressbar" style="width: {{ $percentage }}%"></div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="text-center py-4">
                                        <i class="fas fa-list fa-2x text-muted mb-2"></i>
                                        <p class="mb-0">No categories found</p>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-header bg-gradient-info">
                                <h5 class="mb-0 text-white">
                                    <i class="fas fa-calendar-alt mr-2"></i>Upcoming Events
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="list-group list-group-flush">
                                    @php
                                        $expiringCoupons = $coupons->where('ending_date', '>=', now())
                                            ->where('ending_date', '<=', now()->addDays(7))
                                            ->take(4);
                                    @endphp
                                    @forelse($expiringCoupons as $coupon)
                                    <div class="list-group-item d-flex align-items-center border-0 px-0 py-3">
                                        <div class="mr-3">
                                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <i class="fas fa-ticket-alt text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">{{ $coupon->code ?? 'Deal' }}</h6>
                                            <small class="text-muted">{{ $coupon->stores->name ?? 'N/A' }}</small>
                                        </div>
                                        <div class="text-right">
                                            <span class="badge badge-warning">{{ $coupon->ending_date->diffForHumans() }}</span>
                                            <div class="text-xs text-muted">Expires</div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="text-center py-4">
                                        <i class="fas fa-calendar fa-2x text-muted mb-2"></i>
                                        <p class="mb-0">No upcoming events</p>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div>
@endsection

@push('styles')
<style>
    .text-gradient {
        background: linear-gradient(45deg, #6a11cb 0%, #2575fc 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .card-stats {
        transition: all 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
        position: relative;
    }

    .card-stats:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(50, 50, 93, 0.1), 0 5px 15px rgba(0, 0, 0, 0.07) !important;
    }

    .card-stats::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--gradient-start), var(--gradient-end));
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .card-stats:hover::before {
        opacity: 1;
    }

    .icon-shape {
        width: 56px;
        height: 56px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s ease;
    }

    .icon-shape.icon-xl {
        width: 64px;
        height: 64px;
    }

    .card-stats:hover .icon-shape {
        transform: scale(1.1);
    }

    .icon-shape-sm {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Gradient Backgrounds */
    .bg-gradient-orange {
        --gradient-start: #f7971e;
        --gradient-end: #ffd200;
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
    }

    .bg-gradient-info {
        --gradient-start: #4facfe;
        --gradient-end: #00f2fe;
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
    }

    .bg-gradient-green {
        --gradient-start: #43e97b;
        --gradient-end: #38f9d7;
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
    }

    .bg-gradient-yellow {
        --gradient-start: #fa709a;
        --gradient-end: #fee140;
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
    }

    .bg-gradient-red {
        --gradient-start: #ff0844;
        --gradient-end: #ffb199;
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
    }

    .bg-gradient-blue {
        --gradient-start: #330867;
        --gradient-end: #30cfd0;
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
    }

    .bg-gradient-dark {
        --gradient-start: #29323c;
        --gradient-end: #485563;
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
    }

    .bg-gradient-purple {
        --gradient-start: #667eea;
        --gradient-end: #764ba2;
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
    }

    .bg-gradient-cyan {
        --gradient-start: #08aeea;
        --gradient-end: #2af598;
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
    }

    /* Badge Colors */
    .badge-orange { background: linear-gradient(45deg, #f7971e, #ffd200); }
    .badge-purple { background: linear-gradient(45deg, #667eea, #764ba2); }
    .badge-cyan { background: linear-gradient(45deg, #08aeea, #2af598); }
    .badge-yellow { background: linear-gradient(45deg, #fa709a, #fee140); }

    /* Progress Bars */
    .progress-wrapper {
        margin-top: 10px;
    }

    .progress-info {
        display: flex;
        justify-content: space-between;
        margin-bottom: 5px;
    }

    .progress-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        font-weight: 600;
    }

    .progress-value {
        font-size: 0.75rem;
        font-weight: 600;
    }

    .progress-xs {
        height: 6px;
    }

    .progress-percentage {
        position: absolute;
        right: 5px;
        top: -20px;
        font-size: 0.65rem;
        font-weight: 600;
    }

    /* Trend Indicator */
    .trend-indicator {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 2px;
    }

    /* Stat Summary */
    .stat-summary {
        padding: 10px;
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        color: #2d3748;
        line-height: 1;
    }

    .stat-label {
        font-size: 0.85rem;
        margin-top: 5px;
    }

    .stat-change {
        font-size: 0.75rem;
        margin-top: 3px;
    }

    /* Sparkline Chart Container */
    .sparkline-chart {
        width: 100%;
    }

    /* Rounded corners */
    .rounded-10 {
        border-radius: 10px !important;
    }

    /* Table Styles */
    .table-responsive::-webkit-scrollbar {
        height: 6px;
    }

    .table-responsive::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .table-responsive::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }

    .table-responsive::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    /* Animation for numbers */
    @keyframes countUp {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .counting {
        animation: countUp 1s ease-out;
    }

    /* Time period buttons */
    .btn-group .btn.active {
        background: linear-gradient(45deg, #6a11cb, #2575fc);
        color: white;
        border-color: #6a11cb;
    }

    /* Quick Actions Button Styles */
    .btn-outline-primary:hover { background: linear-gradient(45deg, #3494e6, #ec6ead); color: white; }
    .btn-outline-success:hover { background: linear-gradient(45deg, #00b09b, #96c93d); color: white; }
    .btn-outline-warning:hover { background: linear-gradient(45deg, #fa709a, #fee140); color: white; }
    .btn-outline-info:hover { background: linear-gradient(45deg, #4facfe, #00f2fe); color: white; }
    .btn-outline-secondary:hover { background: linear-gradient(45deg, #8e2de2, #4a00e0); color: white; }
    .btn-outline-dark:hover { background: linear-gradient(45deg, #29323c, #485563); color: white; }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/jquery-sparkline@2.4.0/jquery.sparkline.min.js"></script>
<script>
    // Initialize Sparkline charts
    $(document).ready(function() {
        // Sample sparkline data (replace with real data from your backend)
        $('.sparkline-chart').each(function() {
            var color = $(this).data('color') || '#38c172';
            var type = $(this).data('type') || 'line';
            var height = $(this).data('height') || 30;

            // Generate random data for demo
            var data = [];
            for(var i = 0; i < 10; i++) {
                data.push(Math.floor(Math.random() * 100) + 20);
            }

            $(this).sparkline(data, {
                type: type,
                width: '100%',
                height: height + 'px',
                lineColor: color,
                fillColor: type === 'line' ? color + '20' : color,
                spotColor: false,
                minSpotColor: false,
                maxSpotColor: false,
                highlightSpotColor: color,
                highlightLineColor: color,
                lineWidth: 2
            });
        });

        // Animate numbers on page load
        $('h2.mb-0').each(function() {
            var $this = $(this);
            var countTo = $this.text().replace(/,/g, '');

            $({ countNum: 0 }).animate({
                countNum: parseInt(countTo)
            }, {
                duration: 1500,
                easing: 'swing',
                step: function() {
                    $this.text(Math.floor(this.countNum).toLocaleString());
                },
                complete: function() {
                    $this.text(parseInt(countTo).toLocaleString());
                }
            });
        });

        // Time period filter functionality
        $('[data-period]').click(function() {
            var period = $(this).data('period');

            // Update active button
            $('[data-period]').removeClass('active');
            $(this).addClass('active');

            // Make AJAX call to update stats
            $.ajax({
                url: '{{ route("admin.dashboard.stats") }}',
                method: 'GET',
                data: { period: period },
                success: function(response) {
                    updateStats(response);
                    showNotification('Showing stats for ' + period, 'success');
                },
                error: function(xhr) {
                    console.error('Error loading period stats:', xhr.responseText);
                    showNotification('Failed to load stats', 'error');
                }
            });
        });

        // Auto-refresh dashboard every 60 seconds
        setInterval(function() {
            refreshStats();
        }, 60000);

        // Function to refresh stats via AJAX
        function refreshStats() {
            var period = $('[data-period].active').data('period') || 'today';

            $.ajax({
                url: '{{ route("admin.dashboard.stats") }}',
                method: 'GET',
                data: { period: period },
                success: function(response) {
                    updateStats(response);
                    console.log('Stats refreshed at ' + new Date().toLocaleTimeString());
                },
                error: function(xhr) {
                    console.error('Error refreshing stats:', xhr.responseText);
                }
            });
        }

        // Function to update stats with AJAX response
        function updateStats(data) {
            // Update main counts with animation
            animateCount($('.stores-count'), data.stores_count);
            animateCount($('.blogs-count'), data.blogs_count);
            animateCount($('.coupons-count'), data.coupons_count);
            animateCount($('.users-count'), data.users_count);

            // Update active counts
            animateCount($('.active-stores-count'), data.activeStores);
            animateCount($('.active-coupons-count'), data.activeCoupons);

            // Update progress bars
            updateProgressBars(data);

            // Update last updated time
            $('.last-updated').text('Last updated: ' + new Date().toLocaleTimeString());
        }

        // Function to animate number changes
        function animateCount(element, newValue) {
            var currentValue = parseInt(element.text().replace(/,/g, ''));
            if (currentValue !== newValue) {
                $({ count: currentValue }).animate({
                    count: newValue
                }, {
                    duration: 800,
                    easing: 'swing',
                    step: function() {
                        element.text(Math.floor(this.count).toLocaleString());
                    },
                    complete: function() {
                        element.text(newValue.toLocaleString());
                    }
                });
            }
        }

        // Function to update progress bars
        function updateProgressBars(data) {
            // Update store progress
            var storeProgress = (data.activeStores / Math.max(data.stores_count, 1)) * 100;
            $('.card-stats .progress-bar.bg-gradient-orange').css('width', storeProgress + '%');

            // Update blog progress
            var blogProgress = (data.publishedBlogs / Math.max(data.blogs_count, 1)) * 100;
            $('.card-stats .progress-bar.bg-gradient-info').css('width', blogProgress + '%');

            // Update coupon progress
            var couponProgress = (data.activeCoupons / Math.max(data.coupons_count, 1)) * 100;
            $('.card-stats .progress-bar.bg-gradient-red').css('width', couponProgress + '%');
        }

        // Function to show notifications
        function showNotification(message, type) {
            // Create a simple notification
            var alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
            var icon = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';

            var notification = $('<div class="alert ' + alertClass + ' alert-dismissible fade show position-fixed" style="top: 20px; right: 20px; z-index: 9999;">' +
                '<i class="fas ' + icon + ' mr-2"></i>' + message +
                '<button type="button" class="close" data-dismiss="alert">' +
                '<span>&times;</span>' +
                '</button>' +
                '</div>');

            $('body').append(notification);
            setTimeout(function() {
                notification.alert('close');
            }, 3000);
        }

        // Initialize tooltips
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

        // Add hover effect to stat cards
        $('.card-stats').hover(
            function() {
                $(this).find('.icon-shape').css('transform', 'scale(1.1)');
            },
            function() {
                $(this).find('.icon-shape').css('transform', 'scale(1)');
            }
        );
    });
</script>
@endpush
