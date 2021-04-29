@extends('layouts.app')

@section('content')
    <div class="px-high">
        {{-- Head div--}}
        <div class="card bg-dark text-white custom-rounder-img custom-bg-img">
            <div class="card-img-overlay custom-rounder-img p-middle">
                <h5 class="card-title font-weight-bold display-4">
                    Discover the <br/> best car deals for you
                </h5>
                <p class="card-text h5 text-secondary pt-2 white-7">
                    Browse through our collection of cars
                    <br/>
                    to find the one that best fits your needs
                    <br/>
                    and budget
                </p>
            </div>
        </div>

        <div class="pt-5">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="display-4">
                    Car Catalogue
                </h1>
                <div class="d-flex">
                    <div class="dropdown">
                        <button
                            class="btn dropdown-toggle border border-primary quad-rounded px-3 text-primary font-weight-bold"
                            type="button"
                            id="dropdownMenuButton"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            Manufacturer
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>

                    <div class="dropdown mx-3">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Type
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Rating
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
            </div>

            <h5 class="text-black-50">
                Explore out cars you might like
            </h5>


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
    </div>
@endsection
