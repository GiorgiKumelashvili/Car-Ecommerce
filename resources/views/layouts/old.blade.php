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
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

<!--
@extends('layouts.app')

@section('content')
    <div class="px-middle">
        {{-- Head div--}}
        <div>
            <div class="card bg-dark text-white custom-rounder-img custom-bg-img">
                {{-- here is image--}}
        <div class="card-img-overlay custom-rounder-img p-middle">
            <h5 class="card-title font-weight-bold display-4">
                Discover the <br/> best car deals for you
            </h5>
            <p class="card-text h5 text-secondary pt-2 middle-white">
                Browse through our collection of cars
                <br/>
                to find the one that best fits your needs
                <br/>
                and budget
            </p>
        </div>
    </div>

    <div class="card text-dark quad-rounded-2 custom-floating-card px-4 py-3 mx-middle shadow-lg">
        <div class="d-flex justify-content-between">
            <div class="d-flex">
                <button class="btn btn-primary quad-rounded " type="button">
                    Used Cars
                </button>

                <button class="btn bg-transparent quad-rounded ml-2" type="button">
                    Used Vans
                </button>
            </div>

            <div class="d-flex">
{{-- Category --}}
        <div class="dropdown">
            <button
                class="btn border border-secondary quad-rounded dropdown-toggle"
                type="button"
                id="dropdownMenuButton"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
            >
                Category
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Sedan</a>
                <a class="dropdown-item" href="#">Coupe</a>
                <a class="dropdown-item" href="#">Convertible</a>
                <a class="dropdown-item" href="#">Minivan</a>
                <a class="dropdown-item" href="#">Hatchback</a>
                <a class="dropdown-item" href="#">Sports Car</a>
                <a class="dropdown-item" href="#">Luxury Car</a>
            </div>
        </div>

{{-- Manufacturer --}}
        <div class="dropdown">
            <button
                class="btn border border-secondary quad-rounded dropdown-toggle ml-2"
                type="button"
                id="dropdownMenuButton"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
            >
                Manufacturer
            </button>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                <a class="dropdown-item" href="#">2000 - 2010</a>
                <a class="dropdown-item" href="#">2010 - {{date('Y')}}</a>
                                <a class="dropdown-item" href="#"> > {{date('Y')}}</a>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex">
                        {{-- Year --}}
        <div class="dropdown">
            <button
                class="btn border border-secondary quad-rounded dropdown-toggle px-4"
                type="button"
                id="dropdownMenuButton"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
            >
                Year
            </button>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">2000 < </a>
                <a class="dropdown-item" href="#">2000 - 2010</a>
                <a class="dropdown-item" href="#">2010 - {{date('Y')}}</a>
                                <a class="dropdown-item" href="#">> {{date('Y')}} </a>
                            </div>
                        </div>

                        {{-- 0 $ --}}
        <div class="dropdown ml-2">
            <button
                class="btn border border-secondary quad-rounded dropdown-toggle px-3"
                type="button"
                id="dropdownMenuButton"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
            >
                0 $
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
@for ($i = 0; $i <= (10000 / 500); $i++)
        <a class="dropdown-item" href="#">{{$i * 500}}</a>
                                @endfor
        </div>
    </div>

{{-- 7000 $ --}}
        <div class="dropdown ml-2">
            <button
                class="btn border border-secondary quad-rounded dropdown-toggle px-3"
                type="button"
                id="dropdownMenuButton"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
            >
                7000 $
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
@for ($i = 0; $i <= (10000 / 500); $i++)
        <a class="dropdown-item" href="#">{{$i * 500}}</a>
                                @endfor
        </div>
    </div>
</div>

{{-- Search --}}
        <button
            class="btn btn-primary quad-rounded"
            type="button"
        >
            <svg xmlns="http://www.w3.org/2000/svg"
                 x="0px"
                 y="0px"
                 width="20" height="20"
                 viewBox="0 0 172 172"
                 style=" fill:#000000;"
            >
                <g fill="none" fill-rule="nonzero"
                   stroke="none" stroke-width="1" stroke-linecap="butt"
                   stroke-linejoin="miter" stroke-miterlimit="10"
                   stroke-dasharray="" stroke-dashoffset="0"
                   font-family="none" font-size="none"
                   style="mix-blend-mode: normal"
                >
                    <path d="M0,172v-172h172v172z" fill="none"></path>
                    <g fill="#ffffff">
                        <path
                            d="M72.24,10.32c-32.336,0 -58.48,26.144 -58.48,58.48c0,32.336 26.144,58.48 58.48,58.48c11.53966,0 22.26038,-3.37175 31.3161,-9.12406l42.22734,42.22063l14.59313,-14.59313l-41.61594,-41.62265c7.47269,-9.82224 11.95937,-22.04576 11.95937,-35.36078c0,-32.336 -26.144,-58.48 -58.48,-58.48zM72.24,24.08c24.768,0 44.72,19.952 44.72,44.72c0,24.768 -19.952,44.72 -44.72,44.72c-24.768,0 -44.72,-19.952 -44.72,-44.72c0,-24.768 19.952,-44.72 44.72,-44.72z"></path>
                    </g>
                </g>
            </svg>
        </button>
    </div>
</div>
</div>

<h1>Best Deals</h1>

<div class="row">
@for ($i = 0; $i < 6; $i++)
        <div class="col-12 col-md-3 pt-5">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Card {{$i}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                            <p class="card-text">
                                Some quick example text to build on the card title and make up the bulk
                                of the card's content.
                            </p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection

-->
