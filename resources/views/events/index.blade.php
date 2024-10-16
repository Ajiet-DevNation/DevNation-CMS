@extends('layouts.app')

@section('meta')
<meta name="description"
    content="Stay updated on the latest DevNation events, including webinars, workshops, and conferences focused on DevOps, software engineering, and emerging technology trends. Join us to enhance your skills and grow your network.">
<meta name="keywords"
    content="DevNation events, DevNation webinars, developer workshops, tech conferences, software engineering events, DevOps workshops, technology events, DevNation conferences">
<meta name="author" content="DevNation">
@endsection

@section('title', 'Events')

@section('content')

@include('layouts.inlcudes.nav')

<main class="mx-auto bg-gray">
    <section class="m-8">
            <h2>Upcoming Events</h2>
            <div class="cards-wrapper">
                @if (!$upcomingEvents->isNotEmpty() )
                @foreach ($upcomingEvents as $event)
                <article>
                    <a href="{{ route('event.show', $event->id) }}">
                        <figure class="overlay overlay-1 hover-scale rounded mb-6"
                            style="width: 320px;height: 220px;">
                            @if ($event->banner == null)
                            <img style="object-fit:cover; width:100%; height:100% !important;"
                                src="https://placehold.co/300x300" alt=""><span class="bg"></span>
                                <figcaption>
                                    <h5 class="from-top mb-0">Read More</h5>
                                </figcaption>
                            @else
                                <img style="object-fit:cover; width:100%; height:100% !important;"
                                src="{{ Storage::url($event->banner) }}" alt=""><span class="bg"></span>
                                <figcaption>
                                    <h5 class="from-top mb-0">Read More</h5>
                                </figcaption>
                            @endif
                        </figure>
                    </a>
                    <div class="post-header">
                        <h3 class="post-title h3 mb-3 text-center">{{ $event->name }}</h3>
                    </div>
                    <div class="post-footer">
                        <ul class="post-meta text-center">
                            <li class="post-date"><i
                                    class="uil uil-calendar-alt"></i><span>{{ $event->start_date }}</span>
                            </li>
                            <li class="post-comments"><a href="#"><i
                                class="uil uil-map-marker fs-15"></i>{{ $event->location }}</a>
                            </li>
                        </ul>
                        <button><span>Register Now</span></button>
                    </div>
                </article>
            @endforeach
                @else
                    <h1>Stay tuned for our Exciting Events!!</h1>
                @endif
            </div>
        </section>
    </main>
    <main class="mx-auto bg-gray">
        <section class="m-8">
            <h2>Past Events</h2>
            <div class="cards-wrapper">
                @foreach ($pastEvents as $event)
                    <article>
                        <a href="{{ route('event.show', $event->id) }}">
                            <figure class="overlay overlay-1 hover-scale rounded mb-6"
                                style="width: 320px;height: 220px;">
                                @if ($event->banner == null)
                                <img style="object-fit:cover; width:100%; height:100% !important;"
                                    src="https://placehold.co/300x300" alt=""><span class="bg"></span>
                                    <figcaption>
                                        <h5 class="from-top mb-0">Read More</h5>
                                    </figcaption>
                                @else
                                    <img style="object-fit:cover; width:100%; height:100% !important;"
                                    src="{{ Storage::url($event->banner) }}" alt=""><span class="bg"></span>
                                    <figcaption>
                                        <h5 class="from-top mb-0">Read More</h5>
                                    </figcaption>
                                @endif
                            </figure>
                        </a>
                        <div class="post-header">
                            <h3 class="post-title h3 mb-3 text-center">{{ $event->name }}</h3>
                        </div>
                        <div class="post-footer">
                            <ul class="post-meta text-center">
                                <li class="post-date"><i
                                        class="uil uil-calendar-alt"></i><span>{{ $event->start_date }}</span>
                                </li>
                                <li class="post-comments"><a href="#"><i
                                            class="uil uil-map-marker fs-15"></i>{{ $event->location }}</a>
                                </li>
                            </ul>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    </main>
@endsection
