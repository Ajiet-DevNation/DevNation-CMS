@extends('layouts.app')

@section('meta')
<meta name="description"
    content="View details of the selected image in the DevNation gallery. Explore highlights from past events, workshops, and conferences, showcasing our developer community's achievements in DevOps and software engineering.">
<meta name="keywords"
    content="DevNation gallery, individual image view, developer community highlights, event photos, DevOps workshops, software engineering events, gallery display">
<meta name="author" content="DevNation">
@endsection

@section('title', 'DevNation Gallery | Image Details')

@section('content')
    @include('layouts.inlcudes.nav')

    <main class="row mt-6">
        <div class="col-lg-4 col-md-12 mb-4 mb-lg-0 mx-auto">
            @for ($i = 0; $i < ceil(count($gallery->gallery_images) / 3); $i++)
                <figure class="hover-scale rounded mb-6">
                    <img src="{{ Storage::url($gallery->gallery_images[$i]) }}" alt="gallery_image"><span class="bg"></span>
                </figure>
            @endfor
        </div>

        <div class="col-lg-4 mb-4 mb-lg-0">
            @for ($i = ceil(count($gallery->gallery_images) / 3); $i < ceil((2 * count($gallery->gallery_images)) / 3); $i++)
                <figure class="overlay overlay-1 hover-scale rounded mb-6">
                    <img src="{{ Storage::url($gallery->gallery_images[$i]) }}" alt="gallery_image"><span class="bg"></span>
                </figure>
            @endfor


            {{-- <center class="d-none d-sm-block"> <a href="galleries.html" target="_blank"
                class="btn position-relative over-hidden theme-bg text-white text-capitalize mt-35 aos-init"
                data-aos="fade-up" data-aos-duration="1000">View More</a></center> --}}
        </div>

        <div class="col-lg-4 mb-4 mb-lg-0">

            @for ($i = ceil((2 * count($gallery->gallery_images)) / 3); $i < count($gallery->gallery_images); $i++)
                <figure class="overlay overlay-1 hover-scale rounded mb-6">
                    <img src="{{ Storage::url($gallery->gallery_images[$i]) }}" alt="gallery_image"><span class="bg"></span>
                </figure>
            @endfor

            {{-- <center class="d-sm-none"> <a href="gallery.html" target="_blank"
                class="btn position-relative over-hidden theme-bg text-white text-capitalize mt-35 aos-init aos-animate"
                data-aos="fade-up" data-aos-duration="1000">View More</a></center> --}}
        </div>
    </main>
@endsection
