@extends('layouts.app')

@section('meta')
<meta name="description"
  content="Explore DevNation, a community-driven tech learning platform empowering developers with resources, tutorials, and collaboration opportunities. Enhance your coding skills and accelerate your career growth in the tech industry through our DevOps tutorials, software engineering resources, and dynamic developer community.">
<meta name="keywords"
  content="DevNation, DevNation mission, DevNation vision, DevNation team, DevOps tutorials, software engineering resources, developer community, tech learning platform">
<meta name="author" content="DevNation">
@endsection

@section('title', 'About')

@section('content')

<section class="wrapper bg-gray">
  @include('layouts.inlcudes.nav')
  <div class="container pt-10 pt-md-14 text-center">
    <div class="row">
      <div class="col-xl-6 mx-auto">
        <h1 class="display-1 mb-4">Welcome to DevNation</h1>
        <p class="lead fs-lg mb-0 text-decoration-none">Empowering students to innovate, collaborate, and grow in the
          ever-evolving world of technology.</p>
      </div>
      <!-- /.col-xl-6 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
  <figure class="position-relative" style="bottom: 0; left: 0; z-index: 2;"><img
      src="{{ asset('assets/img/photos/bg12.jpg') }}" alt="bg-image" /></figure>
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
            <figure class="rounded shadow"><img src="{{ asset('assets/img/photos/about2.jpg') }}"
                {{-- srcset="{{ asset('./assets/img/photos/about2@2x.jpg') }} 2x" --}}
                 alt="DevNation Event"></figure>
          </div>
          <div class="item">
            <figure class="rounded shadow"><img src="{{ asset('assets/img/photos/about3.jpg') }}"
                {{-- srcset="{{ asset('./assets/img/photos/about3@2x.jpg') }} 2x"  --}}
                alt="DevNation Workshop"></figure>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <img src="{{ asset('assets/img/icons/lineal/megaphone.svg') }}" class="svg-inject icon-svg icon-svg-md mb-4"
          alt="megaphone" />
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
        <img src="{{ asset('assets/img/icons/lineal/list.svg') }}" class="svg-inject icon-svg icon-svg-md mb-4"
          alt="list" />
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
                <p class="mb-0 text-decoration-none">Hands-on workshops and real-world projects to apply theoretical
                  knowledge.</p>
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
                <p class="mb-0 text-decoration-none">Hackathons and team projects to foster creativity and
                  problem-solving skills.</p>
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
                <p class="mb-0 text-decoration-none">Networking events and mentorship programs to bridge academia and
                  industry.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <h2 class="display-6 mb-3">How We Empower Students</h2>
        <p class="lead fs-lg pe-lg-5 text-decoration-none">DevNation creates a dynamic ecosystem where students can
          learn, innovate, and
          grow their tech skills.</p>
        <p class="text-decoration-none">Our approach combines practical workshops, collaborative projects, and industry
          insights to prepare
          students for the challenges of the tech world. We believe in learning by doing, fostering creativity, and
          building a strong community of tech enthusiasts.</p>
        <p class="mb-6 text-decoration-none">Through our events and initiatives, we aim to bridge the gap between
          academic learning and
          industry requirements, ensuring our members are well-equipped for their future careers in technology.</p>
        <a href="#" class="btn btn-primary rounded-pill mb-0">Join DevNation</a>
      </div>
    </div>
  </div>
</section>

<section class="wrapper bg-soft-primary">
  <div class="container pt-16 pb-14 pb-md-0">
    <div class="row gx-lg-8 gx-xl-0 align-items-center">
      <section class="wrapper bg-soft-primary">
        <div class="container pt-16 pb-14 pb-md-16">
          <div class="row gx-lg-8 gx-xl-0 align-items-center">
            <div class="col-md-5 col-lg-4 offset-lg-1 d-none d-md-flex position-relative">
              <div class="shape rounded-circle bg-pale-primary rellax w-21 h-21" data-rellax-speed="1"
                style="top: 7rem; left: 1rem"></div>
              <figure><img src="{{ asset('assets/draft/about.draft.png') }}"
                  {{-- srcset="{{ asset('./assets/img/photos/co1@2x.png') }} 2x"  --}}
                  alt="DevNation Community"></figure>
            </div>
            <div class="col-md-7 col-lg-6 col-xl-6 col-xxl-5 offset-xl-1">
              <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="text-center">
                      <div class="quote-icon mb-4">
                        <img src='{{ asset('/images/quote.png') }}' height='48' width='48' alt="Quote icon">
                      </div>
                      <blockquote class="fs-lg mb-4">
                        <p class="text-decoration-none">"DevNation has been an incredible platform for me to explore new
                          technologies and connect with like-minded individuals. The workshops and hackathons have
                          significantly boosted my skills and confidence."</p>
                      </blockquote>
                      <div class="d-flex flex-column align-items-center">
                        <h5 class="mb-1">Darshan Bhandary</h5>
                        <p class="mb-0 text-muted text-decoration-none">Computer Science Student</p>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="text-center">
                      <div class="quote-icon mb-4">
                        <img src='{{ asset('/images/quote.png') }}' height='48' width='48' alt="Quote icon">
                      </div>
                      <blockquote class="fs-lg mb-4">
                        <p class="text-decoration-none">"Being part of DevNation has opened up numerous opportunities
                          for me. The mentorship program and industry connections have been invaluable in shaping my
                          career path in tech."</p>
                      </blockquote>
                      <div class="d-flex flex-column align-items-center">
                        <h5 class="mb-1">Harshit Poojary</h5>
                        <p class="mb-0 text-muted">Software Engineering Graduate</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-indicators mt-4" style='margin-top:10vh;'>
                  <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0"
                    class="active rounded-circle mx-1" aria-current="true" aria-label="Slide 1"
                    style="width: 10px; height: 10px; background-color: grey; border: none;"></button>
                  <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1"
                    class="rounded-circle mx-1" aria-label="Slide 2"
                    style="width: 10px; height: 10px; background-color: grey; border: none;"></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</section>

