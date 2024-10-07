@extends('layouts.app')


@section('meta')
<meta name="description"
    content="Explore the DevNation gallery to see highlights from our past events, workshops, and conferences. Discover moments captured from our developer community's journey in DevOps, software engineering, and tech innovation.">
<meta name="keywords"
    content="DevNation gallery, event highlights, developer community photos, DevOps workshops photos, tech conference images, software engineering events gallery, DevNation events, tech community gallery">
<meta name="author" content="elemis">
@endsection

@section('title', 'Gallery')
@section('content')
    @include('layouts.inlcudes.nav')
    {{-- <main class="row"> --}}
        <section class="px-lg-16 m-lg-8">
            <div class="cards-wrapper">
                @foreach ($galleries as $gallery)
                    <article style="text-align: center;">
                        <a href="{{ route('gallery.show', $gallery->id) }}">
                            <figure class="overlay overlay-1 hover-scale rounded mb-6" style="width: 320px;height: 220px;">
                                <img style="object-fit:cover; width:100%; height:100% !important;"
                                    src="{{ Storage::url($gallery->image) }}" alt="gallery image"><span class="bg"></span>
                                <figcaption>
                                    <h5 class="from-top mb-0">View Gallery</h5>
                                </figcaption>
                            </figure>
                        </a>
                        <div class="post-header">
                            <h2 class="post-title h3 mb-3 text-center">{{ $gallery->name }}</h2>
                        </div>
                        <div class="post-footer">
                            {{ $gallery->description }}
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    {{-- </main> --}}
@endsection
