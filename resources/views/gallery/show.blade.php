@extends('layouts.app')

@section('content')
    @include('layouts.inlcudes.nav')

    <main class="row mt-6">
        <div class="col-lg-4 col-md-12 mb-4 mb-lg-0 mx-auto">
            @for ($i = 0; $i < ceil(count($gallery->gallery_images) / 3); $i++)
                <figure class="hover-scale rounded mb-6">
                    <img src="{{ Storage::url($gallery->gallery_images[$i]) }}" alt=""><span class="bg"></span>
                </figure>
            @endfor
        </div>

        <div class="col-lg-4 mb-4 mb-lg-0">
            @for ($i = ceil(count($gallery->gallery_images) / 3); $i < ceil((2 * count($gallery->gallery_images)) / 3); $i++)
                <figure class="overlay overlay-1 hover-scale rounded mb-6">
                    <img src="{{ Storage::url($gallery->gallery_images[$i]) }}" alt=""><span class="bg"></span>
                </figure>
            @endfor


            {{-- <center class="d-none d-sm-block"> <a href="galleries.html" target="_blank"
                class="btn position-relative over-hidden theme-bg text-white text-capitalize mt-35 aos-init"
                data-aos="fade-up" data-aos-duration="1000">View More</a></center> --}}
        </div>

        <div class="col-lg-4 mb-4 mb-lg-0">

            @for ($i = ceil((2 * count($gallery->gallery_images)) / 3); $i < count($gallery->gallery_images); $i++)
                <figure class="overlay overlay-1 hover-scale rounded mb-6">
                    <img src="{{ Storage::url($gallery->gallery_images[$i]) }}" alt=""><span class="bg"></span>
                </figure>
            @endfor

            {{-- <center class="d-sm-none"> <a href="gallery.html" target="_blank"
                class="btn position-relative over-hidden theme-bg text-white text-capitalize mt-35 aos-init aos-animate"
                data-aos="fade-up" data-aos-duration="1000">View More</a></center> --}}
        </div>
    </main>
@endsection
