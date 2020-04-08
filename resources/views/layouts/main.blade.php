<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.fancybox.css') }}" rel="stylesheet">
</head>
<body>
<!-- As a heading -->
<nav class="navbar justify-content-between">
    <span class="navbar-brand mb-0 h1"><img src="/images/signature.png" alt="Melvyn Biddulph" title="Melvyn Biddulph" width="60%"></span>
</nav>
    <div class="flex-center position-ref full-height">

        <div class="content">
            <main class="py-4">
                @yield('content')
            </main>
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
            &copy; copyright 2020 Melvyn Biddulph
        </div>
    </footer>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
</body>
</html>
