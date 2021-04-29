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
                <form action="/" method="POST" class="d-flex">
                    <button class="btn btn-primary quad-rounded" type="button">
                        Used Cars
                    </button>

                    <button class="btn bg-transparent quad-rounded ml-2" type="button">
                        Used Vans
                    </button>

                    {{-- Category --}}
                    <div class="dropdown ml-5">
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

                    {{-- Year --}}
                    <div class="dropdown ml-auto">
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

                    {{-- Search --}}
                    <button class="btn btn-primary quad-rounded ml-5" type="submit">
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
                </form>
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
