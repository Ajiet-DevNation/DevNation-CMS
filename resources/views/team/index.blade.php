@extends('layouts.app')

@section('meta')
<meta name="description"
    content="Meet our core DevNation community members who drive innovation and foster growth. Learn more about their roles and contributions to our vibrant developer community.">
<meta name="keywords"
    content="DevNation members, community leaders, developer team, core members, DevNation contributors">
<meta name="author" content="DevNation">
@endsection

@section('title', 'Our Team')

@section('content')

<section class="wrapper bg-light">
      @include('layouts.inlcudes.nav')
  <div class="container py-14 py-md-16">
    <div class="row mb-3">
      <div class="col-md-10 col-xl-9 col-xxl-7 mx-auto text-center">
        <img src="{{ asset('assets/img/icons/lineal/team.svg') }}" class="svg-inject icon-svg icon-svg-md mb-4" alt="" />
            <div class="mx-auto text-center">
                <h2 class="display-4 mb-3 px-lg-14">The Pillars of Our Community</h2>
                <p class="lead fs-lg mb-10">These individuals form the backbone of DevNation, each contributing their unique skills and passion to our thriving community.</p>
            </div>
      </div>
    </div>

    <div class="row g-4 justify-content-center">
      <!-- First Row -->
      @foreach ($teamMember as $member)
      <div class="col-12 col-md-4">
        <div class="card">
          <div class="card-body">
            <img class="rounded-circle w-15 mb-4 img-fluid" src="{{ str_contains($member->image, 'ui-avatars.com') ? $member->image : Storage::url($member->image) }}" alt="{{ $member->name }}" />
            <h4 class="mb-1">{{ $member->name }}</h4>
            <div class="meta mb-2">{{ $member->role->name }}</div>
            <p class="mb-2">Leading DevNation's initiatives and fostering community growth.</p>
            <nav class="nav social mb-0">
              <a href="#"><i class="uil uil-twitter"></i></a>
              <a href="#"><i class="uil uil-linkedin"></i></a>
              <a href="#"><i class="uil uil-github"></i></a>
            </nav>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</section>

@endsection