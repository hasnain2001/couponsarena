

    <footer>
        <div class="footer-container">
            <div class="col-md-1  col-sm-2text-center">
                <a href="{{ url(app()->getLocale() . '/') }}/">
                    <img src="{{ asset('images/logo.png') }}" class="footerimg " alt="Logo">
                </a>
            </div>

            <div class="col-md-8 offset-md-1 ">
                <div class="footer-right">
                    <div class="">
                        <p class="subscribe mt-2">@lang('message.Subscribe to our Newsletter')</p>
                        <form class="mt-2" id="subscribeForm">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="email" class="form-control" placeholder="@lang('message.Enter Your Email')" required>
                                <button type="submit" class="btn btn-dark text-white">@lang('message.Subscribe ')</button>
                            </div>
                        </form>
                        <p id="thankYouMessage" style="display:none; color: rgb(255, 255, 255);">
                            Thank you for subscribing to us!
                            <button type="button" class="btn-close" aria-label="Close" onclick="document.getElementById('thankYouMessage').style.display='none';"></button>
                        </p>

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



