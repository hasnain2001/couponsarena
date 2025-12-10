<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'Admin Panel') - CouponsArena</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Admin CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/admin-styles.css') }}">
     <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    @stack('styles')
</head>

<body>
    <header>
        @include('admin.layouts.navigation')
    </header>

    <div class="container-fluid">
        <div class="row">
            @include('admin.layouts.sidebar')

            <main class="col-md-10 ms-sm-auto px-4 py-4">
                @yield('main-content')
            </main>
        </div>
    </div>

    @stack('scripts')

    <!-- Bootstrap 5 Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Admin JavaScript -->
    <script src="{{ asset('admin/js/admin-scripts.js') }}"></script>
    <!-- ck editor  -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/super-build/ckeditor.js"></script>
    <script>CKEDITOR.replace( 'description' );</script>
    <script src="{{ asset('js/cke-ditor.js') }}"></script>
</body>
</html>