<section class="wrapper bg-light">
  <div class="container py-14 py-md-16">
    <div class="row mb-3">
      <div class="col-md-10 col-xl-9 col-xxl-7 mx-auto text-center">
        <img src="{{ asset('assets/img/icons/lineal/team.svg') }}" class="svg-inject icon-svg icon-svg-md mb-4"
          alt="Our Core Community Members" />
        <h2 class="display-4 mb-3 px-lg-14">Our Core Community Members</h2>
      </div>
    </div>
    <div class="position-relative">
      <div class="shape rounded-circle bg-soft-yellow rellax w-16 h-16" data-rellax-speed="1"
        style="bottom: 0.5rem; right: -1.7rem;"></div>
      <div class="shape rounded-circle bg-line red rellax w-16 h-16" data-rellax-speed="1"
        style="top: 0.5rem; left: -1.7rem;"></div>

      <div id="teamCarousel" class="carousel slide" data-bs-ride="carousel" style="z-index: 1">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row g-4 justify-content-center">
              @foreach ($coreMembers as $member)
              <div class="col-12 col-md-4">
                <div class="card">
                  <div class="card-body">
                    <img class="rounded-circle w-15 mb-4"
                      src="{{ str_contains($member->image, 'ui-avatars.com') ? $member->image : Storage::url($member->image) }}"
                      alt="{{ $member->name }}" />
                    <h4 class="mb-1">{{ $member->name }}</h4>
                    <div class="meta mb-2">{{ $member->role->name }}</div>
                    <p class="mb-2">{{ $member->role->description }}</p>
                    <nav class="nav social mb-0">
                      @if ($member->socialAccounts && $member->socialAccounts->linkedIn)
                      <a href="{{ $member->socialAccounts->linkedIn }}"><i class="uil uil-linkedin"></i></a>
                      @endif
                      @if ($member->socialAccounts && $member->socialAccounts->github)
                      <a href="{{ $member->socialAccounts->github }}"><i class="uil uil-github"></i></a>
                      @endif
                      @if ($member->socialAccounts && $member->socialAccounts->instagram)
                      <a href="{{ $member->socialAccounts->instagram }}"><i class="uil uil-instagram"></i></a>
                      @endif
                      @if ($member->socialAccounts && $member->socialAccounts->twitter)
                      <a href="{{ $member->socialAccounts->twitter }}"><i class="uil uil-twitter"></i></a>
                      @endif
                      @if ($member->socialAccounts && $member->socialAccounts->facebook)
                      <a href="{{ $member->socialAccounts->facebook }}"><i class="uil uil-facebook"></i></a>
                      @endif
                    </nav>
                  </div>
                </div>
              </div>
              @endforeach
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
            <img src="{{ asset('assets/img/icons/lineal/check.svg') }}"
              class="svg-inject icon-svg icon-svg-lg text-primary mb-3" alt="check" />
            <h4 class="counter text-decoration-none">50+</h4>
            <p class="text-decoration-none">Events Organized</p>
          </div>
          <div class="col-md-3">
            <img src="{{ asset('assets/img/icons/lineal/user.svg') }}"
              class="svg-inject icon-svg icon-svg-lg text-primary mb-3" alt="user" />
            <h4 class="counter">1000+</h4>
            <p class="text-decoration-none">Active Members</p>
          </div>
          <div class="col-md-3">
            <img src="{{ asset('assets/img/icons/lineal/briefcase-2.svg') }}"
              class="svg-inject icon-svg icon-svg-lg text-primary mb-3" alt="briefcase" />
            <h4 class="counter">20+</h4>
            <p class="text-decoration-none">Industry Partners</p>
          </div>
          <div class="col-md-3">
            <img src="{{ asset('assets/img/icons/lineal/award-2.svg') }}"
              class="svg-inject icon-svg icon-svg-lg text-primary mb-3" alt="award" />
            <h4 class="counter">15+</h4>
            <p class="text-decoration-none">Hackathons Hosted</p>
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
        <figure class="rounded"><img src="{{ asset('assets/img/photos/about4.jpg') }}"
            {{-- srcset="{{ asset('./assets/img/photos/about4@2x.jpg') }} 2x"  --}}
            alt="DevNation Event"></figure>
      </div>
      <div class="col-lg-6">
        <img src="{{ asset('assets/img/icons/lineal/telemarketer.svg') }}" class="svg-inject icon-svg icon-svg-md mb-4"
          alt="telemarketer" />
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
            <p class=" text-decoration-none">+91 98765 43210</p>
          </div>
        </div>
        <div class="d-flex flex-row">
          <div>
            <div class="icon text-primary fs-28 me-6 mt-n1"> <i class="uil uil-envelope"></i> </div>
          </div>
          <div>
            <h5 class="mb-1">E-mail</h5>
            <p class="mb-0 text-decoration-none"><a href="mailto:drshnbhandary@gmail.com"
                class="link-body">drshnbhandary@gmail.com</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection