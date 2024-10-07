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
    <div class="cover">
        <div class="circleCover">
            <div class="circle">
                <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                    alt="Default Profile Image" style="width: 100%;hieght: 100% ;" />

            </div>
            <h2>The Name</h2>
            <button id = 'edit' class="tab_btn">
                <i class="uil uil-pen"></i>
                <span>EDIT</span>
            </button>
        </div>

        <div class="containerB">
            <div class="tab_box">
                <button class="tab_btn active" id ='p'>PROFILE</button>
                <button class="tab_btn">CERTIFICATE</button>
                <button class="tab_btn">EVENTS</button>
                <div class="line"></div>
            </div>
            <div class="content_box">
                <div class="content active">
                    <div class="details" id = 'details'>
                        <div>
                            <p>USN</p>
                            <h3 class='h'>4JK22CS**</h3>
                        </div>
                        <div>
                            <p>EMAIL</p>
                            <h3 class='h'>asjdi@gmail.com</h3>
                        </div>
                        <div>
                            <p>SEMESTER</p>
                            <h3 class='h'>2</h3>
                        </div>
                        <div>
                            <p>COLLEGE</p>
                            <h3 class='h'>A J INSTITUTE OF ENGINEERING AND TECHNOLOGY, MANGALORE</h3>
                        </div>
                        <div>
                            <p>PHONE NO</p>
                            <h3 class='h'>1234567890</h3>
                        </div>
                    </div>

                    <form class="details" id = 'form' action="#" style="display: none">
                        <div>
                            <p>USN</p>
                            <input class='di' type="text" value="4JK22CS**" />
                        </div>
                        <div>
                            <p>EMAIL</p>
                            <input class='di' type="text" value="asjdi@gmail.com" />
                        </div>
                        <div>
                            <p>SEMESTER</p>
                            <input class='di' type="text" value="2" />
                        </div>
                        <div>
                            <p>COLLEGE</p>
                            <input class='di' type="text"
                                value="A J INSTITUTE OF ENGINEERING AND TECHNOLOGY, MANGALORE" />
                        </div>
                        <div>
                            <p>PHONE NO</p>
                            <input class='di' type="text" value="1234567890" />
                        </div>
                        <div class="button">
                            <button id="submit" type="submit">
                                SUBMIT
                            </button>
                            <button id="cancel">
                                CANCEL
                            </button>
                        </div>
                    </form>


                </div>

                <div class="content">
                    <div class="details certificate acertificate">
                        <div class="certiCard">
                            <div class="img">
                                <img
                                    src="https://www.theoryofchange.org/wp-content/uploads/2018/11/TOC-certificate.jpg" />
                            </div>
                            <div class="cardInfo">
                                <h3>NAME</h3>

                                <button><i class="uil uil-import"></i>DOWNLOAD</button>
                            </div>

                        </div>

                        <div class="certiCard">
                            <div class="img">
                                <img
                                    src="https://www.theoryofchange.org/wp-content/uploads/2018/11/TOC-certificate.jpg" />
                            </div>
                            <div class="cardInfo">
                                <h3>NAME</h3>

                                <button><i class="uil uil-import"></i>DOWNLOAD</button>
                            </div>
                        </div>
                        <div class="certiCard">
                            <div class="img">
                                <img
                                    src="https://www.theoryofchange.org/wp-content/uploads/2018/11/TOC-certificate.jpg" />
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
                            <figure class="overlay overlay-1 hover-scale rounded mb-6"><a href="http://localhost:8000/events/1"> <img src="/assets/img/photos/b6.jpg" alt=""><span class="bg"></span><span class="bg"></span></a>
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
                                    <li class="post-date"><i class="uil uil-calendar-alt"></i><span>2024-10-10 23:24:29</span>
                                    </li>
                                    <li class="post-comments"><a href="#"><i class="uil uil-map-marker fs-15"></i>Pune, India</a>
                                    </li>
                                </ul>
                                <!-- /.post-meta -->
                                
                            </div>
                            <!-- /.post-footer -->
                        </article>
                        <article class="particle">
                            <figure class="overlay overlay-1 hover-scale rounded mb-6"><a href="http://localhost:8000/events/1"> <img src="/assets/img/photos/b6.jpg" alt=""><span class="bg"></span><span class="bg"></span></a>
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
                                    <li class="post-date"><i class="uil uil-calendar-alt"></i><span>2024-10-10 23:24:29</span>
                                    </li>
                                    <li class="post-comments"><a href="#"><i class="uil uil-map-marker fs-15"></i>Pune, India</a>
                                    </li>
                                </ul>
                                <!-- /.post-meta -->
                                
                            </div>
                            <!-- /.post-footer -->
                        </article>
                        <article class="particle">
                            <figure class="overlay overlay-1 hover-scale rounded mb-6"><a href="http://localhost:8000/events/1"> <img src="/assets/img/photos/b6.jpg" alt=""><span class="bg"></span><span class="bg"></span></a>
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
                                    <li class="post-date"><i class="uil uil-calendar-alt"></i><span>2024-10-10 23:24:29</span>
                                    </li>
                                    <li class="post-comments"><a href="#"><i class="uil uil-map-marker fs-15"></i>Pune, India</a>
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


        </div>
@endsection