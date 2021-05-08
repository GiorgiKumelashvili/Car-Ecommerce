@extends('layouts.profile')

<style>
    .img-res {
        height: 20rem;
    }
</style>

@section('profile_content')
    <h1 class="text-center">{{__('განცხადებები')}}</h1>

    <div class="row">
        @foreach ($cars as $car)
            <div class="col-12 col-md-6">
                <div class="card quad-rounded-less shadow-sm mt-3" style="max-height: 35rem">
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
@endsection
