@extends('admin.layouts.guest')

@section('main-content')
<div class="content-page">

    <!-- ========== Topbar Start ========== -->
    <div class="navbar-custom">
        <div class="topbar">
            <div class="topbar-menu d-flex align-items-center gap-1">

                <!-- Topbar Brand Logo -->
                <div class="logo-box">
                    <!-- Brand Logo Light -->
                    <a href="index.html" class="logo-light">
                        <img src="{{asset('assets/images/logo-light.png')}}" alt="logo" class="logo-lg">
                        <img src="{{asset('assets/images/logo-sm.png')}}" alt="small logo" class="logo-sm">
                    </a>

                    <!-- Brand Logo Dark -->
                    <a href="index.html" class="logo-dark">
                        <img src="{{asset('assets/images/logo-dark.png')}}" alt="dark logo" class="logo-lg">
                        <img src="{{asset('assets/images/logo-sm.png')}}" alt="small logo" class="logo-sm">
                    </a>
                </div>

                <!-- Sidebar Menu Toggle Button -->
                <button class="button-toggle-menu">
                    <i class="mdi mdi-menu"></i>
                </button>




            </div>

            <ul class="topbar-menu d-flex align-items-center">
                <!-- Topbar Search Form -->
                <li class="app-search dropdown me-3 d-none d-lg-block">
                    <form>
                        <input type="search" class="form-control rounded-pill" placeholder="Search..." id="top-search">
                        <span class="fe-search search-icon font-16"></span>
                    </form>
                    <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h5 class="text-overflow mb-2">Found 22 results</h5>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-home me-1"></i>
                            <span>Analytics Report</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-aperture me-1"></i>
                            <span>How can I help you?</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-settings me-1"></i>
                            <span>User profile settings</span>
                        </a>

                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                        </div>

                        <div class="notification-list">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="d-flex align-items-start">
                                    <img class="d-flex me-2 rounded-circle" src="assets/images/users/user-2.jpg" alt="Generic placeholder image" height="32">
                                    <div class="w-100">
                                        <h5 class="m-0 font-14">Erwin E. Brown</h5>
                                        <span class="font-12 mb-0">UI Designer</span>
                                    </div>
                                </div>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="d-flex align-items-start">
                                    <img class="d-flex me-2 rounded-circle" src="assets/images/users/user-5.jpg" alt="Generic placeholder image" height="32">
                                    <div class="w-100">
                                        <h5 class="m-0 font-14">Jacob Deo</h5>
                                        <span class="font-12 mb-0">Developer</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>

                <!-- Fullscreen Button -->
                <li class="d-none d-md-inline-block">
                    <a class="nav-link waves-effect waves-light" href="" data-toggle="fullscreen">
                        <i class="fe-maximize font-22"></i>
                    </a>
                </li>

                <!-- Search Dropdown (for Mobile/Tablet) -->
                <li class="dropdown d-lg-none">
                    <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="ri-search-line font-22"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                        <form class="p-3">
                            <input type="search" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                        </form>
                    </div>
                </li>


<!-- Language flag dropdown  -->
<li class="dropdown d-none d-md-inline-block">
<a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
<img src="{{ asset('assets/images/flags/us.jpg') }}" alt="user-image" class="me-0 me-sm-1" height="18">
</a>
<div class="dropdown-menu dropdown-menu-end dropdown-menu-animated">

<!-- item-->
<a href="javascript:void(0);" class="dropdown-item">
    <img src="{{ asset('assets/images/flags/germany.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
</a>

<!-- item-->
<a href="javascript:void(0);" class="dropdown-item">
    <img src="{{ asset('assets/images/flags/italy.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
</a>

<!-- item-->
<a href="javascript:void(0);" class="dropdown-item">
    <img src="{{ asset('assets/images/flags/spain.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
</a>

<!-- item-->
<a href="javascript:void(0);" class="dropdown-item">
    <img src="{{ asset('assets/images/flags/russia.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
</a>

