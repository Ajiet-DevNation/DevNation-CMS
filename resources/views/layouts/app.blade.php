<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Darshan Bhandary">

    {{-- renders dynamic meta data --}}
    @yield('meta')

    {{-- renders dynamic title --}}
    <title>DevNation | @yield('title')</title>


    <link rel="shortcut icon" href={{ asset('/assets/img/favicon.png') }}>
    @if (Request::is('events'))
        <link rel="stylesheet" href={{ asset('/assets/css/events.css') }}>
    @endif
    @if (Request::is('event-details/*'))
        <link rel="stylesheet" href={{ asset('/assets/css/event-details.css') }}>
    @endif
    @if (Request::is('gallery') || Request::is('gallery/*'))
        <link rel="stylesheet" href={{ asset('/assets/css/gallery.css') }}>
    @endif
    <link rel="stylesheet" href={{ asset('/assets/css/plugins.css') }}>
    <link rel="stylesheet" href={{ asset('/assets/css/style.css') }}>
    <link rel="stylesheet" href={{ asset('/assets/css/colors/navy.css') }}>
    <link rel="stylesheet" href={{ asset('/assets/css/profile.css') }}>
    @if (Request::is('profile'))
        <link rel="stylesheet" href={{ asset('/assets/css/profile.css') }}>
        
    @endif
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.0.1/css/unicons.css">
</head>

<body>
    @include('shared.success-message')
    <div class="content-wrapper">
        @yield('content')

        @include('layouts.inlcudes.footer')
    </div>
    <script src="/assets/js/plugins.js"></script>
    <script src="/assets/js/theme.js"></script>
    @if (Request::is('profile'))
        <script src="/assets/js/profile.js"></script>
    @endif
    <script src="/assets/js/session-messages.js"></script>
</body>
</html>
