@extends('layouts.app')

@section('content')
    <style>
        body {
            background-color: rgba(0, 0, 0, 0.1);
        }
    </style>

    <div class="row">
        <div class="col-3"></div>
        <div class="col-6 p-0">
            <div class="row mb-3">
                <div class="col-7">
                    <div
                        id="carouselExampleFade"
                        class="carousel slide carousel-fade h-100"
                        data-ride="carousel"
                    >
                        <div class="carousel-inner quad-rounded-less w-100 h-100">
                            <div class="carousel-item h-100 w-100 bg-dark active">
                                <img
                                    src="{{$car->images[0]}}"
                                    style="object-fit: cover;max-height: 590px"
                                    class="w-100 h-100"
                                    alt="{{"$car->manufacturer-$car->model-big"}}"
                                >
                            </div>
                            @for($i=1; $i < count($car->images); $i++)
                                <div class="carousel-item h-100 w-100 bg-dark">
                                    <img
                                        src="{{$car->images[$i]}}"
                                        class="d-block w-100 h-100"
                                        style="object-fit: contain"
                                        alt="{{"$car->manufacturer-$car->model-$i"}}"
                                    >
                                </div>
                            @endfor
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

                <div class="col-5">
                    <div class="bg-light p-3 quad-rounded-less">
                        <h2 class="card-title font-weight-bold m-0 pb-4 text-center">
                            {{$car->manufacturer}} {{$car->model}}
                        </h2>

                        <div class="card-text d-flex justify-content-between">
                            <p>კატეგორია</p>
                            <p class="font-weight-bold">{{$car->category}}</p>
                        </div>

                        <div class="card-text d-flex justify-content-between">
                            <p>მწარმოებელი</p>
                            <p class="font-weight-bold">{{$car->manufacturer}}</p>
                        </div>

                        <div class="card-text d-flex justify-content-between">
                            <p>მოდელი</p>
                            <p class="font-weight-bold">{{$car->model}}</p>
                        </div>

                        <div class="card-text d-flex justify-content-between">
                            <p>გამოშვების წელი</p>
                            <p class="font-weight-bold">{{$car->release_year}}</p>
                        </div>

                        <div class="card-text d-flex justify-content-between">
                            <p>საწვავის ტიპი</p>
                            <p class="font-weight-bold">{{$car->fuel_type}}</p>
                        </div>

                        <div class="card-text d-flex justify-content-between">
                            <p>ძრავის მოცულობა</p>
                            <p class="font-weight-bold">{{$car->engine_capacity}}</p>
                        </div>

                        <div class="card-text d-flex justify-content-between">
                            <p>გარბენი</p>
                            <p class="font-weight-bold">{{$car->distance}} კმ</p>
                        </div>

                        <div class="card-text d-flex justify-content-between">
                            <p>ცილინდრები</p>
                            <p class="font-weight-bold">{{$car->cylinders}}</p>
                        </div>

                        <div class="card-text d-flex justify-content-between">
                            <p>გადაცემათა კოლოფი</p>
                            <p class="font-weight-bold">{{$car->gear_box}}</p>
                        </div>

                        <div class="card-text d-flex justify-content-between">
                            <p>საჭე</p>
                            <p class="font-weight-bold">{{$car->wheel_side}}</p>
                        </div>

                        <div class="card-text d-flex justify-content-between">
                            <p>ფერი</p>
                            <p class="font-weight-bold">{{$car->color}}</p>
                        </div>

                        <div class="card-text d-flex justify-content-between">
                            <p>VIN კოდი</p>
                            <p class="font-weight-bold">{{$car->vin_code}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="row no-gutters">
                    {{-- Left side--}}
                    <div class="col-md-4 pt-3 px-3 pb-2 d-flex flex-wrap align-content-between">
                        <div class="row flex-grow-1">
                            <div class="col-8">
                                <h3 class="font-weight-bold text-primary m-0 d-flex align-items-center" id="car_price">
                                    {{$car->price_usd}} USD
                                </h3>
                            </div>

                            <div class="col-4 d-flex justify-content-end">
                                <button
                                    type="button"
                                    id="converter_btn"
                                    class="btn btn-outline-primary quad-rounded-less px-3 py-2  d-flex flex-column align-items-center"
                                    onclick="currencyConvert()"
                                    style="max-width: 4.5rem"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        fill="currentColor"
                                        class="bi bi-arrow-left-right"
                                        viewBox="0 0 16 16"
                                    >
                                        <path fill-rule="evenodd"
                                              d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z"/>
                                    </svg>

                                    convert
                                </button>
                            </div>
                        </div>

                        <script>
                            const priceId = 'car_price';
                            const key = '90a5b077b38823db30f2d37ad1e2fb91';
                            const url = `http://data.fixer.io/api/latest?access_key=${key}&format=1`;

                            function convert(ratesArr) {
                                const one_usd = ratesArr['GEL'] / ratesArr['USD']; // 1 usd = {one_usd} lari
                                const priceEl = document.getElementById(priceId);
                                const is_usd = priceEl.textContent.includes('USD');
                                const price = parseInt(priceEl.textContent);

                                // set usd or gel
                                priceEl.textContent =
                                    (is_usd ? price * one_usd : price / one_usd).toFixed(0).toString() +
                                    ' ' +
                                    (is_usd ? 'GEL' : 'USD');
                            }

                            function currencyConvert() {
                                fetch(url)
                                    .then(res => res.json())
                                    .then(({rates}) => convert(rates))
                                    .catch(err => console.log(err));
                            }
                        </script>

                        <div class="alert alert-info p-1 m-0 mt-3 flex-grow-1" role="alert">
                            <h6 class="card-title text-center m-0">
                                @if($car->is_levied)
                                    განბაჟებული
                                @else
                                    განუბაჟებული
                                @endif
                            </h6>
                        </div>
                    </div>

                    {{-- Right side--}}
                    <div class="col-md-8 pt-3 px-3 pb-2 d-flex flex-column justify-content-between">
                        <div class="row">
                            <div class="col-8 d-flex align-items-center">
                                <svg class="bi bi-person-circle"
                                     xmlns="http://www.w3.org/2000/svg"
                                     width="24"
                                     height="24"
                                     fill="currentColor"
                                     viewBox="0 0 16 16"
                                >
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd"
                                          d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>

                                <h5 class="card-title text-primary m-0 ml-2">
                                    {{ucfirst($car->name)}}
                                </h5>
                            </div>

                            <div class="col-4 card-text d-flex align-self-center justify-content-end">
                                ID {{$car->car_details_id}}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-5">
                                <div class="card-text border p-2 quad-rounded-less d-flex align-items-center"
                                     style="color: #2fa360">
                                    <svg class="bi bi-telephone-fill mr-2"
                                         xmlns="http://www.w3.org/2000/svg"
                                         width="20"
                                         height="20"
                                         fill="currentColor"
                                         viewBox="0 0 16 16"
                                    >
                                        <path fill-rule="evenodd"
                                              d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                    </svg>

                                    @if($car->number)
                                        $car->number
                                    @else
                                        არაა მითითებული
                                    @endif
                                </div>
                            </div>

                            @if($car->city)
                                <div class="col-4 pl-0">
                                    <div class="card-text border p-2 quad-rounded-less d-flex align-items-center">
                                        <svg class="bi bi-geo-alt mr-2"
                                             xmlns="http://www.w3.org/2000/svg"
                                             width="20"
                                             height="20"
                                             fill="currentColor"
                                             viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                            <path
                                                d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg>

                                        {{$car->city}}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
@endsection
