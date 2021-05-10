<!--suppress HtmlFormInputWithoutLabel -->
@extends('layouts.profile')

<style>
    option:first-child {
        display: none;
    }
</style>

@section('profile_content')
    <h1 class="text-center">{{__('დაამატეთ მანქანის დეტალები')}}</h1>

    <form action="{{route('announcement.store')}}" method="POST" class="m-0">
        @csrf

        {{-- price, engine, year --}}
        <div class="row mt-5">
            <div class="col-4">
                <input
                    type="text"
                    name="price"
                    value="{{old('price')}}"
                    class="form-control border quad-rounded-less {{$errors->has('price') ? "border-danger" : ""}}"
                    id="price"
                    placeholder="ფასი"
                >
                @error('price')
                <div class="text-danger pl-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-4">
                <input
                    type="text"
                    name="engine"
                    value="{{old('engine')}}"
                    class="form-control border quad-rounded-less {{$errors->has('engine') ? "border-danger" : ""}}"
                    id="engine"
                    placeholder="ძრავი"
                >

                @error('engine')
                <div class="text-danger pl-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-4">
                <input
                    type="text"
                    name="year"
                    value="{{old('year')}}"
                    class="form-control border quad-rounded-less {{$errors->has('year') ? "border-danger" : ""}}"
                    id="year"
                    placeholder="წელი"
                >

                @error('year')
                <div class="text-danger pl-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        {{-- manufacturer, category, levied --}}
        <div class="row mt-4">
            <div class="col-4">
                <select
                    class="custom-select border quad-rounded-less {{$errors->has('manufacturer') ? "border-danger" : ""}}"
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

                @error('manufacturer')
                <div class="text-danger pl-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-4">
                <select
                    class="custom-select border quad-rounded-less {{$errors->has('category') ? "border-danger" : ""}}"
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

                @error('category')
                <div class="text-danger pl-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-4">
                <select
                    class="custom-select border quad-rounded-less {{$errors->has('levied') ? "border-danger" : ""}}"
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

                @error('levied')
                <div class="text-danger pl-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        {{-- wheel, gearbox, color --}}
        <div class="row mt-4">
            <div class="col-4">
                <select
                    class="custom-select border quad-rounded-less {{$errors->has('wheel_side') ? "border-danger" : ""}}"
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

                @error('wheel_side')
                <div class="text-danger pl-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-4">
                <select
                    class="custom-select border quad-rounded-less {{$errors->has('gearbox') ? "border-danger" : ""}}"
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

                @error('gearbox')
                <div class="text-danger pl-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-4">
                <select
                    class="custom-select border quad-rounded-less {{$errors->has('color') ? "border-danger" : ""}}"
                    name="color"
                    id="color"
                >
                    <option selected disabled>ფერი</option>
                    @foreach(config('carDetails.color') as $value)

                        <option
                            value="{{$value}}" {{ old('color') === $value ? "selected" : "" }}>
                            {{$value}}
                        </option>
                    @endforeach
                </select>

                @error('color')
                <div class="text-danger pl-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        {{-- fuel type, city --}}
        <div class="row mt-4">
            <div class="col-4">
                <select
                    class="custom-select border quad-rounded-less {{$errors->has('fuel_type') ? "border-danger" : ""}}"
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

                @error('fuel_type')
                <div class="text-danger pl-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-4">
                <select
                    class="custom-select border quad-rounded-less {{$errors->has('city_location') ? "border-danger" : ""}}"
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

                @error('city_location')
                <div class="text-danger pl-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-4">
                <select
                    class="custom-select border quad-rounded-less {{$errors->has('cylinders') ? "border-danger" : ""}}"
                    name="cylinders"
                    id="cylinders"
                >
                    <option selected disabled>ცილინდრები</option>
                    @for($i=1; $i <= 10; $i++)
                        <option value="{{$i}}" {{ old('cylinders') == $i ? "selected" : "" }}>
                            {{$i}}
                        </option>
                    @endfor
                </select>

                @error('cylinders')
                <div class="text-danger pl-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        {{-- model, city, vin code --}}
        <div class="row mt-4">
            <div class="col-4">
                <input
                    type="text"
                    id="model"
                    value="{{old('model')}}"
                    class="form-control border quad-rounded-less {{$errors->has('model') ? "border-danger" : ""}}"
                    name="model"
                    placeholder="მოდელი"
                />

                @error('model')
                <div class="text-danger pl-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-4">
                <input
                    type="text"
                    id="distance"
                    value="{{old('distance')}}"
                    class="form-control border quad-rounded-less {{$errors->has('distance') ? "border-danger" : ""}}"
                    name="distance"
                    placeholder="გარბენი"
                />

                @error('distance')
                <div class="text-danger pl-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-4">
                <input
                    type="text"
                    id="search"
                    value="{{old('vin_code')}}"
                    class="form-control border quad-rounded-less {{$errors->has('vin_code') ? "border-danger" : ""}}"
                    name="vin_code"
                    placeholder="ჩაწერეთ VIN კოდი"
                />

                @error('vin_code')
                <div class="text-danger pl-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        {{-- description --}}
        <div class="row mt-4">
            <div class="col">
                <textarea
                    id="description"
                    class="form-control border quad-rounded-less"
                    name="description"
                    rows="4"
                    placeholder="დამატებითი ინფორმაცია..."
                ></textarea>

                @error('description')
                <div class="text-danger pl-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        {{-- Submit, clear all --}}
        <div class="row mt-4">
            {{-- submit --}}
            <div class="col-6">
                <button class="btn btn-success text-light" type="submit">
                    {{__('დაამატე')}}
                </button>

                <a href="{{request()->url()}}">
                    <button class="btn btn-danger text-light ml-2" type="button">
                        {{__('გაასუფთავე')}}
                    </button>
                </a>
            </div>
        </div>
    </form>
@endsection
