@extends('layouts.app')


@section('content')

@include('layouts.inlcudes.nav')

<section class="wrapper bg-gray">
  <div class="container pt-10 pt-md-14 text-center">
    <div class="row">
      <div class="col-xl-6 mx-auto">
        <h1 class="display-1 mb-4">Welcome to DevNation</h1>
        <p class="lead fs-lg mb-0">Empowering students to innovate, collaborate, and grow in the ever-evolving world
          of technology.</p>
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
  <figure class="position-absoute" style="bottom: 0; left: 0; z-index: 2;"><img src="assets/img/photos/bg12.jpg"
      alt="" /></figure>
</section>
<!-- /section -->
<section class="wrapper bg-light angled upper-end lower-end">
  <div class="container py-14 py-md-16">
    <div class="row gx-lg-8 gx-xl-12 gy-10 mb-14 mb-md-17 align-items-center">
      <div class="col-lg-6 position-relative order-lg-2">
        <div class="shape bg-dot primary rellax w-16 h-20" data-rellax-speed="1" style="top: 3rem; left: 5.5rem">
        </div>
        <div class="overlap-grid overlap-grid-2">
          <div class="item">
            <figure class="rounded shadow"><img src="assets/img/photos/about2.jpg"
                srcset="./assets/img/photos/about2@2x.jpg 2x" alt="DevNation Event"></figure>
          </div>
          <div class="item">
            <figure class="rounded shadow"><img src="assets/img/photos/about3.jpg"
                srcset="./assets/img/photos/about3@2x.jpg 2x" alt="DevNation Workshop"></figure>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <img src="assets/img/icons/lineal/megaphone.svg" class="svg-inject icon-svg icon-svg-md mb-4" alt="" />
        <h2 class="display-4 mb-3">Who Are We?</h2>
        <p class="lead fs-lg">We are a dynamic student-led association dedicated to fostering innovation,
          collaboration, and growth in the world of technology.</p>
        <p class="mb-6">At DevNation, we believe in the power of practical learning, creativity, and teamwork. Our
          mission is to empower students with the skills and knowledge they need to thrive in the rapidly evolving
          tech industry.</p>
        <div class="row gy-3 gx-xl-8">
          <div class="col-xl-6">
            <ul class="icon-list bullet-bg bullet-soft-primary mb-0">
              <li><span><i class="uil uil-check"></i></span><span>Provide practical learning opportunities through
                  webinars, workshops, and hands-on events.</span></li>
              <li class="mt-3"><span><i class="uil uil-check"></i></span><span>Encourage creativity and technological
                  innovation through hackathons and collaborative projects.</span></li>
            </ul>
          </div>
          <div class="col-xl-6">
            <ul class="icon-list bullet-bg bullet-soft-primary mb-0">
              <li><span><i class="uil uil-check"></i></span><span>Empower students to lead projects and work
                  collaboratively on solutions for real-world problems.</span></li>
              <li class="mt-3"><span><i class="uil uil-check"></i></span><span>Cultivate a supportive network of
                  students, developers, and industry professionals.</span></li>
            </ul>
          </div>
          <!--/column -->
        </div>
        <!--/.row -->
      </div>
      <!--/column -->
    </div>
    <!--/.row -->
    <div class="row mb-5">
      <div class="col-md-10 col-xl-8 col-xxl-7 mx-auto text-center">
        <img src="assets/img/icons/lineal/list.svg" class="svg-inject icon-svg icon-svg-md mb-4" alt="" />
        <h2 class="display-4 mb-4 px-lg-14">Our Approach to Empowering Tech Enthusiasts</h2>
      </div>
    </div>

    <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">
      <div class="col-lg-6 order-lg-2">
        <div class="card me-lg-6">
          <div class="card-body p-6">
            <div class="d-flex flex-row">
              <div>
                <span class="icon btn btn-circle btn-lg btn-soft-primary pe-none me-4"><span
                    class="number">01</span></span>
              </div>
              <div>
                <h4 class="mb-1">Practical Learning</h4>
                <p class="mb-0">Hands-on workshops and real-world projects to apply theoretical knowledge.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="card ms-lg-13 mt-6">
          <div class="card-body p-6">
            <div class="d-flex flex-row">
              <div>
                <span class="icon btn btn-circle btn-lg btn-soft-primary pe-none me-4"><span
                    class="number">02</span></span>
              </div>
              <div>
                <h4 class="mb-1">Collaborative Innovation</h4>
                <p class="mb-0">Hackathons and team projects to foster creativity and problem-solving skills.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="card mx-lg-6 mt-6">
          <div class="card-body p-6">
            <div class="d-flex flex-row">
              <div>
                <span class="icon btn btn-circle btn-lg btn-soft-primary pe-none me-4"><span
                    class="number">03</span></span>
              </div>
              <div>
                <h4 class="mb-1">Industry Connections</h4>
                <p class="mb-0">Networking events and mentorship programs to bridge academia and industry.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <h2 class="display-6 mb-3">How We Empower Students</h2>
        <p class="lead fs-lg pe-lg-5">DevNation creates a dynamic ecosystem where students can learn, innovate, and
          grow their tech skills.</p>
        <p>Our approach combines practical workshops, collaborative projects, and industry insights to prepare
          students for the challenges of the tech world. We believe in learning by doing, fostering creativity, and
          building a strong community of tech enthusiasts.</p>
        <p class="mb-6">Through our events and initiatives, we aim to bridge the gap between academic learning and
          industry requirements, ensuring our members are well-equipped for their future careers in technology.</p>
        <a href="#" class="btn btn-primary rounded-pill mb-0">Join DevNation</a>
      </div>
    </div>
  </div>
</section>

<section class="wrapper bg-soft-primary">
  <div class="container pt-16 pb-14 pb-md-0">
    <div class="row gx-lg-8 gx-xl-0 align-items-center">
      <div class="col-md-5 col-lg-4 offset-lg-1 d-none d-md-flex position-relative">
        <div class="shape rounded-circle bg-pale-primary rellax w-21 h-21" data-rellax-speed="1"
          style="top: 7rem; left: 1rem"></div>
        <figure><img src="assets/img/photos/co1.png" srcset="./assets/img/photos/co1@2x.png 2x"
            alt="DevNation Community"></figure>
      </div>
      <div class="col-md-7 col-lg-6 col-xl-6 col-xxl-5 offset-xl-1">
        <div class="basic-slider owl-carousel dots-start gap-small mt-6" data-margin="30">
          <div class="item">
            <blockquote class="icon fs-lg">
              <p>"DevNation has been an incredible platform for me to explore new technologies and connect with
                like-minded individuals. The workshops and hackathons have significantly boosted my skills and
                confidence."</p>
              <div class="blockquote-details">
                <div class="info ps-0">
                  <h5 class="mb-1">Sarah Johnson</h5>
                  <p class="mb-0">Computer Science Student</p>
                </div>
              </div>
            </blockquote>
          </div>
          <div class="item">
            <blockquote class="icon fs-lg">
              <p>"Being part of DevNation has opened up numerous opportunities for me. The mentorship program and
                industry connections have been invaluable in shaping my career path in tech."</p>
              <div class="blockquote-details">
                <div class="info ps-0">
                  <h5 class="mb-1">Michael Chen</h5>
                  <p class="mb-0">Software Engineering Graduate</p>
                </div>
              </div>
            </blockquote>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="wrapper bg-light">
  <div class="container py-14 py-md-16">
    <div class="row mb-3">
      <div class="col-md-10 col-xl-9 col-xxl-7 mx-auto text-center">
        <img src="assets/img/icons/lineal/team.svg" class="svg-inject icon-svg icon-svg-md mb-4" alt="" />
        <h2 class="display-4 mb-3 px-lg-14">Our Community Core Members</h2>
      </div>
    </div>
    <div class="position-relative">
      <div class="shape rounded-circle bg-soft-yellow rellax w-16 h-16" data-rellax-speed="1"
        style="bottom: 0.5rem; right: -1.7rem;"></div>
      <div class="shape rounded-circle bg-line red rellax w-16 h-16" data-rellax-speed="1"
        style="top: 0.5rem; left: -1.7rem;"></div>
      <div class="carousel owl-carousel gap-small" data-margin="0" data-dots="true" data-autoplay="false"
        data-autoplay-timeout="5000"
        data-responsive='{"0":{"items": "1"}, "768":{"items": "2"}, "992":{"items": "3"}, "1400":{"items": "4"}}'>
        <div class="item">
          <div class="item-inner">
            <div class="card">
              <div class="card-body">
                <img class="rounded-circle w-15 mb-4" src="assets/img/avatars/te1.jpg"
                  srcset="./assets/img/avatars/te1@2x.jpg 2x" alt="Member 1" />
                <h4 class="mb-1">Member-1</h4>
                <div class="meta mb-2">President</div>
                <p class="mb-2">Leading DevNation's initiatives and fostering community growth.</p>
                <nav class="nav social mb-0">
                  <a href="#"><i class="uil uil-twitter"></i></a>
                  <a href="#"><i class="uil uil-linkedin"></i></a>
                  <a href="#"><i class="uil uil-github"></i></a>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="item-inner">
            <div class="card">
              <div class="card-body">
                <img class="rounded-circle w-15 mb-4" src="assets/img/avatars/te2.jpg"
                  srcset="./assets/img/avatars/te2@2x.jpg 2x" alt="Member 2" />
                <h4 class="mb-1">Member-2</h4>
                <div class="meta mb-2">Vice President</div>
                <p class="mb-2">Coordinating events and managing partnerships with tech companies.</p>
                <nav class="nav social mb-0">
                  <a href="#"><i class="uil uil-twitter"></i></a>
                  <a href="#"><i class="uil uil-linkedin"></i></a>
                  <a href="#"><i class="uil uil-github"></i></a>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="item-inner">
            <div class="card">
              <div class="card-body">
                <img class="rounded-circle w-15 mb-4" src="assets/img/avatars/te3.jpg"
                  srcset="./assets/img/avatars/te3@2x.jpg 2x" alt="Member 3" />
                <h4 class="mb-1">Member-3</h4>
                <div class="meta mb-2">Technical Lead</div>
                <p class="mb-2">Overseeing technical workshops and hackathon projects.</p>
                <nav class="nav social mb-0">
                  <a href="#"><i class="uil uil-twitter"></i></a>
                  <a href="#"><i class="uil uil-linkedin"></i></a>
                  <a href="#"><i class="uil uil-github"></i></a>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="item-inner">
            <div class="card">
              <div class="card-body">
                <img class="rounded-circle w-15 mb-4" src="assets/img/avatars/te4.jpg"
                  srcset="./assets/img/avatars/te4@2x.jpg 2x" alt="Member 4" />
                <h4 class="mb-1">Member-4</h4>
                <div class="meta mb-2">Marketing Coordinator</div>
                <p class="mb-2">Managing DevNation's online presence and community outreach.</p>
                <nav class="nav social mb-0">
                  <a href="#"><i class="uil uil-twitter"></i></a>
                  <a href="#"><i class="uil uil-linkedin"></i></a>
                  <a href="#"><i class="uil uil-instagram"></i></a>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="wrapper bg-soft-primary">
  <div class="container py-14 py-md-16">
    <div class="row mb-10">
      <div class="col-xl-10 mx-auto">
        <div class="row align-items-center counter-wrapper gy-6 text-center">
          <div class="col-md-3">
            <img src="assets/img/icons/lineal/check.svg" class="svg-inject icon-svg icon-svg-lg text-primary mb-3"
              alt="" />
            <h3 class="counter">50+</h3>
            <p>Events Organized</p>
          </div>
          <div class="col-md-3">
            <img src="assets/img/icons/lineal/user.svg" class="svg-inject icon-svg icon-svg-lg text-primary mb-3"
              alt="" />
            <h3 class="counter">1000+</h3>
            <p>Active Members</p>
          </div>
          <div class="col-md-3">
            <img src="assets/img/icons/lineal/briefcase-2.svg" class="svg-inject icon-svg icon-svg-lg text-primary mb-3"
              alt="" />
            <h3 class="counter">20+</h3>
            <p>Industry Partners</p>
          </div>
          <div class="col-md-3">
            <img src="assets/img/icons/lineal/award-2.svg" class="svg-inject icon-svg icon-svg-lg text-primary mb-3"
              alt="" />
            <h3 class="counter">15+</h3>
            <p>Hackathons Hosted</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="wrapper bg-light angled upper-end lower-end">
  <div class="container pt-18 pb-14 pt-md-19 pb-md-16">
    <div class="row gx-md-8 gx-xl-12 gy-10 align-items-center">
      <div class="col-md-8 col-lg-6 offset-lg-0 col-xl-5 offset-xl-1 position-relative">
        <div class="shape bg-dot primary rellax w-17 h-21" data-rellax-speed="1" style="top: -2rem; left: -1.4rem;">
        </div>
        <figure class="rounded"><img src="assets/img/photos/about4.jpg" srcset="./assets/img/photos/about4@2x.jpg 2x"
            alt="DevNation Event"></figure>
      </div>
      <div class="col-lg-6">
        <img src="assets/img/icons/lineal/telemarketer.svg" class="svg-inject icon-svg icon-svg-md mb-4" alt="" />
        <h2 class="display-4 mb-8">Ready to join the DevNation community?</h2>
        <div class="d-flex flex-row">
          <div>
            <div class="icon text-primary fs-28 me-6 mt-n1"> <i class="uil uil-location-pin-alt"></i> </div>
          </div>
          <div>
            <h5 class="mb-1">Address</h5>
            <address>123 Tech Avenue, Innovation City, IN 12345, India</address>
          </div>
        </div>
        <div class="d-flex flex-row">
          <div>
            <div class="icon text-primary fs-28 me-6 mt-n1"> <i class="uil uil-phone-volume"></i> </div>
          </div>
          <div>
            <h5 class="mb-1">Phone</h5>
            <p>+91 98765 43210</p>
          </div>
        </div>
        <div class="d-flex flex-row">
          <div>
            <div class="icon text-primary fs-28 me-6 mt-n1"> <i class="uil uil-envelope"></i> </div>
          </div>
          <div>
            <h5 class="mb-1">E-mail</h5>
            <p class="mb-0"><a href="mailto:info@devnation.org" class="link-body">info@devnation.org</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection