<footer class="bg-dark text-inverse">
    <div class="container pt-20 pt-lg-21 pb-7">
        <div class="row gy-6 gy-lg-0">
            <div class="col-lg-4">
                <div class="widget">
                    <h3 class="h2 mb-3 text-white">Join the Community</h3>
                    <p class="lead mb-5 text-justify" style="text-decoration: none">Let's make something great together.
                        We are a community by over 500+
                        students. Join us by signing up to DevNation and grow together.</p>
                    <a href="{{ route('user.showRegister') }}" class="btn btn-white  rounded-pill">Join Us</a>
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->
            <div class="col-md-4 col-lg-2 offset-lg-2">
                <div class="widget">
                    <h4 class="widget-title text-white mb-3">Need Help?</h4>
                    <ul class="list-unstyled text-reset mb-0">
                        <li><a href="{{ route('contact') }}">Support</a></li>
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
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('event.index') }}">Events</a></li>
                        <li><a href="{{ route('gallery.index') }}">Gallery</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                        <li><a href="{{ route('team') }}">Our Team</a></li>
                    </ul>
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->
            <div class="col-md-4 col-lg-2">
                <div class="widget">
                    <h4 class="widget-title text-white mb-3">Get in Touch</h4>
                    <address></address>
                    <a href="/"><span class="__cf_email__">drshnbhandary@gmail.com</span></a><br />
                    +91 90 1900 3490
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->
        </div>
        <!--/.row -->
        <hr class="mt-13 mt-md-15 mb-7" />
        <div class="d-md-flex align-items-center justify-content-between">
            <p class="mb-2 mb-lg-0">©
                {{-- <script data-cfasync="false" src=""></script> --}}
                <script>
                    document.write(new Date().getUTCFullYear());
                </script> DevNation. All rights reserved.
            </p>
            <nav class="nav social social-white text-md-end">
                <a href="#"><i class="uil uil-linkedin"></i></a>
                <a href="#"><i class="uil uil-instagram"></i></a>
                <a href="#"><i class="uil uil-github"></i></a>
                <a href="#"><i class="uil uil-youtube"></i></a>
            </nav>
            <!-- /.social -->
        </div>
        <!-- /div -->
    </div>
    <!-- /.container -->
</footer>
{{-- <div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div> --}}
