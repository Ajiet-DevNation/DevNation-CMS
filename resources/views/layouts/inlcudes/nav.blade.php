<div class="navbar navbar-expand-lg fancy navbar-light navbar-bg-light caret-none" style="height: fit-content">
    <div class="container">
        <nav
            class="navbar-collapse-wrapper bg-white d-flex flex-row flex-nowrap w-100 justify-content-between align-items-center">
            <div class="navbar-brand w-100">
                <a href={{ route('home') }}>
                    <img src="{{ asset('assets/img/logo-dark.png') }}" class="img-fluid h-8 w-auto"
                        srcset="./assets/img/logo-dark.png 2x" alt="DevNation Logo" />
                </a>
            </div>
            <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
                <div class="offcanvas-header d-lg-none">
                    <h3 class="text-white fs-30 mb-0">DevNation</h3>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown dropdown-mega">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                            {{-- <ul class="dropdown-menu mega-menu mega-menu-dark mega-menu-img">
                                            <li class="mega-menu-content mega-menu-scroll">
                                                <ul
                                                    class="row row-cols-1 row-cols-lg-6 gx-0 gx-lg-4 gy-lg-2 list-unstyled">
                                                    <li class="col">
                                                        <a class="dropdown-item" href="demo1.html">
                                                            <figure class="rounded lift d-none d-lg-block"><img
                                                                    src="assets/img/demos/mi1.jpg"
                                                                    srcset="./assets/img/demos/mi1@2x.jpg 2x" alt="">
                                                            </figure>
                                                            <span class="d-lg-none">Demo 1</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!--/.row -->
                                                <span class="d-none d-lg-flex"><i
                                                        class="uil uil-direction"></i><strong>Scroll to view
                                                        more</strong></span>
                                            </li>
                                            <!--/.mega-menu-content-->
                                        </ul> --}}
                            <!--/.dropdown-menu -->
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="/about">About Us</a>
                            {{-- <ul class="dropdown-menu">
                                            <li class="dropdown dropdown-submenu dropend"><a
                                                    class="dropdown-item dropdown-toggle" href="#"
                                                    data-bs-toggle="dropdown">Services</a>
                                                <ul class="dropdown-menu">
                                                    <li class="nav-item"><a class="dropdown-item"
                                                            href="services.html">Services I</a></li>
                                                    <li class="nav-item"><a class="dropdown-item"
                                                            href="services2.html">Services II</a></li>
                                                </ul>
                                            </li>
                                        </ul> --}}
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('event.index') }}">Events</a>
                            {{-- <div class="dropdown-menu dropdown-lg">
                                            <div class="dropdown-lg-content">
                                                <div>
                                                    <h6 class="dropdown-header">Project Pages</h6>
                                                    <ul class="list-unstyled">
                                                        <li><a class="dropdown-item" href="projects.html">Projects
                                                                I</a></li>
                                                        <li><a class="dropdown-item" href="projects2.html">Projects
                                                                II</a></li>
                                                        <li><a class="dropdown-item" href="projects3.html">Projects
                                                                III</a></li>
                                                        <li><a class="dropdown-item" href="projects4.html">Projects
                                                                IV</a></li>
                                                    </ul>
                                                </div>
                                                <!-- /.column -->
                                                <div>
                                                    <h6 class="dropdown-header">Single Projects</h6>
                                                    <ul class="list-unstyled">
                                                        <li><a class="dropdown-item" href="single-project.html">Single
                                                                Project I</a></li>
                                                        <li><a class="dropdown-item" href="single-project2.html">Single
                                                                Project II</a></li>
                                                        <li><a class="dropdown-item" href="single-project3.html">Single
                                                                Project III</a></li>
                                                        <li><a class="dropdown-item" href="single-project4.html">Single
                                                                Project IV</a></li>
                                                    </ul>
                                                </div>
                                                <!-- /.column -->
                                            </div>
                                            <!-- /auto-column -->
                                        </div> --}}
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('team') }}">Team</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link " href="{{ route('gallery.index') }}">Gallery</a>
                            {{-- data-bs-toggle="dropdown">Blog</a> --}}
                            {{-- <ul class="dropdown-menu">
                                            <li class="nav-item"><a class="dropdown-item" href="blog.html">Blog
                                                    without Sidebar</a></li>
                                            <li class="nav-item"><a class="dropdown-item" href="blog2.html">Blog with
                                                    Sidebar</a></li>
                                            <li class="nav-item"><a class="dropdown-item" href="blog3.html">Blog with
                                                    Left Sidebar</a></li>
                                            <li class="dropdown dropdown-submenu dropend"><a
                                                    class="dropdown-item dropdown-toggle" href="#"
                                                    data-bs-toggle="dropdown">Blog Posts</a>
                                                <ul class="dropdown-menu">
                                                    <li class="nav-item"><a class="dropdown-item"
                                                            href="blog-post.html">Post without Sidebar</a></li>
                                                    <li class="nav-item"><a class="dropdown-item"
                                                            href="blog-post2.html">Post with Sidebar</a></li>
                                                    <li class="nav-item"><a class="dropdown-item"
                                                            href="blog-post3.html">Post with Left Sidebar</a></li>
                                                </ul>
                                            </li>
                                        </ul> --}}
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                            {{-- data-bs-toggle="dropdown">Blog</a> --}}
                            {{-- <ul class="dropdown-menu">
                                            <li class="nav-item"><a class="dropdown-item" href="blog.html">Blog
                                                    without Sidebar</a></li>
                                            <li class="nav-item"><a class="dropdown-item" href="blog2.html">Blog with
                                                    Sidebar</a></li>
                                            <li class="nav-item"><a class="dropdown-item" href="blog3.html">Blog with
                                                    Left Sidebar</a></li>
                                            <li class="dropdown dropdown-submenu dropend"><a
                                                    class="dropdown-item dropdown-toggle" href="#"
                                                    data-bs-toggle="dropdown">Blog Posts</a>
                                                <ul class="dropdown-menu">
                                                    <li class="nav-item"><a class="dropdown-item"
                                                            href="blog-post.html">Post without Sidebar</a></li>
                                                    <li class="nav-item"><a class="dropdown-item"
                                                            href="blog-post2.html">Post with Sidebar</a></li>
                                                    <li class="nav-item"><a class="dropdown-item"
                                                            href="blog-post3.html">Post with Left Sidebar</a></li>
                                                </ul>
                                            </li>
                                        </ul> --}}
                        </li>
                    </ul>
                    <!-- /.navbar-nav -->
                    <div class="offcanvas-footer d-lg-none">
                        <div>
                            <a href="/"
                                class="link-inverse"><span class="__cf_email__">drshnbhandary@gmail.com</span></a>
                            <br /> +91 90 1900 3490 <br />
                            <nav class="nav social social-white mt-4">
                                <a href="#"><i class="uil uil-linkedin"></i></a>
                                <a href="#"><i class="uil uil-youtube"></i></a>
                                <a href="#"><i class="uil uil-instagram"></i></a>
                                <a href="#"><i class="uil uil-github"></i></a>
                            </nav>
                            <!-- /.social -->
                        </div>
                    </div>
                    <!-- /.offcanvas-footer -->
                </div>
                <!-- /.offcanvas-body -->
            </div>
            <!-- /.navbar-collapse -->
            <div class="navbar-other w-100 d-flex ms-auto">
                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <li class="nav-item">
                        <nav class="nav social social-muted justify-content-end text-end">
                            <a href="#"><i class="uil uil-linkedin"></i></a>
                            <a href="#"><i class="uil uil-instagram"></i></a>
                            <a href="#"><i class="uil uil-github"></i></a>
                        </nav>
                        <!-- /.social -->
                    </li>
                    <li class="nav-item d-lg-none">
                        <button class="hamburger offcanvas-nav-btn"><span></span></button>
                    </li>
                </ul>
                <!-- /.navbar-nav -->
            </div>
            <!-- /.navbar-other -->
        </nav>
    </div>
</div>