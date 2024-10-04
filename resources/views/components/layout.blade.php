<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
    <meta name="keywords"
        content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
    <meta name="author" content="elemis">
    <title>DEVNATION</title>
    <link rel="shortcut icon" href={{ asset('/assets/img/favicon.png') }}>
    @if (Request::is('events'))
        <link rel="stylesheet" href={{ asset('/assets/css/events.css') }}>
    @endif
    <link rel="stylesheet" href={{ asset('/assets/css/plugins.css') }}>
    <link rel="stylesheet" href={{ asset('/assets/css/style.css') }}>
    <link rel="stylesheet" href={{ asset('/assets/css/colors/navy.css') }}>
    <link rel="stylesheet" href={{ asset('/assets/css/profile.css') }}>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.0.1/css/unicons.css">
</head>

<body>
    <div class="content-wrapper">

        {{ $slot }}
        <footer class="bg-dark text-inverse">
            <div class="container pt-20 pt-lg-21 pb-7">
                <div class="row gy-6 gy-lg-0">
                    <div class="col-lg-4">
                        <div class="widget">
                            <h3 class="h2 mb-3 text-white">Join the Community</h3>
                            <p class="lead mb-5">Let's make something great together. We are trusted by over 5000+
                                clients. Join them by using our services and grow your business.</p>
                            <a href="#" class="btn btn-white  rounded-pill">Join Us</a>
                        </div>
                        <!-- /.widget -->
                    </div>
                    <!-- /column -->
                    <div class="col-md-4 col-lg-2 offset-lg-2">
                        <div class="widget">
                            <h4 class="widget-title text-white mb-3">Need Help?</h4>
                            <ul class="list-unstyled text-reset mb-0">
                                <li><a href="#">Support</a></li>
                                <li><a href="#">Get Started</a></li>
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                        <!-- /.widget -->
                    </div>
                    <!-- /column -->
                    <div class="col-md-4 col-lg-2">
                        <div class="widget">
                            <h4 class="widget-title text-white mb-3">Learn More</h4>
                            <ul class="list-unstyled  mb-0">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Our Story</a></li>
                                <li><a href="#">Projects</a></li>
                                <li><a href="#">Pricing</a></li>
                                <li><a href="#">Features</a></li>
                            </ul>
                        </div>
                        <!-- /.widget -->
                    </div>
                    <!-- /column -->
                    <div class="col-md-4 col-lg-2">
                        <div class="widget">
                            <h4 class="widget-title text-white mb-3">Get in Touch</h4>
                            <address>Moonshine St. 14/05 Light City, London, United Kingdom</address>
                            <a href="cdn-cgi/l/email-protection.html#96f0ffe4e5e2b8faf7e5e2d6f3fbf7fffab8f5f9fb"><span
                                    class="__cf_email__"
                                    data-cfemail="f79e999198b7929a969e9bd994989a">[email&#160;protected]</span></a><br />
                            00 (123) 456 78 90
                        </div>
                        <!-- /.widget -->
                    </div>
                    <!-- /column -->
                </div>
                <!--/.row -->
                <hr class="mt-13 mt-md-15 mb-7" />
                <div class="d-md-flex align-items-center justify-content-between">
                    <p class="mb-2 mb-lg-0">©
                        <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                        <script>
                            document.write(new Date().getUTCFullYear());
                        </script> Sandbox. All rights reserved.
                    </p>
                    <nav class="nav social social-white text-md-end">
                        <a href="#"><i class="uil uil-twitter"></i></a>
                        <a href="#"><i class="uil uil-facebook-f"></i></a>
                        <a href="#"><i class="uil uil-dribbble"></i></a>
                        <a href="#"><i class="uil uil-instagram"></i></a>
                        <a href="#"><i class="uil uil-youtube"></i></a>
                    </nav>
                    <!-- /.social -->
                </div>
                <!-- /div -->
            </div>
            <!-- /.container -->
        </footer>
        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
        <script src="/assets/js/plugins.js"></script>
        <script src="/assets/js/theme.js"></script>
</body>


<!-- Mirrored from sandbox.elemisthemes.com/demo17.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 Sep 2024 05:33:07 GMT -->

</html>
