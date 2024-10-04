<x-layout>
    <x-nav />
    <main class="mx-auto bg-gray">
        <section class="m-8">
            <h1>Upcoming Events</h1>
            <div class="cards-wrapper">
                @foreach ($upcomingEvents as $event)
                    <article>
                        <figure class="overlay overlay-1 hover-scale rounded mb-6"><a href="#"> <img
                                    src={{ $event->banner }} alt=""><span class="bg"></span></a>
                            <figcaption>
                                <h5 class="from-top mb-0">Read More</h5>
                            </figcaption>
                        </figure>
                        <div class="post-header">
                            <h2 class="post-title h3 mb-3 text-center"><a class="link-dark"
                                    href="./blog-post.html">{{ $event->name }}</a></h2>
                        </div>
                        <!-- /.post-header -->
                        <div class="post-footer">
                            <ul class="post-meta text-center">
                                <li class="post-date"><i
                                        class="uil uil-calendar-alt"></i><span>{{ $event->start_date }}</span>
                                </li>
                                <li class="post-comments"><a href="#"><i
                                            class="uil uil-map-marker fs-15"></i>{{ $event->location }}</a>
                                </li>
                            </ul>
                            <!-- /.post-meta -->
                            <button><span>Register Now{{-- <i class="uil uil-arrow-up-right"></i> --}}</span></button>
                        </div>
                        <!-- /.post-footer -->
                    </article>
                @endforeach
            </div>
        </section>
    </main>
    <main class="mx-auto bg-gray">
        <section class="m-8">
            <h1>Past Events</h1>
            <div class="cards-wrapper">
                @foreach ($pastEvents as $event)
                    <article>
                        <figure class="overlay overlay-1 hover-scale rounded mb-6"><a href="#"> <img
                                    src={{ $event->banner }} alt=""><span class="bg"></span></a>
                            <figcaption>
                                <h5 class="from-top mb-0">Read More</h5>
                            </figcaption>
                        </figure>
                        <div class="post-header">
                            <h2 class="post-title h3 mb-3 text-center"><a class="link-dark"
                                    href="./blog-post.html">{{ $event->name }}</a></h2>
                        </div>
                        <!-- /.post-header -->
                        <div class="post-footer">
                            <ul class="post-meta text-center">
                                <li class="post-date"><i
                                        class="uil uil-calendar-alt"></i><span>{{ $event->start_date }}</span>
                                </li>
                                <li class="post-comments"><a href="#"><i
                                            class="uil uil-map-marker fs-15"></i>{{ $event->location }}</a>
                                </li>
                            </ul>
                            <!-- /.post-meta -->
                        </div>
                        <!-- /.post-footer -->
                    </article>
                @endforeach
            </div>
        </section>
    </main>
</x-layout>
