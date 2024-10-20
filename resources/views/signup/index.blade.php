@extends('layouts.app')

@section('meta')
<meta name="description"
    content="Meet our core DevNation community members who drive innovation and foster growth. Learn more about their roles and contributions to our vibrant developer community.">
<meta name="keywords"
    content="DevNation members, community leaders, developer team, core members, DevNation contributors">
<meta name="author" content="DevNation">
@endsection

@section('title', 'signup')

@section('content')
@include('layouts.inlcudes.nav')
<section class="wrapper image-wrapper bg-image bg-overlay bg-overlay-light-600 text-white" data-image-src="assets/img/photos/bg18.png">
      <div class="container pt-17 pb-20 pt-md-19 pb-md-21 text-center">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h1 class="display-1 mb-3">Sign Up</h1>
            <nav class="d-inline-block" aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sign Up</li>
              </ol>
            </nav>
            <!-- /nav -->
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-light">
      <div class="container pb-14 pb-md-16">
        <div class="row">
          <div class="col-lg-7 col-xl-6 col-xxl-5 mx-auto mt-n20">
            <div class="card">
              <div class="card-body p-11 text-center">
                <h2 class="mb-3 text-start">Sign up </h2>
                <p class="lead mb-6 text-start">Registration takes less than a minute.</p>
                <form class="text-start mb-3">
                  <div class="form-floating mb-4">
                    <input type="text" class="form-control" placeholder="Name" id="loginName">
                    <label for="loginName">Name</label>
                  </div>
                  <div class="form-floating mb-4">
                    <input type="email" class="form-control" placeholder="Email" id="loginEmail">
                    <label for="loginEmail">Email</label>
                  </div>
                  <div class="form-floating password-field mb-4">
                    <input type="password" class="form-control" placeholder="Password" id="loginPassword">
                    <span class="password-toggle"><i class="uil uil-eye"></i></span>
                    <label for="loginPassword">Password</label>
                  </div>
                  <div class="form-floating password-field mb-4">
                    <input type="password" class="form-control" placeholder="Confirm Password" id="loginPasswordConfirm">
                    <span class="password-toggle"><i class="uil uil-eye"></i></span>
                    <label for="loginPasswordConfirm">Confirm Password</label>
                  </div>
                  <a class="btn btn-primary rounded-pill btn-login w-100 mb-2">Sign Up</a>
                </form>
                <!-- /form -->
                <p class="mb-0">Already have an account? <a href="signin.html" class="hover">Sign in</a></p>
                <div class="divider-icon my-4">or</div>
                <nav class="nav social justify-content-center text-center">
                  <a href="#" class="btn btn-circle btn-sm btn-google"><i class="uil uil-google"></i></a>
                  <a href="#" class="btn btn-circle btn-sm btn-facebook-f"><i class="uil uil-facebook-f"></i></a>
                  <a href="#" class="btn btn-circle btn-sm btn-twitter"><i class="uil uil-twitter"></i></a>
                </nav>
                <!--/.social -->
              </div>
              <!--/.card-body -->
            </div>
            <!--/.card -->
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>

@endsection