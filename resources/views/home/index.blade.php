@extends('layouts.app')

@section('meta')
<meta name="description"
    content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
<meta name="keywords"
    content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
<meta name="author" content="elemis">
@endsection

@section('title', 'Home')

@section('content')
<section class="wrapper bg-gray">
    @include('layouts.inlcudes.nav')
    <div class="container pt-12 pt-md-16 text-center">
        <div class="row">
            <div class="col-lg-8 col-xxl-7 mx-auto text-center" data-cues="slideInDown" data-group="page-title"
                data-delay="600">
                <h2 class="fs-16 text-uppercase ls-xl text-dark mb-4" data-cue="slideInDown" data-group="page-title"
                    data-delay="600" data-show="true"
                    style="animation-name: slideInDown; animation-duration: 700ms; animation-timing-function: ease; animation-delay: 600ms; animation-direction: normal; animation-fill-mode: both;">
                    Welcome to DevNation</h2>
                <h1 class="display-1 fs-58 mb-7" data-cue="slideInDown" data-group="page-title" data-delay="600"
                    data-show="true"
                    style="animation-name: slideInDown; animation-duration: 700ms; animation-timing-function: ease; animation-delay: 900ms; animation-direction: normal; animation-fill-mode: both;">
                    Empowering developers through innovation and community.</h1>
                <div class="d-flex justify-content-center mb-5 mb-md-0" data-cues="slideInDown"
                    data-group="page-title-buttons" data-delay="900" data-cue="slideInDown" data-disabled="true"
                    data-show="true"
                    style="animation-name: slideInDown; animation-duration: 700ms; animation-timing-function: ease; animation-delay: 900ms; animation-direction: normal; animation-fill-mode: both;">
                    <span data-cue="slideInDown" data-group="page-title-buttons" data-delay="900" data-show="true"
                        style="animation-name: slideInDown; animation-duration: 700ms; animation-timing-function: ease; animation-delay: 1200ms; animation-direction: normal; animation-fill-mode: both;"><a
                            href="#" class="btn btn-lg btn-primary rounded-pill me-2">Join Us</a></span>
                    <span data-cue="slideInDown" data-group="page-title-buttons" data-delay="900" data-show="true"
                        style="animation-name: slideInDown; animation-duration: 700ms; animation-timing-function: ease; animation-delay: 1500ms; animation-direction: normal; animation-fill-mode: both;"><a
                            href="{{ route('contact') }}" class="btn btn-lg btn-outline-primary rounded-pill">Contact
                            Us</a></span>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <figure class="position-absoute" style="bottom: 0; left: 0;"><img src="assets/img/photos/bg11.jpg" alt="" />
    </figure>
</section>
<section class="wrapper bg-gray">
    <div class="container">
        <div class="card shadow-none my-n13 my-md-n15 my-lg-n17">
            <div class="card-body py-12 py-lg-14 px-lg-11 py-xl-16 px-xl-13">
                <div class="row text-center">
                    <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto">
                        <h2 class="fs-15 text-uppercase text-muted mb-3">What We Do?</h2>
                        <h3 class="display-4 mb-9">Fostering a vibrant developer community at AJIET Mangalore.</h3>
                    </div>
                </div>
                <div class="row gx-md-8 gx-xl-12 gy-8 mb-14 mb-md-16 text-center">
                    <div class="col-md-4">
                        <div class="icon btn btn-block btn-lg btn-soft-purple pe-none mb-5"> <i
                                class="uil uil-users-alt"></i> </div>
                        <h4>Community Building</h4>
                        <p class="mb-3">Creating a supportive network for developers to connect, collaborate, and grow together.</p>
                        <a href="#" class="more hover link-purple">Learn More</a>
                    </div>
                    <div class="col-md-4">
                        <div class="icon btn btn-block btn-lg btn-soft-green pe-none mb-5"> <i
                                class="uil uil-book-open"></i> </div>
                        <h4>Skill Development</h4>
                        <p class="mb-3">Organizing workshops, seminars, and coding sessions to enhance technical skills.</p>
                        <a href="#" class="more hover link-green">Learn More</a>
                    </div>
                    <div class="col-md-4">
                        <div class="icon btn btn-block btn-lg btn-soft-orange pe-none mb-5"> <i
                                class="uil uil-lightbulb-alt"></i> </div>
                        <h4>Innovation Hub</h4>
                        <p class="mb-3">Encouraging creative problem-solving and fostering innovative projects among members.</p>
                        <a href="#" class="more hover link-orange">Learn More</a>
                    </div>
                </div>
                <div class="row gx-md-8 gx-xl-12 gy-10 align-items-center">
                    <div class="col-lg-6">
                        <h2 class="fs-15 text-uppercase text-muted mb-3">Our Approach</h2>
                        <h3 class="display-4 mb-5">3 key steps to empower our developer community.</h3>
                        <p>At DevNation, we believe in fostering a supportive environment where developers can thrive and grow. Our approach is designed to nurture talent, encourage collaboration, and drive innovation.</p>
                        <p class="mb-6">We focus on practical learning, peer-to-peer knowledge sharing, and real-world project experiences to help our members excel in their careers.</p>
                        <a href="#" class="btn btn-primary rounded-pill mb-0">Join DevNation</a>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-flex flex-row">
                            <div>
                                <span class="icon btn btn-block btn-lg btn-soft-purple pe-none mt-1 me-5"><span
                                        class="number fs-22">01</span></span>
                            </div>
                            <div>
                                <h4 class="mb-1">Learn</h4>
                                <p class="mb-0">Participate in workshops, coding sessions, and tech talks to enhance your skills.</p>
                            </div>
                        </div>
                        <div class="d-flex flex-row mt-8 ms-lg-10">
                            <div>
                                <span class="icon btn btn-block btn-lg btn-soft-green pe-none mt-1 me-5"><span
                                        class="number fs-22">02</span></span>
                            </div>
                            <div>
                                <h4 class="mb-1">Collaborate</h4>
                                <p class="mb-0">Work on team projects, hackathons, and open-source contributions.</p>
                            </div>
                        </div>
                        <div class="d-flex flex-row mt-8">
                            <div>
                                <span class="icon btn btn-block btn-lg btn-soft-orange pe-none mt-1 me-5"><span
                                        class="number fs-22">03</span></span>
                            </div>
                            <div>
                                <h4 class="mb-1">Innovate</h4>
                                <p class="mb-0">Develop cutting-edge solutions and showcase your creativity in our innovation challenges.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-14 my-md-16" />
                <div class="row gx-lg-8 gx-xl-12 gy-10 mb-14 mb-md-16 align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="card me-lg-6">
                            <div class="card-body p-6">
                                <div class="d-flex flex-row">
                                    <div>
                                        <span class="icon btn btn-circle btn-lg btn-soft-primary pe-none me-4"><span
                                                class="number">01</span></span>
                                    </div>
                                    <div>
                                        <h4 class="mb-1">Tech Talks</h4>
                                        <p class="mb-0">Regular sessions featuring industry experts and alumni sharing insights.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.row -->
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
                <div class="card bg-gray shadow-lg mb-14 mb-md-17">
                    <div class="row gx-0">
                        <div class="col-lg-6 image-wrapper bg-image bg-cover rounded-top rounded-lg-start"
                            data-image-src="./assets/img/photos/tm1.jpg"
                            style="background-image: url(&quot;./assets/img/photos/tm1.jpg&quot;);">
                        </div>
                        <!--/column -->
                        <div class="col-lg-6">
                            <div class="p-10 p-xl-13">
                                <div class="swiper-container dots-closer mb-6 swiper-container-0" data-margin="30"
                                    data-dots="true">
                                    <div class="swiper swiper-initialized swiper-horizontal swiper-backface-hidden">
                                        <div class="swiper-wrapper" id="swiper-wrapper-bdaa3b99a5eb97cf" aria-live="off"
                                            style="cursor: grab; transform: translate3d(0px, 0px, 0px);">
                                            <div class="swiper-slide swiper-slide-active" role="group"
                                                aria-label="1 / 3" style="width: 510px; margin-right: 30px;">
                                                <blockquote class="icon icon-top fs-lg text-center">
                                                    <p>“Vivamus sagittis lacus vel augue laoreet rutrum faucibus
                                                        dolor auctor. Vestibulum ligula porta felis euismod semper.”
                                                    </p>
                                                    <div class="blockquote-details justify-content-center text-center">
                                                        <div class="info ps-0">
                                                            <h5 class="mb-1">Coriss Ambady</h5>
                                                            <p class="mb-0">Financial Analyst</p>
                                                        </div>
                                                    </div>
                                                </blockquote>
                                            </div>
                                            <!--/.swiper-slide -->
                                            <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 3"
                                                style="width: 510px; margin-right: 30px;">
                                                <blockquote class="icon icon-top fs-lg text-center">
                                                    <p>“Vivamus sagittis lacus vel augue laoreet rutrum faucibus
                                                        dolor auctor. Vestibulum ligula porta felis euismod semper.”
                                                    </p>
                                                    <div class="blockquote-details justify-content-center text-center">
                                                        <div class="info ps-0">
                                                            <h5 class="mb-1">Cory Zamora</h5>
                                                            <p class="mb-0">Marketing Specialist</p>
                                                        </div>
                                                    </div>
                                                </blockquote>
                                            </div>
                                            <!--/.swiper-slide -->
                                            <div class="swiper-slide" role="group" aria-label="3 / 3"
                                                style="width: 510px; margin-right: 30px;">
                                                <blockquote class="icon icon-top fs-lg text-center">
                                                    <p>“Vivamus sagittis lacus vel augue laoreet rutrum faucibus
                                                        dolor auctor. Vestibulum ligula porta felis euismod semper.”
                                                    </p>
                                                    <div class="blockquote-details justify-content-center text-center">
                                                        <div class="info ps-0">
                                                            <h5 class="mb-1">Nikolas Brooten</h5>
                                                            <p class="mb-0">Sales Manager</p>
                                                        </div>
                                                    </div>
                                                </blockquote>
                                            </div>
                                            <!--/.swiper-slide -->
                                        </div>
                                        <!--/.swiper-wrapper -->
                                        <span class="swiper-notification" aria-live="assertive"
                                            aria-atomic="true"></span>
                                    </div>
                                    <!-- /.swiper -->
                                    <div class="swiper-controls">
                                        <div
                                            class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
                                            <span class="swiper-pagination-bullet swiper-pagination-bullet-active"
                                                tabindex="0" role="button" aria-label="Go to slide 1"
                                                aria-current="true"></span><span class="swiper-pagination-bullet"
                                                tabindex="0" role="button" aria-label="Go to slide 2"></span><span
                                                class="swiper-pagination-bullet" tabindex="0" role="button"
                                                aria-label="Go to slide 3"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="fs-15 text-uppercase text-muted mb-3">Upcoming Events</h2>
                        <h3 class="display-4 mb-5">Join our exciting developer events and activities.</h3>
                        <p class="mb-6">Stay tuned for our upcoming events designed to challenge, inspire, and grow your skills as a developer. From workshops to competitions, there's something for everyone at DevNation.</p>
                        <a href="#" class="btn btn-primary rounded-pill mb-0">View All Events</a>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-lg-10 col-xl-10 col-xxl-8 mx-auto">
                        <h2 class="fs-15 text-uppercase text-muted mb-3">DevNation Events</h2>
                        <h3 class="display-4 mb-9">Explore our upcoming events and activities.</h3>
                    </div>
                </div>
                <!-- /.row -->
                <div class="swiper-container blog grid-view mb-18 swiper-container-1" data-margin="30" data-dots="true"
                    data-items-xl="3" data-items-md="2" data-items-xs="1">
                    <div class="swiper swiper-initialized swiper-horizontal swiper-backface-hidden">
                        <div class="swiper-wrapper" id="swiper-wrapper-20ba4710794d10de2e" aria-live="off"
                            style="cursor: grab; transform: translate3d(0px, 0px, 0px); transition-duration: 0ms; transition-delay: 0ms;">
                            <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 4"
                                style="width: 290px; margin-right: 30px;">
                                <article>
                                    <figure class="overlay overlay-1 hover-scale rounded mb-6"><a href="#">
                                            <img src="./assets/img/photos/b4.jpg" alt=""><span class="bg"></span></a>
                                        <figcaption>
                                            <h5 class="from-top mb-0">Read More</h5>
                                        </figcaption>
                                    </figure>
                                    <div class="post-header">
                                        <h2 class="post-title h3 mb-3"><a class="link-dark"
                                                href="./blog-post.html">AI Workshop Series</a></h2>
                                    </div>
                                    <div class="post-footer">
                                        <ul class="post-meta">
                                            <li class="post-date"><i class="uil uil-calendar-alt"></i><span>15 May 2024</span></li>
                                            <li class="post-comments"><a href="#"><i
                                                        class="uil uil-file-alt fs-15"></i>Workshop</a></li>
                                        </ul>
                                    </div>
                                </article>
                            </div>
                            <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 4"
                                style="width: 290px; margin-right: 30px;">
                                <article>
                                    <figure class="overlay overlay-1 hover-scale rounded mb-6"><a href="#">
                                            <img src="./assets/img/photos/b5.jpg" alt=""><span class="bg"></span></a>
                                        <figcaption>
                                            <h5 class="from-top mb-0">Read More</h5>
                                        </figcaption>
                                    </figure>
                                    <div class="post-header">
                                        <h2 class="post-title h3 mb-3"><a class="link-dark"
                                                href="./blog-post.html">Web Dev Bootcamp</a></h2>
                                    </div>
                                    <div class="post-footer">
                                        <ul class="post-meta">
                                            <li class="post-date"><i class="uil uil-calendar-alt"></i><span>1 Jun 2024</span></li>
                                            <li class="post-comments"><a href="#"><i
                                                        class="uil uil-file-alt fs-15"></i>Bootcamp</a></li>
                                        </ul>
                                    </div>
                                </article>
                            </div>
                            <div class="swiper-slide" role="group" aria-label="3 / 4"
                                style="width: 290px; margin-right: 30px;">
                                <article>
                                    <figure class="overlay overlay-1 hover-scale rounded mb-6"><a href="#">
                                            <img src="./assets/img/photos/b6.jpg" alt=""><span class="bg"></span></a>
                                        <figcaption>
                                            <h5 class="from-top mb-0">Read More</h5>
                                        </figcaption>
                                    </figure>
                                    <div class="post-header">
                                        <h2 class="post-title h3 mb-3"><a class="link-dark"
                                                href="./blog-post.html">DevNation Hackathon</a></h2>
                                    </div>
                                    <!-- /.post-header -->
                                    <div class="post-footer">
                                        <ul class="post-meta">
                                            <li class="post-date"><i class="uil uil-calendar-alt"></i><span>26 Nov
                                                    2024</span></li>
                                            <li class="post-comments"><a href="#"><i
                                                        class="uil uil-file-alt fs-15"></i>Hackathon</a></li>
                                        </ul>
                                        <!-- /.post-meta -->
                                    </div>
                                    <!-- /.post-footer -->
                                </article>
                                <!-- /article -->
                            </div>
                            <!--/.swiper-slide -->
                            <div class="swiper-slide" role="group" aria-label="4 / 4"
                                style="width: 290px; margin-right: 30px;">
                                <article>
                                    <figure class="overlay overlay-1 hover-scale rounded mb-6"><a href="#">
                                            <img src="./assets/img/photos/b7.jpg" alt=""><span class="bg"></span></a>
                                        <figcaption>
                                            <h5 class="from-top mb-0">Read More</h5>
                                        </figcaption>
                                    </figure>
                                    <div class="post-header">
                                        <h2 class="post-title h3 mb-3"><a class="link-dark"
                                                href="./blog-post.html">Dharshan na Madime</a></h2>
                                    </div>
                                    <div class="post-footer">
                                        <ul class="post-meta">
                                            <li class="post-date"><i class="uil uil-calendar-alt"></i><span>15 Dec 2024</span></li>
                                            <li class="post-comments"><a href="#"><i
                                                        class="uil uil-file-alt fs-15"></i>Madime</a></li>
                                        </ul>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                    <div class="swiper-controls">
                        <div
                            class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
                            <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0"
                                role="button" aria-label="Go to slide 1" aria-current="true"></span><span
                                class="swiper-pagination-bullet" tabindex="0" role="button"
                                aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0"
                                role="button" aria-label="Go to slide 3"></span>
                        </div>
                    </div>
                </div>
                <hr class="my-14 my-md-16" />
<div class="row gx-lg-8 gx-xl-12 gy-10 mb-14 mb-md-17 align-items-center">
    <div class="col-md-8 col-lg-6 order-lg-2">
                        <figure class="rounded"><img src="assets/img/photos/about24.jpg"
                                srcset="./assets/img/photos/about24@2x.jpg 2x" alt=""></figure>
    </div>
    <!--/column -->
    <div class="col-lg-6">
        <h2 class="fs-15 text-uppercase text-muted mb-3">Our Community</h2>
        <h3 class="display-4 mb-5">Join a vibrant community of passionate developers at AJIET Mangalore.</h3>
        <p class="mb-6">At DevNation, we believe in the power of collaboration and continuous learning. Our community is built on the principles of knowledge sharing, innovation, and mutual growth. Whether you're a beginner or an experienced developer, there's always something new to learn and exciting projects to work on.</p>
        <div class="row gy-3 gx-xl-8">
            <div class="col-xl-6">
                <ul class="icon-list bullet-bg bullet-soft-primary mb-0">
                    <li><span><i class="uil uil-check"></i></span><span>Regular workshops and coding sessions</span></li>
                    <li class="mt-3"><span><i class="uil uil-check"></i></span><span>Mentorship from industry professionals</span></li>
                </ul>
            </div>
            <!--/column -->
            <div class="col-xl-6">
                <ul class="icon-list bullet-bg bullet-soft-primary mb-0">
                    <li><span><i class="uil uil-check"></i></span><span>Exciting hackathons and coding competitions</span></li>
                    <li class="mt-3"><span><i class="uil uil-check"></i></span><span>Networking opportunities with tech enthusiasts</span></li>
                </ul>
            </div>
            <!--/column -->
        </div>
        <!--/.row -->
    </div>
    <!--/column -->
