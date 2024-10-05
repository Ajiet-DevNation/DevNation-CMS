<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
    <meta name="keywords"
        content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
    <meta name="author" content="elemis">
    <title>DevNation</title>
    <link rel="shortcut icon" href={{ asset('/assets/img/favicon.png') }}>
    @if (Request::is('events'))
        <link rel="stylesheet" href={{ asset('/assets/css/events.css') }}>
    @endif
    @if (Request::is('event-details/*'))
        <link rel="stylesheet" href={{ asset('/assets/css/event-details.css') }}>
    @endif
    @if (Request::is('gallery'))
        <link rel="stylesheet" href={{ asset('/assets/css/gallery.css') }}>
    @endif
    <link rel="stylesheet" href={{ asset('/assets/css/plugins.css') }}>
    <link rel="stylesheet" href={{ asset('/assets/css/style.css') }}>
    <link rel="stylesheet" href={{ asset('/assets/css/colors/navy.css') }}>
    <link rel="stylesheet" href={{ asset('/assets/css/profile.css') }}>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.0.1/css/unicons.css">
</head>

<body>
    <div class="content-wrapper">

        @yield('content')

        @include('layouts.inlcudes.footer')
    </div>
    <script src="/assets/js/plugins.js"></script>
    <script src="/assets/js/theme.js"></script>
</body>

</html>