</div>
</li>


                <!-- Notofication dropdown -->
                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fe-bell font-22"></i>
                        <span class="badge bg-danger rounded-circle noti-icon-badge">9</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
                        <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0 font-16 fw-semibold"> Notification</h6>
                                </div>
                                <div class="col-auto">
                                    <a href="javascript: void(0);" class="text-dark text-decoration-underline">
                                        <small>Clear All</small>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="px-1" style="max-height: 300px;" data-simplebar>

                            <h5 class="text-muted font-13 fw-normal mt-2">Today</h5>
                            <!-- item-->

                            <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-1">
                                <div class="card-body">
                                    <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="notify-icon bg-primary">
                                                <i class="mdi mdi-comment-account-outline"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 text-truncate ms-2">
                                            <h5 class="noti-item-title fw-semibold font-14">Datacorp <small class="fw-normal text-muted ms-1">1 min ago</small></h5>
                                            <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on Admin</small>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-1">
                                <div class="card-body">
                                    <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="notify-icon bg-info">
                                                <i class="mdi mdi-account-plus"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 text-truncate ms-2">
                                            <h5 class="noti-item-title fw-semibold font-14">Admin <small class="fw-normal text-muted ms-1">1 hours ago</small></h5>
                                            <small class="noti-item-subtitle text-muted">New user registered</small>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <h5 class="text-muted font-13 fw-normal mt-0">Yesterday</h5>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-1">
                                <div class="card-body">
                                    <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="notify-icon">
                                                <img src="{{asset('assets/images/users/avatar-2.jpg')}}" class="img-fluid rounded-circle" alt="" />
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 text-truncate ms-2">
                                            <h5 class="noti-item-title fw-semibold font-14">Cristina Pride <small class="fw-normal text-muted ms-1">1 day ago</small></h5>
                                            <small class="noti-item-subtitle text-muted">Hi, How are you? What about our next meeting</small>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <h5 class="text-muted font-13 fw-normal mt-0">30 Dec 2021</h5>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-1">
                                <div class="card-body">
                                    <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="notify-icon bg-primary">
                                                <i class="mdi mdi-comment-account-outline"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 text-truncate ms-2">
                                            <h5 class="noti-item-title fw-semibold font-14">Datacorp</h5>
                                            <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on Admin</small>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-1">
                                <div class="card-body">
                                    <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="notify-icon">
                                                <img src="assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" />
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 text-truncate ms-2">
                                            <h5 class="noti-item-title fw-semibold font-14">Karen Robinson</h5>
                                            <small class="noti-item-subtitle text-muted">Wow ! this admin looks good and awesome design</small>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <div class="text-center">
                                <i class="mdi mdi-dots-circle mdi-spin text-muted h3 mt-0"></i>
                            </div>
                        </div>

                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item border-top border-light py-2">
                            View All
                        </a>

                    </div>
                </li>

                <!-- Light/Dark Mode Toggle Button -->
                <li class="d-none d-sm-inline-block">
                    <div class="nav-link waves-effect waves-light" id="light-dark-mode">
                        <i class="ri-moon-line font-22"></i>
                    </div>
                </li>

                <!-- User Dropdown -->
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{asset('assets/images/users/user-1.jpg')}}" alt="user-image" class="rounded-circle">
                        <span class="ms-1 d-none d-md-inline-block">
                            {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>My Account</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-settings"></i>
                            <span>Settings</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-lock"></i>
                            <span>Lock Screen</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();"
                          class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>{{ __('Logout') }}</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                </li>


            </ul>
        </div>
    </div>
    <!-- ========== Topbar End ========== -->

    <div class="content">


        <div class="contain">
            <!-- Start Content-->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>


                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                    <li class="breadcrumb-item active">Admin Dashboard </li>
                                </ol>
                            </div>
                            <h4 class="page-title">Admin Dashboard </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <!-- Portlet card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="card-widgets">
                                    <a href="javascript: void(0);" data-bs-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                    <a data-bs-toggle="collapse" href="#cardCollpase1" role="button" aria-expanded="false" aria-controls="cardCollpase1"><i class="mdi mdi-minus"></i></a>
                                    <a href="javascript: void(0);" data-bs-toggle="remove"><i class="mdi mdi-close"></i></a>
                                </div>
                                <h4 class="header-title mb-0">Lifetime Sales</h4>

                                <div id="cardCollpase1" class="collapse show">
                                    <div class="text-center pt-3">
                                        <div class="row mt-2">
                                            <div class="col-4">
                                                <h3 data-plugin="counterup">3,487</h3>
                                                <p class="text-muted font-13 mb-0 text-truncate">Total Sales</p>
                                            </div>
                                            <div class="col-4">
                                                <h3 data-plugin="counterup">814</h3>
                                                <p class="text-muted font-13 mb-0 text-truncate">Open Campaign</p>
                                            </div>
                                            <div class="col-4">
                                                <h3 data-plugin="counterup">5,324</h3>
                                                <p class="text-muted font-13 mb-0 text-truncate">Daily Sales</p>
                                            </div>
                                        </div> <!-- end row -->

                                        <div  dir="ltr">
                                            <div id="lifetime-sales" data-colors="#4fc6e1,#6658dd,#ebeff2" style="height: 270px;" class="morris-chart mt-3"></div>
                                        </div>
                                    </div>
                                </div> <!-- end collapse-->
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-xl-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-widgets">
                                    <a href="javascript: void(0);" data-bs-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                    <a data-bs-toggle="collapse" href="#cardCollpase3" role="button" aria-expanded="false" aria-controls="cardCollpase3"><i class="mdi mdi-minus"></i></a>
                                    <a href="javascript: void(0);" data-bs-toggle="remove"><i class="mdi mdi-close"></i></a>
                                </div>
                                <h4 class="header-title mb-0">Statistics</h4>

                                <div id="cardCollpase3" class="collapse show">
                                    <div class="text-center pt-3">

                                        <div class="row mt-2">
                                            <div class="col-6">
                                                <h3 data-plugin="counterup">1,284</h3>
                                                <p class="text-muted font-13 mb-0 text-truncate">Total Sales</p>
                                            </div>
                                            <div class="col-6">
                                                <h3 data-plugin="counterup">7,841</h3>
                                                <p class="text-muted font-13 mb-0 text-truncate">Open Campaign</p>
                                            </div>
                                        </div> <!-- end row -->

                                        <div  dir="ltr">
                                            <div id="statistics-chart" data-colors="#02c0ce" style="height: 270px;" class="morris-chart mt-3"></div>
                                        </div>

                                    </div>
                                </div> <!-- end collapse-->
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-xl-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-widgets">
                                    <a href="javascript: void(0);" data-bs-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                    <a data-bs-toggle="collapse" href="#cardCollpase2" role="button" aria-expanded="false" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                                    <a href="javascript: void(0);" data-bs-toggle="remove"><i class="mdi mdi-close"></i></a>
                                </div>
                                <h4 class="header-title mb-0">Income Amounts</h4>

                                <div id="cardCollpase2" class="collapse show">
                                    <div class="text-center pt-3">
                                        <div class="row mt-2">
                                            <div class="col-4">
                                                <h3 data-plugin="counterup">2,845</h3>
                                                <p class="text-muted font-13 mb-0 text-truncate">Total Sales</p>
                                            </div>
                                            <div class="col-4">
                                                <h3 data-plugin="counterup">6,487</h3>
                                                <p class="text-muted font-13 mb-0 text-truncate">Open Campaign</p>
                                            </div>
                                            <div class="col-4">
                                                <h3 data-plugin="counterup">201</h3>
                                                <p class="text-muted font-13 mb-0 text-truncate">Daily Sales</p>
                                            </div>
                                        </div> <!-- end row -->

                                        <div  dir="ltr">
                                            <div id="income-amounts" data-colors="#4a81d4,#e3eaef" style="height: 270px;" class="morris-chart mt-3"></div>
                                        </div>

                                    </div>
                                </div> <!-- end collapse-->
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div>
                <!-- end row -->


               <div class="row">
<div class="col-md-6 col-xl-3">
    <div class="widget-rounded-circle card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-auto">
                    <div class="avatar-lg">
                        <img src="{{ asset('assets/images/users/user-3.jpg') }}" class="img-fluid rounded-circle" alt="user-img">
                    </div>
                </div>
                <div class="col">
                    <h5 class="mb-1 mt-2 font-16">Thelma Fridley</h5>
                    <p class="mb-2 text-muted">Admin User</p>
                </div>
            </div> <!-- end row-->
        </div>
    </div> <!-- end widget-rounded-circle-->
</div> <!-- end col-->

<div class="col-md-6 col-xl-3">
    <div class="widget-rounded-circle card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-auto">
                    <div class="avatar-lg">
                        <img src="{{ asset('assets/images/users/user-4.jpg') }}" class="img-fluid rounded-circle" alt="user-img">
                    </div>
                </div>
                <div class="col">
                    <h5 class="mb-1 mt-2 font-16">Chandler Hervieux</h5>
                    <p class="mb-2 text-muted">Manager</p>
                </div>
            </div> <!-- end row-->
        </div>
    </div> <!-- end widget-rounded-circle-->
</div> <!-- end col-->

<div class="col-md-6 col-xl-3">
    <div class="widget-rounded-circle card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-auto">
                    <div class="avatar-lg">
                        <img src="{{ asset('assets/images/users/user-5.jpg') }}" class="img-fluid rounded-circle" alt="user-img">
                    </div>
                </div>
                <div class="col">
                    <h5 class="mb-1 mt-2 font-16">Percy Demers</h5>
                    <p class="mb-2 text-muted">Director</p>
                </div>
            </div> <!-- end row-->
        </div>
    </div> <!-- end widget-rounded-circle-->
</div> <!-- end col-->

<div class="col-md-6 col-xl-3">
    <div class="widget-rounded-circle card bg-blue">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-auto">
                    <div class="avatar-lg">
                        <img src="{{ asset('assets/images/users/user-6.jpg') }}" class="img-fluid rounded-circle img-thumbnail" alt="user-img">
                    </div>
                </div>
                <div class="col">
                    <h5 class="mb-1 mt-2 text-white font-16">Antoine Masson</h5>
                    <p class="mb-2 text-white-50">Premium User</p>
                </div>
            </div> <!-- end row-->
        </div>
    </div> <!-- end widget-rounded-circle-->
</div> <!-- end col-->
</div>

                <!-- end row -->

                <div class="row">
                    <div class="col-12">
                        <!-- Portlet card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="card-widgets">
                                    <a href="javascript: void(0);" data-bs-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                    <a data-bs-toggle="collapse" href="#cardCollpase4" role="button" aria-expanded="false" aria-controls="cardCollpase4"><i class="mdi mdi-minus"></i></a>
                                    <a href="javascript: void(0);" data-bs-toggle="remove"><i class="mdi mdi-close"></i></a>
                                </div>
                                <h4 class="header-title mb-0">Projects</h4>

                                <div id="cardCollpase4" class="collapse show">
                                    <div class="table-responsive pt-3">
                                        <table class="table table-centered table-nowrap table-borderless mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Project Name</th>
                                                    <th>Start Date</th>
                                                    <th>Due Date</th>
                                                    <th>Team</th>
                                                    <th>Status</th>
                                                    <th>Clients</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>App design and development</td>
                                                    <td>Jan 03, 2015</td>
                                                    <td>Oct 12, 2018</td>
                                                    <td id="tooltip-container">
                                                        <div class="avatar-group">
                                                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Mat Helme">
                                                                <img src="{{ asset('assets/images/users/user-1.jpg') }}" class="rounded-circle avatar-xs" alt="friend">
                                                            </a>

                                                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Michael Zenaty">
                                                                <img src="{{ asset('assets/images/users/user-2.jpg') }}" class="rounded-circle avatar-xs" alt="friend">
                                                            </a>

                                                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="James Anderson">
                                                                <img src="{{ asset('assets/images/users/user-3.jpg') }}" class="rounded-circle avatar-xs" alt="friend">
                                                            </a>

                                                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Username">
                                                                <img src="{{ asset('assets/images/users/user-5.jpg') }}" class="rounded-circle avatar-xs" alt="friend">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge bg-soft-info text-info p-1">Work in Progress</span></td>
                                                    <td>Halette Boivin</td>
                                                </tr>
                                                <tr>
                                                    <td>Coffee detail page - Main Page</td>
                                                    <td>Sep 21, 2016</td>
                                                    <td>May 05, 2018</td>
                                                    <td>
                                                        <div class="avatar-group">
                                                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-placement="top" title="James Anderson">
                                                                <img src="{{ asset('assets/images/users/user-3.jpg') }}" class="rounded-circle avatar-xs" alt="friend">
                                                            </a>

                                                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Mat Helme">
                                                                <img src="{{ asset('assets/images/users/user-4.jpg') }}" class="rounded-circle avatar-xs" alt="friend">
                                                            </a>

                                                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Username">
                                                                <img src="{{ asset('assets/images/users/user-5.jpg') }}" class="rounded-circle avatar-xs" alt="friend">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge bg-soft-warning text-warning p-1">Pending</span></td>
                                                    <td>Durandana Jolicoeur</td>
                                                </tr>
                                                <tr>
                                                    <th>Poster illustration design</th>
                                                    <td>Mar 08, 2018</td>
                                                    <td>Sep 22, 2018</td>
                                                    <td>
                                                        <div class="avatar-group">

                                                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Michael Zenaty">
                                                                <img src="{{ asset('assets/images/users/user-2.jpg') }}" class="rounded-circle avatar-xs" alt="friend">
                                                            </a>

                                                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Mat Helme">
                                                                <img src="{{ asset('assets/images/users/user-6.jpg') }}" class="rounded-circle avatar-xs" alt="friend">
                                                            </a>

                                                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Username">
                                                                <img src="{{ asset('assets/images/users/user-7.jpg') }}" class="rounded-circle avatar-xs" alt="friend">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge bg-soft-success text-success p-1">Completed</span></td>
                                                    <td>Lucas Sabourin</td>
                                                </tr>
                                                <tr>
                                                    <td>Drinking bottle graphics</td>
                                                    <td>Oct 10, 2017</td>
                                                    <td>May 07, 2018</td>
                                                    <td>
                                                        <div class="avatar-group">
                                                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Mat Helme">
                                                                <img src="{{ asset('assets/images/users/user-9.jpg') }}" class="rounded-circle avatar-xs" alt="friend">
                                                            </a>

                                                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Michael Zenaty">
                                                                <img src="{{ asset('assets/images/users/user-10.jpg') }}" class="rounded-circle avatar-xs" alt="friend">
                                                            </a>

                                                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-placement="top" title="James Anderson">
                                                                <img src="{{ asset('assets/images/users/user-1.jpg') }}" class="rounded-circle avatar-xs" alt="friend">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge bg-soft-info text-info p-1">Work in Progress</span></td>
                                                    <td>Donatien Brunelle</td>
                                                </tr>
                                                <tr>
                                                    <td>Landing page design - Home</td>
                                                    <td>Coming Soon</td>
                                                    <td>May 25, 2021</td>
                                                    <td>
                                                        <div class="avatar-group">

                                                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Michael Zenaty">
                                                                <img src="{{ asset('assets/images/users/user-5.jpg') }}" class="rounded-circle avatar-xs" alt="friend">
                                                            </a>

                                                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-placement="top" title="James Anderson">
                                                                <img src="{{ asset('assets/images/users/user-8.jpg') }}" class="rounded-circle avatar-xs" alt="friend">
                                                            </a>

                                                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Mat Helme">
                                                                <img src="{{ asset('assets/images/users/user-2.jpg') }}" class="rounded-circle avatar-xs" alt="friend">
                                                            </a>

                                                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Username">
                                                                <img src="{{ asset('assets/images/users/user-7.jpg') }}" class="rounded-circle avatar-xs" alt="friend">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge bg-soft-dark text-dark p-1">Coming Soon</span></td>
                                                    <td>Karel Auberjo</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div> <!-- .table-responsive -->
                                </div> <!-- end collapse-->
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div>

                <!-- end row -->

            </div>

            <!-- container -->

        </div> <!-- content -->
    </div>





</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->





</div>

@endsection
