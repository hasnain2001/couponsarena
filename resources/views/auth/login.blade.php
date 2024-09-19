<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Add Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
    <style>
        body {
            background-image: url({{ asset('images/login.png') }});
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-card {
            background-color: rgba(255, 255, 255, 0.8); /* Transparent background */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .logo {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .heading  {
            text-align: center;
            font-size: 25px;
            color: black;

        }
    </style>
</head>
<body>
          <!-- Validation Errors -->
@if ($errors->any())
    <div class="alert alert-danger mb-4">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


        <!-- Session Status -->
        @if (session('status'))
        <div class="alert alert-success mb-4">
            {{ session('status') }}
        </div>
        @endif


    <div class="login-card col-md-4 col-sm-8">
        <!-- Logo Section -->
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" width="100">

        </div>
<div class="">    <h1 class="heading">Login</h1></div>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
            </div>

            <!-- Remember Me -->
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
            </div>

            <!-- Forgot Password Link -->
            @if (Route::has('password.request'))
                <div class="mb-3">
                    <a href="{{ route('password.request') }}" class="text-sm text-decoration-none">{{ __('Forgot your password?') }}</a>
                </div>
            @endif

            <!-- Login Button -->
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">{{ __('Log in') }}</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('bootstrap-5.0.2-dist/js/bootstrap.min.js') }}"></script>
</body>
</html>