<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

      <Title> DASHBOARD</Title>
 <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


        <!-- Theme Config Js -->
        <script src="{{asset('assets/js/head.js')}}"></script>

        <!-- Bootstrap css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

        <!-- App css -->
        <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Icons css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
</head>
<body>
     <!-- Begin page -->
     <div id="wrapper">


        <!-- ========== Menu ========== -->
        <div class="app-menu">

            <!-- Brand Logo -->
            <div class="logo-box">
                <!-- Brand Logo Light -->
                <a href="{{url('admin.home')}}" class="logo-light">
                    <img src="{{asset('assets/images/logo-light.png')}}" alt="logo" class="logo-lg">
                    <img src="{{asset('assets/images/logo-sm.png')}}" alt="small logo" class="logo-sm">
                </a>

                <!-- Brand Logo Dark -->
                <a href="{{url('admin.home')}}" class="logo-dark">
                    <img src="{{asset('assets/images/logo-dark.png')}}" alt="dark logo" class="logo-lg">
                    <img src="{{asset('assets/images/logo-sm.png')}}" alt="small logo" class="logo-sm">
                </a>
            </div>

            <!-- menu-left -->
            <div class="scrollbar">

                <!-- User box -->
                <div class="user-box text-center">
                    <img src="assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md">
                    <div class="dropdown">
                        <a href="javascript: void(0);" class="dropdown-toggle h5 mb-1 d-block" data-bs-toggle="dropdown">Geneva Kennedy</a>
                        <div class="dropdown-menu user-pro-dropdown">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-user me-1"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings me-1"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-lock me-1"></i>
                                <span>Lock Screen</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-log-out me-1"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </div>
                    <p class="text-muted mb-0">Admin Head</p>
                </div>

                <!--- Menu -->
                <ul class="menu">

                    <li class="menu-title">Navigation</li>

                    <li class="menu-item bg-success text-white">
                        <a href="{{url('admin.home')}}"  class="menu-link ">
                            <span class="menu-icon"><i data-feather="airplay"></i></span>
                            <span class=""> Dashboards </span>

                        </a>

                    </li>

                    <li class="menu-item">
                        <a href="#menuCrm" data-bs-toggle="collapse" class="menu-link">
                            <span class="menu-icon"><i data-feather="users"></i></span>
                            <span class="menu-text"> CRM </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menuCrm">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a href="{{url('admin.product')}}" class="menu-link">
                                        <span class="menu-text">Product</span>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a href="{{url('admin.category')}}" class="menu-link">
                                        <span class="menu-text">Categories</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{url('admin.gender')}}" class="menu-link">
                                        <span class="menu-text">Genders</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ url('admin.blog')}}" class="menu-link">
                                        <span class="menu-text">Blog</span>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a href="{{url('admin.home')}}" class="menu-link">
                                        <span class="menu-text">Orders</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{url('admin.home')}}" class="menu-link">
                                        <span class="menu-text">Customers</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <!--- End Menu -->
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- ========== Left menu End ========== -->





        <!-- ============================================================== -->
        <!-- Start Page Content here -->
@yield('content')
        <!-- ============================================================== -->


        <!-- Vendor js -->
        <script src="{{asset('assets/js/vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('assets/js/app.min.js')}}"></script>

        <!-- Plugins js -->
        <script src="{{asset('assets/libs/morris.js06/morris.min.js')}}"></script>
        <script src="{{asset('assets/libs/raphael/raphael.min.js')}}"></script>

        <!-- Dashboard init-->
        <script src="{{asset('assets/js/pages/dashboard-4.init.js')}}"></script>
</body>
</html>