</div>
<!--/.row -->
<div class="row gy-10 gx-lg-8 gx-xl-12 mb-14 mb-md-16 align-items-center">
    <div class="col-md-8 col-lg-6">
                        <figure class="rounded"><img src="assets/img/photos/about25.jpg"
                                srcset="./assets/img/photos/about25@2x.jpg 2x" alt=""></figure>
                    </div>
                    <!--/column -->
                    <div class="col-lg-6">
                        <h2 class="fs-15 text-uppercase text-muted mb-3">Why Choose Us?</h2>
                        <h3 class="display-4 mb-7">A few reasons why our valued participants choose DevNation.</h3>
                        <div class="accordion accordion-wrapper" id="accordionExample">
                            <div class="card plain accordion-item">
                                <div class="card-header" id="headingOne">
                                    <button class="accordion-button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne"> Diverse Learning Opportunities </button>
                                </div>
                                <!--/.card-header -->
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>DevNation offers a wide range of tech-related events, workshops, and webinars, catering to various interests and skill levels.

</p>
                                    </div>
                                    <!--/.card-body -->
                                </div>
                                <!--/.accordion-collapse -->
                            </div>
                            <!--/.accordion-item -->
                            <div class="card plain accordion-item">
                                <div class="card-header" id="headingTwo">
                                    <button class="collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo"> Hands-On Experience </button>
                                </div>
                                <!--/.card-header -->
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Participants gain practical skills through interactive sessions led by industry experts, enhancing their knowledge and confidence in real-world applications.
                                        </p>
                                    </div>
                                    <!--/.card-body -->
                                </div>
                                <!--/.accordion-collapse -->
                            </div>
                            <!--/.accordion-item -->
                            <div class="card plain accordion-item">
                                <div class="card-header" id="headingThree">
                                    <button class="collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree"> Networking and Community </button>
                                </div>
                                <!--/.card-header -->
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>The platform fosters a vibrant community, allowing learners to connect with peers and professionals, share ideas, and collaborate on projects.</p>
                                    </div>
                                    <!--/.card-body -->
                                </div>
                                <!--/.accordion-collapse -->
                            </div>
                            <!--/.accordion-item -->
                        </div>
                        <!--/.accordion -->
                    </div>
                    <!--/column -->
                </div>
                <!--/.row -->
                <div class="wrapper image-wrapper bg-auto no-overlay bg-image text-center bg-map"
                    data-image-src="./assets/img/map.png"
                    style="background-image: url(&quot;./assets/img/map.png&quot;);">
    <div class="container py-md-16 py-lg-18">
        <div class="row">
            <div class="col-xl-11 col-xxl-9 mx-auto">
                <h3 class="display-4 mb-8 px-lg-8">Join over 500+ student developers at AJIET Mangalore. Be part of DevNation and shape the future of technology.</h3>
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
        <div class="d-flex justify-content-center">
            <span><a href="#" class="btn btn-primary rounded-pill">Join DevNation</a></span>
        </div>
    </div>
    <!-- /.container -->
</div>
<!-- /.wrapper -->
        </div>
    </div>
</section>
@endsection