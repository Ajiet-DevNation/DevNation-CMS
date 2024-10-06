@extends('layouts.app')


@section('meta')
<meta name="description"
    content="Manage your DevNation profile to keep your developer information, preferences, and progress up to date. Customize your profile to showcase your skills, interests, and achievements.">
<meta name="keywords"
    content="DevNation profile, developer profile, DevOps skills, software engineering profile, developer achievements, manage profile, DevNation account, developer interests">
<meta name="author" content="elemis">
@endsection

@section('title', 'Profile')

@section('content')
    @include('layouts.inlcudes.nav')
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-12" style="width: 80%; padding: 0px !important;box-shadow: 0px 0px 500px rgb(21 45 90 / 22%);">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <!-- Make this column take full width on smaller devices and 4 columns on large devices -->
                        <div class="col-12 col-lg-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25">
                                    <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                                </div>
                                <h6 class="f-w-600" style="color: #c0e5e4">Hembo Tingor</h6>
                                <i class="mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                <button>
                                    <i class="uil uil-pen"></i>
                                    <span>EDIT</span>
                                </button>
                            </div>
                        </div>
                        <!-- Make this column take full width on smaller devices and 8 columns on large devices -->
                        <div class="col-12 col-lg-8" style="padding: calc(var(--bs-gutter-x) * 0.5)">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600" style="color:#15235a">Information</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400">rntng@gmail.com</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400">98979989898</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">USN</p>
                                        <h6 class="text-muted f-w-400">4JK22CS***</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">SEMESTER</p>
                                        <h6 class="text-muted f-w-400">V</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">BRANCH</p>
                                        <h6 class="text-muted f-w-400">CSE</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">COLLEGE</p>
                                        <h6 class="text-muted f-w-400">AJIET</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection