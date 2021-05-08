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
                    Hot deals
                </h1>
                <div class="d-flex">
                    <div class="dropdown">
                        <button
                            class="btn dropdown-toggle border border-primary quad-rounded-less px-3 text-primary font-weight-bold d-flex align-items-center"
                            type="button"
                            id="dropdownMenuButton"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            Manufacturer

                            <svg class="bi bi-gear-wide-connected mx-2" xmlns="http://www.w3.org/2000/svg" width="16"
                                 height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646.087.065-.087-.065z"/>
                            </svg>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>

                    <div class="dropdown mx-3">
                        <button
                            class="btn dropdown-toggle border border-primary quad-rounded-less px-3 text-primary font-weight-bold d-flex align-items-center"
                            type="button"
                            id="dropdownMenuButton"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            Type

                            <svg class="bi bi-key-fill mx-2" xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                 fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>

                    <div class="dropdown">
                        <button
                            class="btn dropdown-toggle border border-primary quad-rounded-less px-3 text-primary font-weight-bold"
                            type="button"
                            id="dropdownMenuButton"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
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

            <h5 class="text-black-50 pt-2 mb-5">
                Explore out cars you might like
            </h5>


            @if(false)
                <div class="card quad-rounded mt-5 shadow-sm" style="width: 20rem">
                    <h4 class="card-title font-weight-bold text-center m-0 py-4 px-4 text-truncate">
                        MERCEDES-BENZ E 350
                    </h4>

                    <img
                        src="https://firebasestorage.googleapis.com/v0/b/car-ecommerce.appspot.com/o/52072612-1-large.jpg?alt=media"
                        class="card-img-top"
                        alt="mercedes"
                    >
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between">
                            <p>Starting Price</p>
                            <p class="font-weight-bold">$ 35,000</p>
                        </div>
                        <div class="card-text d-flex justify-content-between">
                            <p>distance</p>
                            <p class="font-weight-bold">185600 კმ</p>
                        </div>

                        <a href="{{route('carDetailedView', ['id' => '001'])}}" class="card-link text-white">
                            <button class="btn btn-primary d-block quad-rounded-less mt-4">
                                Detailed Review
                            </button>
                        </a>
                    </div>
                </div>
            @endif


            <div class="row">
                @foreach($hotDeals as $hotDeal)
                    <div class="col-12 col-md-3">
                        <div class="card quad-rounded mt-5 shadow-sm">
                            <h4 class="card-title font-weight-bold text-center m-0 py-4 px-4 text-truncate">
                                {{$hotDeal->name}}
                            </h4>

                            <img
                                src="{{$hotDeal->img_url}}"
                                style="object-fit: cover; height: 12rem"
                                class="card-img-top"
                                alt="mercedes"
                            >

                            <div class="card-body">
                                <div class="card-text d-flex justify-content-between">
                                    <p>Starting Price</p>
                                    <p class="font-weight-bold">$ {{$hotDeal->price_usd}}</p>
                                </div>
                                <div class="card-text d-flex justify-content-between">
                                    <p>distance</p>
                                    <p class="font-weight-bold">{{$hotDeal->distance}} კმ</p>
                                </div>
                                <a href="{{route('carDetailedView', ['id' => $hotDeal->id])}}"
                                   class="card-link text-white">
                                    <button class="btn btn-primary d-block quad-rounded-less mt-4">
                                        Detailed Review
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
