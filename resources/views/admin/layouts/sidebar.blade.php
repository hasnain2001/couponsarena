<aside class="col-md-2 col-lg-2 bg-dark text-white min-vh-100 py-3 admin-sidebar">
    <div class="sidebar-header text-center mb-4">
        <h5 class="text-white mb-0">Admin Menu</h5>
        <small class="text-muted">Navigation</small>
    </div>

    <ul class="nav flex-column sidebar-nav">
        <!-- Dashboard -->
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}"
               class="nav-link text-white sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-th-large me-2"></i> Dashboard
            </a>
        </li>

        <!-- Coupons -->
        <li class="nav-item">
            <a class="nav-link text-white sidebar-link" data-bs-toggle="collapse" href="#couponMenu">
                <i class="fas fa-ticket-alt me-2"></i> Coupons
                <i class="fas fa-chevron-down float-end mt-1"></i>
            </a>
            <div class="collapse {{ request()->routeIs('admin.coupon.*') ? 'show' : '' }}" id="couponMenu">
                <ul class="nav flex-column ms-3">
                    <li>
                        <a class="nav-link text-white sidebar-link {{ request()->routeIs('admin.coupon.index') ? 'active' : '' }}"
                           href="{{ route('admin.coupon.index') }}">
                            <i class="fas fa-list me-2"></i> All Coupons
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-white sidebar-link {{ request()->routeIs('admin.coupon.create') ? 'active' : '' }}"
                           href="{{ route('admin.coupon.create') }}">
                            <i class="fas fa-plus me-2"></i> Add New
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Stores -->
        <li class="nav-item">
            <a class="nav-link text-white sidebar-link" data-bs-toggle="collapse" href="#storeMenu">
                <i class="fas fa-store-alt me-2"></i> Stores
                <i class="fas fa-chevron-down float-end mt-1"></i>
            </a>
            <div class="collapse {{ request()->routeIs('admin.store.*') ? 'show' : '' }}" id="storeMenu">
                <ul class="nav flex-column ms-3">
                    <li>
                        <a class="nav-link text-white sidebar-link {{ request()->routeIs('admin.store.index') ? 'active' : '' }}"
                           href="{{ route('admin.store.index') }}">
                            <i class="fas fa-store me-2"></i> Stores
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-white sidebar-link {{ request()->routeIs('admin.store.create') ? 'active' : '' }}"
                           href="{{ route('admin.store.create') }}">
                            <i class="fas fa-plus-circle me-2"></i> Add Store
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-white sidebar-link {{ request()->routeIs('admin.delete_store') ? 'active' : '' }}"
                           href="{{ route('admin.delete_store') }}">
                            <i class="fas fa-trash me-2"></i> Deleted Stores
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Users -->
        <li class="nav-item">
            <a class="nav-link text-white sidebar-link" data-bs-toggle="collapse" href="#userMenu">
                <i class="fas fa-users me-2"></i> Users
                <i class="fas fa-chevron-down float-end mt-1"></i>
            </a>
            <div class="collapse {{ request()->routeIs('admin.user.*') ? 'show' : '' }}" id="userMenu">
                <ul class="nav flex-column ms-3">
                    <li>
                        <a class="nav-link text-white sidebar-link {{ request()->routeIs('admin.user.index') ? 'active' : '' }}"
                           href="{{ route('admin.user.index') }}">
                            <i class="fas fa-user-friends me-2"></i> Users
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-white sidebar-link {{ request()->routeIs('admin.user.create') ? 'active' : '' }}"
                           href="{{ route('admin.user.create') }}">
                            <i class="fas fa-user-plus me-2"></i> Add User
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Blog -->
        <li class="nav-item">
            <a class="nav-link text-white sidebar-link" data-bs-toggle="collapse" href="#blogMenu">
                <i class="fas fa-blog me-2"></i> Blog
                <i class="fas fa-chevron-down float-end mt-1"></i>
            </a>
            <div class="collapse {{ request()->routeIs('admin.blog.*') ? 'show' : '' }}" id="blogMenu">
                <ul class="nav flex-column ms-3">
                    <li>
                        <a class="nav-link text-white sidebar-link {{ request()->routeIs('admin.blog.index') ? 'active' : '' }}"
                           href="{{ route('admin.blog.index') }}">
                            <i class="fas fa-newspaper me-2"></i> Blogs
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-white sidebar-link {{ request()->routeIs('admin.blog.create') ? 'active' : '' }}"
                           href="{{ route('admin.blog.create') }}">
                            <i class="fas fa-edit me-2"></i> Add Blog
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Categories -->
        <li class="nav-item">
            <a class="nav-link text-white sidebar-link" data-bs-toggle="collapse" href="#catMenu">
                <i class="fas fa-list-alt me-2"></i> Categories
                <i class="fas fa-chevron-down float-end mt-1"></i>
            </a>
            <div class="collapse {{ request()->routeIs('admin.category.*') ? 'show' : '' }}" id="catMenu">
                <ul class="nav flex-column ms-3">
                    <li>
                        <a class="nav-link text-white sidebar-link {{ request()->routeIs('admin.category.index') ? 'active' : '' }}"
                           href="{{ route('admin.category.index') }}">
                            <i class="fas fa-folder me-2"></i> All Categories
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-white sidebar-link {{ request()->routeIs('admin.category.create') ? 'active' : '' }}"
                           href="{{ route('admin.category.create') }}">
                            <i class="fas fa-folder-plus me-2"></i> Add Category
                        </a>
                    </li>
                </ul>
            </div>
        </li>
         <!-- network -->
        <li class="nav-item">
            <a class="nav-link text-white sidebar-link" data-bs-toggle="collapse" href="#networkMenu">
                <i class="fas fa-list-alt me-2"></i> network
                <i class="fas fa-chevron-down float-end mt-1"></i>
            </a>
            <div class="collapse {{ request()->routeIs('admin.network.*') ? 'show' : '' }}" id="networkMenu">
                <ul class="nav flex-column ms-3">
                    <li>
                        <a class="nav-link text-white sidebar-link {{ request()->routeIs('admin.network.index') ? 'active' : '' }}"
                           href="{{ route('admin.network.index') }}">
                            <i class="fas fa-folder me-2"></i> All Networks
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-white sidebar-link {{ request()->routeIs('admin.network.create') ? 'active' : '' }}"
                           href="{{ route('admin.network.create') }}">
                            <i class="fas fa-folder-plus me-2"></i> Add Network
                        </a>
                    </li>
                </ul>
            </div>
        </li>
          {{-- <!-- slider -->
        <li class="nav-item">
            <a class="nav-link text-white sidebar-link" data-bs-toggle="collapse" href="#sliderMenu">
                <i class="fas fa-list-alt me-2"></i> slider
                <i class="fas fa-chevron-down float-end mt-1"></i>
            </a>
            <div class="collapse {{ request()->routeIs('admin.slider.*') ? 'show' : '' }}" id="sliderMenu">
                <ul class="nav flex-column ms-3">
                    <li>
                        <a class="nav-link text-white sidebar-link {{ request()->routeIs('admin.slider.index') ? 'active' : '' }}"
                           href="{{ route('admin.slider.index') }}">
                            <i class="fas fa-folder me-2"></i> All sliders
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-white sidebar-link {{ request()->routeIs('admin.slider.create') ? 'active' : '' }}"
                           href="{{ route('admin.slider.create') }}">
                            <i class="fas fa-folder-plus me-2"></i> Add slider
                        </a>
                    </li>
                </ul>
            </div>
        </li> --}}
    </ul>

    <!-- Sidebar Footer -->
    <div class="sidebar-footer mt-4 pt-4 border-top border-secondary">
        <small class=" text-white">
            <i class="fas fa-circle text-success me-1"></i>
            @auth
                Online - {{ Auth::user()->name }}
            @else
                Offline
            @endauth
        </small>
    </div>
</aside>
