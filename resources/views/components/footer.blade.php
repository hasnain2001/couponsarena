<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        footer {
            background-color: #791291;
            color: white;
            padding-top: 0;
            height: auto;
            position: relative;
        }
        footer .footer-container {
            display: flex;
            justify-content: space-evenly;
            align-items: inherit;
            flex-wrap: wrap;
        }
        footer .footerimg {
            padding-right: 0;
            padding-top: 80px;
            width: 270px;
            height: 300px; /* Allow dynamic height */
        }
        footer a {
            color: #00bcd4;
            text-decoration: none;
            margin: 0 10px;
        }
        footer a:hover {
            color: #fff;
        }
        footer .social-icons a {
            font-size: 20px;
            margin: 0 10px;
            color: white;
        }
        footer .social-icons a:hover {
            color: #030b0c;
        }
        footer .footer-links {
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
        }
        footer .footer-links a {
            display: inline-block;
            margin: 5px;
            padding: 10px 15px;
            background-color: #050505;
            border-radius: 5px;
            color: white;
        }
        footer .footer-links a:hover {
            background-color: #530e63;
        }
        footer p {
            font-size: 14px;
            margin-top: 10px;
        }
        footer .disclaimer {
            font-size: 12px;
            color: #bdc3c7;
        }
        .subscribe {
            font-weight: bold;
            color: white;
        }
        footer .col-md-8 {
            margin-top: 80px;
        }
        .input-group {
            max-width:670px; /* Use max-width for responsiveness */
            margin-right: 10px;
            padding: 10px;
        }
        .input-group input {
        }
        /* .input-group button {
            width: auto;
            background-color: #030b0c;
            color: white;
        } */

        /* Responsive styles */
/* Responsive styles */
@media (max-width: 768px) {
    footer {
        padding: 10px 0;
        height: auto;
    }
    footer .footerimg {
        width: 120px;
        padding-top: 20px; /* Reduce padding to decrease space on mobile */
    }
    footer .col-md-8 {
        margin-top: 20px; /* Reduce the top margin to bring the sections closer */
    }
    footer .footer-container {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
    footer .footer-links {
        flex-direction: column;
        align-items: center;
        margin: 10px 0;
    }
    footer .footer-links a {
        width: 90%;
        text-align: center;
    }
    footer .social-icons {
        margin-top: 10px;
    }
    .input-group input {
        width: 90%;
    }
    .input-group button {
        width: 100%;
        margin-top: 10px;
    }
    .subscribe {
        margin-top: 15px;
    }
}

    </style>
</head>
<body>
    <br>
    <footer>
        <div class="footer-container">
            <div class="col-md-1  col-sm-2text-center">
                <a href="{{ url(app()->getLocale() . '/') }}/">
                    <img src="{{ asset('images/logo.png') }}" class="footerimg " alt="Logo">
                </a>
            </div>

            <div class="col-md-8 offset-md-1 ">
                <div class="footer-right">
                    <div class="social-icons">
                        <p class="subscribe mt-2">@lang('message.Subscribe to our Newsletter')</p>
                        <form class="mt-2">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="email" class="form-control" placeholder="@lang('message.Enter Your Email')" required>
                                <button type="submit" class="btn btn-dark text-white  ">@lang('message.Subscribe ')</button>
                            </div>
                        </form>
                    </div>

<div class="footer-links">
    <a href="{{url(app()->getLocale() . '/about') }}">@lang('message.About-Us')</a>

    <a href="{{ url(app()->getLocale() . '/privacy') }}">@lang('message.Privacy Policy') </a>
    <a href="{{ url(app()->getLocale() . '/terms-and-condition') }}">@lang('message.Terms and Condition')</a>
    {{-- <a href="{{ url(app()->getLocale() . '/cookies')  }}">@lang('message.Cookies Policy')</a> --}}
    <a href="{{ url(app()->getLocale() . '/imprint')  }}">@lang('message.Imprint')</a>
</div>
                    <p>@lang('message.Copyright &copy; 2024 couponsarena.com - All rights reserved')</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
