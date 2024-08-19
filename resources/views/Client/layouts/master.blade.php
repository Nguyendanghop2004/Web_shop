<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title>Reader | Hugo Personal Blog Template</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="This is meta description">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Hugo 0.74.3" />

    <!-- plugins -->partials
    @include('Client.layouts.partials.headCSS')


    <meta property="og:title" content="Reader | Hugo Personal Blog Template" />
    <meta property="og:description" content="This is meta description" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:updated_time" content="2020-03-15T15:40:24+06:00" />
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            
        </div>
    </nav>
    <!-- navigation -->
    <header class="navigation fixed-top">
        <div class="container">
            @include('Client.layouts.partials.nav')

        </div>
    </header>
    <!-- /navigation -->
    <div class="header text-center">
        @include('Client.layouts.partials.headerConter')

    </div>


    <section class="section-sm">
        <div class="container">
            @yield('content')
        </div>
    </section>

    <footer class="footer">
        <svg class="footer-border" height="214" viewBox="0 0 2204 214" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M2203 213C2136.58 157.994 1942.77 -33.1996 1633.1 53.0486C1414.13 114.038 1200.92 188.208 967.765 118.127C820.12 73.7483 263.977 -143.754 0.999958 158.899"
                stroke-width="2" />
        </svg>

        <div class="instafeed text-center mb-5">
            <h2 class="h3 mb-4">INSTAGRAM POST</h2>

            <div class="instagram-slider">
                <div class="instagram-post"><img src="{{ asset('assets/client/images/instagram/1.jpg') }}"></div>
                <div class="instagram-post"><img src="{{ asset('assets/client/images/instagram/2.jpg') }}"></div>
                <div class="instagram-post"><img src="{{ asset('assets/client/images/instagram/4.jpg') }}"></div>
                <div class="instagram-post"><img src="{{ asset('assets/client/images/instagram/3.jpg') }}"></div>
                <div class="instagram-post"><img src="{{ asset('assets/client/images/instagram/2.jpg') }}"></div>
                <div class="instagram-post"><img src="{{ asset('assets/client/images/instagram/1.jpg') }}"></div>
                <div class="instagram-post"><img src="{{ asset('assets/client/images/instagram/3.jpg') }}"></div>
                <div class="instagram-post"><img src="{{ asset('assets/client/images/instagram/4.jpg') }}"></div>
                <div class="instagram-post"><img src="{{ asset('assets/client/images/instagram/2.jpg') }}"></div>
                <div class="instagram-post"><img src="{{ asset('assets/client/images/instagram/4.jpg') }}"></div>
            </div>
        </div>

        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 text-center text-md-left mb-4">
                    <ul class="list-inline footer-list mb-0">
                        <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="terms-conditions.html">Terms Conditions</a></li>
                    </ul>
                </div>
                <div class="col-md-2 text-center mb-4">
                    <a href="index.html"><img class="img-fluid" width="100px"
                            src="{{ asset('assets/client/images/logo.png') }}"
                            alt="Reader | Hugo Personal Blog Template"></a>
                </div>
                <div class="col-md-5 text-md-right text-center mb-4">
                    <ul class="list-inline footer-list mb-0">

                        <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>

                        <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>

                        <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>

                        <li class="list-inline-item"><a href="#"><i class="ti-github"></i></a></li>

                        <li class="list-inline-item"><a href="#"><i class="ti-youtube"></i></a></li>

                    </ul>
                </div>
                <div class="col-12">
                    <div class="border-bottom border-default"></div>
                </div>
            </div>
        </div>
    </footer>


    <!-- JS Plugins -->
    <script src="{{ asset('assets/client/plugins/jQuery/jquery.min.js') }}"></script>

    <script src="{{ asset('assets/client/plugins/bootstrap/bootstrap.min.js') }}"></script>

    <script src="{{ asset('assets/client/plugins/slick/slick.min.js') }}"></script>

    <script src="{{ asset('assets/client/plugins/instafeed/instafeed.min.js') }}"></script>


    <!-- Main Script -->
    <script src="{{ asset('assets/client/js/script.js') }}"></script>
</body>

</html>
