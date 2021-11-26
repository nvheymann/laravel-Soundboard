<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Soundboard</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>


<div class="sound-color-p">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light sound-color-p">
            <img src="/img/icon-sound.png" width="50" height="50" class="d-inline-block align-top mr-3" alt="">
            <a class="navbar-brand" href="#"><h3 class="text-white">Soundboard</h3></a>

            <div class="collapse navbar-collapse container ml-5" id="navbarNav">
                <ul class="navbar-nav ml-5">
                    <li class="nav-item active pl-4">
                        <a class="nav-link text-white" href="{{Route('sounds')}}"><h4 class="sound-nav-links">Sounds</h4></a>
                    </li>
                    <li class="nav-item pl-4">
                        <a class="nav-link text-white" href="{{Route('ownsounds')}}"><h4 class="sound-nav-links">Own Sounds</h4></a>
                    </li>
                    <li class="nav-item pl-4">
                        <a class="nav-link text-white" href="{{Route('profile')}}">
                            <h4 class="sound-nav-links">Profil</h4>
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                @if (Auth::check())
                    <a href="{{ route('logout') }}" class="nav-link text-white">
                        <img src="/img/icon-lock.png" width="50" height="50" class="d-inline-block align-top mr-3" alt="">
                        <h5 class="sound-nav-links">Logout</h5>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="nav-link text-white">
                        <img src="/img/icon-lock.png" width="50" height="50" class="d-inline-block align-top mr-3" alt="">
                        <h5 class="sound-nav-links">Login</h5>
                    </a>
                @endif
            </div>
        </nav>
    </div>
</div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
