@extends('layouts.app')

@section('meta')
    <meta name="description"
        content="Manage your DevNation profile to keep your developer information, preferences, and progress up to date. Customize your profile to highlight your DevOps skills, software engineering expertise, and personal achievements.">
    <meta name="keywords"
        content="DevNation profile, manage developer profile, DevOps skills, software engineering profile, developer achievements, DevNation account, developer preferences, showcase skills, developer interests">
    <meta name="author" content="DevNation">
@endsection

@section('title', 'Profile')

@section('content')
    <div class="rect">
        @include('layouts.inlcudes.nav')
    </div>
    <form class="cover" action="{{ route('profile.update') }}" method="POST">
        @csrf
        <div class="circleCover">
            <div class="circle ">
                <img src="{{ $profile->image }}" alt="Profile Image" style="width: 100%;height: 100%;" />
                <label  for="profile-image"><i class="uil uil-image-edit"></i></label>
                <input name="profile-image" type="file" accept="image/*" style="display:none" id ="profile-image"/>
            </div>
            <h2 id="details2">{{ $profile->name }}</h2>
            <div id = 'form2' style="display:none">
                <div>
                    <p style="margin:0">Name</p>
                    <input name="name" class='di' type="text" style="text-align: center"
                        value="{{ $profile->name }}" />
                </div>
            </div>
            <button type="button" id = 'edit' class="tab_btn">
                <span>EDIT</span>
            </button>
        </div>
        <div class="containerB">
            <div class="tab_box">
                <button class="tab_btn active" id ='p' type="button">PROFILE</button>
                <button class="tab_btn" type="button">CERTIFICATE</button>
                <button class="tab_btn" type="button">EVENTS</button>
                <div class="line"></div>
            </div>
            <div class="content_box">
                <div class="content active">
                    <div class="details" id = 'details'>
                        <div>
                            <p>USN</p>
                            <h3 class='h'>{{ $profile->usn }}</h3>
                        </div>
                        <div>
                            <p>EMAIL</p>
                            <h3 class='h'>{{ $profile->email }}</h3>
                        </div>
                        <div>
                            <p>SEMESTER</p>
                            <h3 class='h'>{{ $profile->semester }}</h3>
                        </div>
                        <div>
                            <p>COLLEGE</p>
                            <h3 class='h'>{{ $profile->college->name }}</h3>
                        </div>
                        <div>
                            <p>PHONE NO</p>
                            <h3 class='h'>{{ $profile->phone }}</h3>
                        </div>
                    </div>

                    <div class="details" id = 'form' style="display: none">
                        <div>
                            <p>USN</p>
                            <input name="usn" class='di' type="text" value="{{ $profile->usn }}" />
                        </div>
                        <div>
                            <p>EMAIL</p>
                            <input name="email" class='di' type="text" value="{{ $profile->email }}" />
                        </div>
                        <div>
                            <p>SEMESTER</p>
                            <input name="semester" class='di' type="number" min=1 max=8
                                value="{{ $profile->semester }}" />
                        </div>
                        <div>
                            <p>COLLEGE</p>
                            <select name="college" class='di'>
                                @foreach ($colleges as $college)
                                    <option value="{{ $college->id }}">{{ $college->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <p>PHONE NO</p>
                            <input name="phone" class='di' type="text" value="{{ $profile->phone }}" />
                        </div>
                        <div class="button">
                            <button id="submit" type="submit">
                                SUBMIT
                            </button>
                            <button id="cancel" type="button">
                                CANCEL
                            </button>
                        </div>
                    </div>


                </div>

                <div class="content">
                    <div class="details certificate acertificate">
                        <div class="certiCard">
                            <div class="img">
                                <img src="https://www.theoryofchange.org/wp-content/uploads/2018/11/TOC-certificate.jpg" />
                            </div>
                            <div class="cardInfo">
                                <h3>NAME</h3>

                                <button><i class="uil uil-import"></i>DOWNLOAD</button>
                            </div>

                        </div>

                        <div class="certiCard">
                            <div class="img">
                                <img src="https://www.theoryofchange.org/wp-content/uploads/2018/11/TOC-certificate.jpg" />
                            </div>
                            <div class="cardInfo">
                                <h3>NAME</h3>

                                <button><i class="uil uil-import"></i>DOWNLOAD</button>
                            </div>
                        </div>
                        <div class="certiCard">
                            <div class="img">
                                <img src="https://www.theoryofchange.org/wp-content/uploads/2018/11/TOC-certificate.jpg" />
                            </div>
                            <div class="cardInfo">
                                <h3>NAME</h3>

                                <button><i class="uil uil-import"></i>DOWNLOAD</button>
                            </div>
                        </div>




                    </div>


                </div>
                <div class="content">
                    <div class="details certificate">
                        <article class="particle">
                            <figure class="overlay overlay-1 hover-scale rounded mb-6"><a
                                    href="http://localhost:8000/events/1"> <img src="https://placehold.co/300x300"
                                        alt=""><span class="bg"></span><span class="bg"></span></a>
                                <figcaption>
                                    <h5 class="from-top mb-0">Read More</h5>
                                </figcaption>
                            </figure>
                            <div class="post-header">
                                <h2 class="post-title h3 mb-3 text-center">Webinar</h2>
                            </div>
                            <!-- /.post-header -->
                            <div class="post-footer">
                                <ul class="post-meta text-center">
                                    <li class="post-date"><i class="uil uil-calendar-alt"></i><span>2024-10-10
                                            23:24:29</span>
                                    </li>
                                    <li class="post-comments"><a href="#"><i
                                                class="uil uil-map-marker fs-15"></i>Pune, India</a>
                                    </li>
                                </ul>
                                <!-- /.post-meta -->

                            </div>
                            <!-- /.post-footer -->
                        </article>
                        <article class="particle">
                            <figure class="overlay overlay-1 hover-scale rounded mb-6"><a
                                    href="http://localhost:8000/events/1"> <img src="/assets/img/photos/b6.jpg"
                                        alt=""><span class="bg"></span><span class="bg"></span></a>
                                <figcaption>
                                    <h5 class="from-top mb-0">Read More</h5>
                                </figcaption>
                            </figure>
                            <div class="post-header">
                                <h2 class="post-title h3 mb-3 text-center">Webinar</h2>
                            </div>
                            <!-- /.post-header -->
                            <div class="post-footer">
                                <ul class="post-meta text-center">
                                    <li class="post-date"><i class="uil uil-calendar-alt"></i><span>2024-10-10
                                            23:24:29</span>
                                    </li>
                                    <li class="post-comments"><a href="#"><i
                                                class="uil uil-map-marker fs-15"></i>Pune, India</a>
                                    </li>
                                </ul>
                                <!-- /.post-meta -->

                            </div>
                            <!-- /.post-footer -->
                        </article>
                        <article class="particle">
                            <figure class="overlay overlay-1 hover-scale rounded mb-6"><a
                                    href="http://localhost:8000/events/1"> <img src="/assets/img/photos/b6.jpg"
                                        alt=""><span class="bg"></span><span class="bg"></span></a>
                                <figcaption>
                                    <h5 class="from-top mb-0">Read More</h5>
                                </figcaption>
                            </figure>
                            <div class="post-header">
                                <h2 class="post-title h3 mb-3 text-center">Webinar</h2>
                            </div>
                            <!-- /.post-header -->
                            <div class="post-footer">
                                <ul class="post-meta text-center">
                                    <li class="post-date"><i class="uil uil-calendar-alt"></i><span>2024-10-10
                                            23:24:29</span>
                                    </li>
                                    <li class="post-comments"><a href="#"><i
                                                class="uil uil-map-marker fs-15"></i>Pune, India</a>
                                    </li>
                                </ul>
                                <!-- /.post-meta -->

                            </div>
                            <!-- /.post-footer -->
                        </article>
                    </div>
                </div>
            </div>


        </div>
    </form>


@endsection
