<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-108886787-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-108886787-1');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Gallery of art by Melvyn Biddulph"/>
    <meta name="keywords" content="Art, artist, gallery, Sussex, lancing, worthing, shoreham"/>
    <title>Melvyn Biddulph - Artist</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e167166ec4.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">
    <link href="css/jquery.fancybox.css" rel="stylesheet">
</head>
<body>
<!-- As a heading -->
<nav class="navbar justify-content-between">
    <span class="navbar-brand mb-0 h1"><img src="/images/signature.png" alt="Melvyn Biddulph" title="Melvyn Biddulph" width="60%"></span>
    <div class="app-store-download">
        <a href="https://apps.apple.com/us/app/mbiddulph/id1627696444" target="_blank">
            <img src="https://melvynbiddulph.co.uk/images/download-appstore.png" width="200" alt="Download on the app store" />
        </a>
    </div>
</nav>
    <div class="flex-center position-ref full-height">

        <div class="content">
            <main class="py-4">
                @yield('content')
            </main>
        </div>

        <div class="app-store-download">
            <a href="https://apps.apple.com/us/app/mbiddulph/id1627696444" target="_blank">
                <img src="https://melvynbiddulph.co.uk/images/download-appstore.png" width="200" alt="Download on the app store" />
            </a>
        </div>
{{--        <ul class="navbar-nav">--}}
{{--            @if (Route::has('login'))--}}
{{--                @auth--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{ url('/home') }}">Home</a>--}}
{{--                    </li>--}}
{{--                @else--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{ route('login') }}">Login</a>--}}
{{--                    </li>--}}
{{--                    @if (Route::has('register'))--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="{{ route('register') }}">Register</a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                @endauth--}}
{{--            @endif--}}
{{--        </ul>--}}
    </div>
    <footer class="bg-dark">
        <div class="copyright">
            &copy; copyright 2022 Melvyn Biddulph
        </div>
    </footer>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
</body>
</html>
