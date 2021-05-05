<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white px-middle">
            <a class="navbar-brand spacer" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse d-flex" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav text-center flex-grow-1 justify-content-center font-weight-bold">
                    <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('carCatalogue') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('carCatalogue')}}">{{ __('Car Catalogue') }}</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('Contact Us') ? 'active' : '' }}">
                        <a class="nav-link" href="">{{ __('Contact Us') }}</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('Help') ? 'active' : '' }}">
                        <a class="nav-link" href="">{{ __('Help') }}</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto flex-grow-0">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <a class="nav-link text-primary font-weight-bold" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        @endif

                        @if (Route::has('register'))
                            <a
                                class="nav-link border border-primary quad-rounded px-3 ml-2 text-primary font-weight-bold"
                                href="{{ route('login') }}"
                            >
                                {{ __('Log in') }}
                            </a>
                        @endif
                    @else
                        <li class="bg-primary quad-rounded dropdown px-3">
                            <a
                                id="navbarDropdown"
                                class="nav-link dropdown-toggle text-white"
                                role="button"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item p-3" href="">
                                    {{ __('Profile') }}
                                </a>

                                <a class="dropdown-item p-3" href="">
                                    {{ __('Cart') }}
                                </a>

                                <a
                                    class="dropdown-item p-3"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                >
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.4.3/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/8.4.3/firebase-analytics.js"></script>

    <script>
        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        var firebaseConfig = {
            apiKey: "AIzaSyDPEM5VInlxFQXF2KylJ6iX1F-BujlJPY8",
            authDomain: "car-ecommerce.firebaseapp.com",
            projectId: "car-ecommerce",
            storageBucket: "car-ecommerce.appspot.com",
            messagingSenderId: "791729049608",
            appId: "1:791729049608:web:e5d30023d42daa81a5c1bd",
            measurementId: "G-L8CQW4QLSY"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();
    </script>
</body>
</html>
