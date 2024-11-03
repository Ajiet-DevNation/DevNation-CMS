@extends('layouts.app')

@section('meta')
<meta name="description"
    content="Contact DevNation for any inquiries, support, or collaboration opportunities. Reach out via our contact form, email, or phone for prompt assistance. We're here to support developers and tech enthusiasts.">
<meta name="keywords"
    content="DevNation contact, contact DevNation, DevNation support, collaboration with DevNation, DevNation inquiries, DevNation phone, DevNation email, DevNation contact form">
<meta name="author" content="DevNation">
@endsection

@section('title', 'Contact-Us')

@section('content')
@include('layouts.inlcudes.nav')
<!-- /.content-wrapper -->
<section class="wrapper image-wrapper bg-image bg-overlay bg-overlay-400 text-white" data-image-src="assets/img/photos/bg3.jpg" style="background-image: url('./assets/img/photos/bg3.jpg');">
    <div class="container pt-17 pb-20 pt-md-19 pb-md-21 text-center">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h1 class="display-1 mb-3 text-white">Get in Touch</h1>
          <nav class="d-inline-block" aria-label="breadcrumb">
            <ol class="breadcrumb text-white">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Contact</li>
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
  <section class="wrapper bg-light angled upper-end">
    <div class="container pb-11">
      <div class="row mb-14 mb-md-16">
        <div class="col-xl-10 mx-auto mt-n19">
          <div class="card">
            <div class="row gx-0">
              <div class="col-lg-6 align-self-stretch">
                <div class="map map-full rounded-top rounded-lg-start">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62222.13891811075!2d74.75254834863279!3d12.915196799999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba35a7940000001%3A0x37b1d2f42900de85!2sAJ%20Institute%20of%20Engineering%20%26%20Technology!5e0!3m2!1sen!2sin!4v1730636413012!5m2!1sen!2sin" style="width:100%; height: 100%; border:0" allowfullscreen></iframe>
                </div>
                <!-- /.map -->
              </div>
              <!--/column -->
              <div class="col-lg-6">
                <div class="p-10 p-md-11 p-lg-14">
                  <div class="d-flex flex-row">
                    <div>
                      <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-location-pin-alt"></i> </div>
                    </div>
                    <div class="align-self-start justify-content-start">
                      <h5 class="mb-1">Address</h5>
                      <address>A J Institute of Engineering and Technology, Bangra Kuloor <br class="d-none d-md-block" />Mangalore, Karnataka, India</address>
                    </div>
                  </div>
                  <!--/div -->
                  <div class="d-flex flex-row">
                    <div>
                      <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-phone-volume"></i> </div>
                    </div>
                    <div>
                      <h5 class="mb-1">Phone</h5>
                      <p>+91 90 1900 3490</p>
                    </div>
                  </div>
                  <!--/div -->
                  <div class="d-flex flex-row">
                    <div>
                      <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-envelope"></i> </div>
                    </div>
                    <div>
                      <h5 class="mb-1">E-mail</h5>
                      <p class="mb-0"><a href="/  " class="link-body"><span class="__cf_email__">drshnbhandary@gmail.com</span></a></p>
                    </div>
                  </div>
                  <!--/div -->
                </div>
                <!--/div -->
              </div>
              <!--/column -->
            </div>
            <!--/.row -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /column -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
          <h2 class="display-4 mb-3 text-center">Drop Us a Line</h2>
          <p class="lead text-center mb-10">Reach out to us from our contact form and we will get back to you shortly.</p>
          <form class="contact-form needs-validation" method="post" action="/" novalidate>
            <div class="messages"></div>
            <div class="row gx-4">
              <div class="col-md-6">
                <div class="form-floating mb-4">
                  <input id="form_name" type="text" name="name" class="form-control" placeholder="Jane" required>
                  <label for="form_name">First Name *</label>
                  <div class="valid-feedback"> Looks good! </div>
                  <div class="invalid-feedback"> Please enter your first name. </div>
                </div>
              </div>
              <!-- /column -->
              <div class="col-md-6">
                <div class="form-floating mb-4">
                  <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Doe" required>
                  <label for="form_lastname">Last Name *</label>
                  <div class="valid-feedback"> Looks good! </div>
                  <div class="invalid-feedback"> Please enter your last name. </div>
                </div>
              </div>
              <!-- /column -->
              <div class="col-md-6">
                <div class="form-floating mb-4">
                  <input id="form_email" type="email" name="email" class="form-control" placeholder="jane.doe@example.com" required>
                  <label for="form_email">Email *</label>
                  <div class="valid-feedback"> Looks good! </div>
                  <div class="invalid-feedback"> Please provide a valid email address. </div>
                </div>
              </div>
              <!-- /column -->
              <div class="col-md-6">
                {{-- <div class="form-select-wrapper mb-4">
                  <select class="form-select" id="form-select" name="department" required>
                    <option selected disabled value="">Select a department</option>
                    <option value="Sales">Sales</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Customer Support">Customer Support</option>
                  </select>
                  <div class="valid-feedback"> Looks good! </div>
                  <div class="invalid-feedback"> Please select a department. </div>
                </div> --}}
                <div class="form-floating mb-4">
                  <input id="phone" type="tel" name="phone" class="form-control" placeholder="9019003490" required>
                  <label for="phone">Phone *</label>
                  <div class="valid-feedback"> Looks good! </div>
                  <div class="invalid-feedback"> Please provide a valid phone number. </div>
                </div>
              </div>
              <!-- /column -->
              <div class="col-12">
                <div class="form-floating mb-4">
                  <textarea id="form_message" name="message" class="form-control" placeholder="Your message" style="height: 150px" required></textarea>
                  <label for="form_message">Message *</label>
                  <div class="valid-feedback"> Looks good! </div>
                  <div class="invalid-feedback"> Please enter your messsage. </div>
                </div>
              </div>
              <!-- /column -->
              <div class="col-12 text-center">
                <input type="submit" class="btn btn-primary rounded-pill btn-send mb-3" value="Send message">
                <p class="text-muted"><strong>*</strong> These fields are required.</p>
              </div>
              <!-- /column -->
            </div>
            <!-- /.row -->
          </form>
          <!-- /form -->
        </div>
        <!-- /column -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </section>
  <!-- /section -->
  <section class="wrapper image-wrapper bg-auto no-overlay bg-image text-center bg-map" data-image-src="assets/img/map.png">
    <div class="container pt-0 pb-14 pt-md-16 pb-md-18">
      <div class="row">
        <div class="col-lg-9 col-xxl-8 mx-auto">
          <h3 class="display-4 mb-8 px-xl-12">We are community over 500+ students. Join us now and grow your career.</h3>
        </div>
        <!-- /.row -->
      </div>
      <!-- /column -->
      <div class="row">
        <div class="col-md-10 col-lg-9 col-xl-7 mx-auto">
          <div class="row align-items-center counter-wrapper gy-4 gy-md-0">
            <div class="col-md-4 text-center">
              <h3 class="counter counter-lg text-primary">100 +</h3>
              <p>Events Completed </p>
            </div>
            <!--/column -->
            <div class="col-md-4 text-center">
              <h3 class="counter counter-lg text-primary">50 +</h3>
              <p>Workshops Done</p>
            </div>
            <!--/column -->
            <div class="col-md-4 text-center">
              <h3 class="counter counter-lg text-primary">400 +</h3>
              <p>Active Members</p>
            </div>
            <!--/column -->
          </div>
          <!--/.row -->
        </div>
        <!-- /column -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </section>
@endsection
