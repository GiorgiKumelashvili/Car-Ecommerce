<!--suppress HtmlFormInputWithoutLabel -->
@extends('layouts.app')

<style>
    .img-res {
        height: 12rem;
    }

    @media only screen and (max-width: 732px) and (min-width: 430px) {
        .img-res {
            height: 18rem;
        }
    }

    option:first-child {
        display: none;
    }
</style>

@section('content')
    <div class="row m-0 p-3 p-md-0 d-flex justify-content-center">
        <div class="col-12 col-xl-10">
            <div class="pt-5">
                <form action="" method="GET">
                    <div class="form-row">
                        {{-- Prices --}}
                        <div class="col-md-3 mb-3">
                            <input
                                type="text"
                                name="price_from"
                                value="{{old('price_from')}}"
                                class="form-control border quad-rounded-less {{ old('price_from') ? "border-primary text-primary" : "" }}"
                                id="price_from"
                                placeholder="ფასი - დან"
                            >
                        </div>
                        <div class="col-md-3 mb-3">
                            <input
                                type="text"
                                name="price_to"
                                value="{{old('price_to')}}"
                                class="form-control border quad-rounded-less {{ old('price_to') ? "border-primary text-primary" : "" }}"
                                id="price_to"
                                placeholder="ფასი - მდე"
                            >
                        </div>

                        {{-- wheel --}}
                        <div class="col-md-2 mb-3">
                            <select
                                class="custom-select border quad-rounded-less {{ old('wheel_side') ? "border-primary text-primary" : "" }}"
                                name="wheel_side"
                                id="wheel_side"
                            >
                                <option selected disabled>საჭე</option>
                                @foreach(config('carDetails.wheel_side') as $value)

                                    <option
                                        value="{{$value}}" {{ old('wheel_side') === $value ? "selected" : "" }}>
                                        {{$value}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- levied --}}
                        <div class="col-md-2 mb-3">
                            <select
                                class="custom-select border quad-rounded-less {{ old('levied') ? "border-primary text-primary" : "" }}"
                                name="levied"
                                id="levied"
                            >
                                <option selected disabled>განბაჟება</option>

                                @foreach(config('carDetails.levied') as $value)
                                    <option value="{{$value}}" {{ old('levied') === (string)$value ? "selected" : "" }}>
                                        @if($value == 'true')
                                            განბაჟებული
                                        @else
                                            განუბაჟებული
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- gearbox --}}
                        <div class="col-md-2 mb-3">
                            <select
                                class="custom-select border quad-rounded-less {{ old('gearbox') ? "border-primary text-primary" : "" }}"
                                name="gearbox"
                                id="gearbox"
                            >
                                <option selected disabled>გადაცემათა კოლოფი</option>
                                @foreach(config('carDetails.gearbox') as $value)
                                    <option value="{{$value}}" {{ old('gearbox') === $value ? "selected" : "" }}>
                                        {{$value}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        {{-- engine capacity --}}
                        <div class="col-md-3 mb-3">
                            <input
                                type="text"
                                name="engine_from"
                                value="{{old('engine_from')}}"
                                class="form-control border quad-rounded-less {{ old('engine_from') ? "border-primary text-primary" : "" }}"
                                id="engine_from"
                                placeholder="ძრავი - დან"
                            >
                        </div>
                        <div class="col-md-3 mb-3">
                            <input
                                type="text"
                                name="engine_to"
                                value="{{old('engine_to')}}"
                                class="form-control border quad-rounded-less {{ old('engine_to') ? "border-primary text-primary" : "" }}"
                                id="engine_to"
                                placeholder="ძრავი - მდე"
                            >
                        </div>

                        {{-- fuel type --}}
                        <div class="col-md-2 mb-3">
                            <select
                                class="custom-select border quad-rounded-less {{ old('fuel_type') ? "border-primary text-primary" : "" }}"
                                name="fuel_type"
                                id="fuel_type"
                            >
                                <option selected disabled>საწვავის ტიპი</option>
                                @foreach(config('carDetails.fuel_type') as $value)
                                    <option value="{{$value}}" {{ old('fuel_type') === $value ? "selected" : "" }}>
                                        {{$value}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- city --}}
                        <div class="col-md-4 mb-3">
                            <select
                                class="custom-select border quad-rounded-less {{ old('city_location') ? "border-primary text-primary" : "" }}"
                                name="city_location"
                                id="city_location"
                            >
                                <option selected disabled>ქალაქი</option>
                                @foreach(config('carDetails.city_location') as $value)
                                    <option value="{{$value}}" {{ old('city_location') === $value ? "selected" : "" }}>
                                        {{$value}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        {{-- Year --}}
                        <div class="col-md-3 mb-3">
                            <input
                                type="text"
                                name="year_from"
                                value="{{old('year_from')}}"
                                class="form-control border quad-rounded-less {{ old('year_from') ? "border-primary text-primary" : "" }}"
                                id="year_from"
                                placeholder="წელი - დან"
                            >
                        </div>
                        <div class="col-md-3 mb-3">
                            <input
                                type="text"
                                name="year_to"
                                value="{{old('year_to')}}"
                                class="form-control border quad-rounded-less {{ old('year_to') ? "border-primary text-primary" : "" }}"
                                id="year_to"
                                placeholder="წელი - მდე"
                            >
                        </div>

                        {{-- manufacturer --}}
                        <div class="col-md-2 mb-3">
                            <select
                                class="custom-select border quad-rounded-less {{ old('manufacturer') ? "border-primary text-primary" : "" }}"
                                id="validationDefault04"
                                name="manufacturer"
                            >
                                <option selected disabled>მწარმოებელი</option>
                                @foreach(config('carDetails.manufacturer') as $value)
                                    <option value="{{$value}}" {{ old('manufacturer') === $value ? "selected" : "" }}>
                                        {{$value}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- category --}}
                        <div class="col-md-4 mb-3">
                            <select
                                class="custom-select border quad-rounded-less {{ old('category') ? "border-primary text-primary" : "" }}"
                                id="validationDefault04"
                                name="category"
                            >
                                <option selected disabled>კატეგორია</option>
                                @foreach(config('carDetails.category') as $value)
                                    <option value="{{$value}}" {{ old('category') === $value ? "selected" : "" }}>
                                        {{$value}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-row">
                        {{-- seach vin code --}}
                        <div class="col-md-3 mb-3">
                            <input
                                type="text"
                                id="search"
                                class="form-control border quad-rounded-less"
                                name="vin_code"
                                placeholder="ჩაწერეთ VIN კოდი"
                            />
                        </div>

                        {{-- submit --}}
                        <div class="col-md-3 mb-3">
                            <button class="btn btn-info text-light" type="submit">
                                მოძებნე
                            </button>

                            <a href="{{request()->url()}}">
                                <button class="btn btn-danger text-light" type="button">
                                    გაასუფთავე
                                </button>
                            </a>
                        </div>
                    </div>
                </form>

                {{-- Car catalogue list --}}
                <div class="row">
                    @foreach ($cars as $car)
                        <div class="col-12 col-md-4 col-xl-3">
                            <div class="card quad-rounded mt-5 shadow-sm" style="max-height: 30rem">
                                <h4 class="card-title font-weight-bold text-center m-0 py-4 px-4 text-truncate">
                                    {{$car->name}}
                                </h4>

                                <img
                                    src="{{$car->img_url}}"
                                    style="object-fit: cover;"
                                    class="card-img-top img-res"
                                    alt="mercedes"
                                >

                                <div class="card-body">
                                    <div class="card-text d-flex justify-content-between">
                                        <p>{{ __('ფასი') }}</p>
                                        <p class="font-weight-bold">$ {{$car->price_usd}}</p>
                                    </div>
                                    <div class="card-text d-flex justify-content-between">
                                        <p>{{ __('გავლილი მანძილი') }}</p>
                                        <p class="font-weight-bold">{{$car->distance}} კმ</p>
                                    </div>

                                    <a href="{{route('carDetailedView', ['id' => $car->id])}}"
                                       class="card-link text-white">
                                        <button class="btn btn-primary d-block quad-rounded-less mt-4 ml-auto">
                                            {{ __('დეტალურად ნახვა') }}
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-5 d-flex justify-content-center">
                    {{$cars}}
                </div>
            </div>
        </div>
    </div>
@endsection
