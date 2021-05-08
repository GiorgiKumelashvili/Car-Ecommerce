@extends('layouts.app')

@section('content')
    <div class="px-high">
        {{-- Head div--}}
        <div class="card bg-dark text-white custom-rounder-img custom-bg-img">
            <div class="card-img-overlay custom-rounder-img p-middle">
                <h5 class="card-title font-weight-bold h1">
                    {{ __('აღმოაჩინეთ') }} <br/>
                    {{ __('საუკეთესო გარიგებები თქვენთვის') }}
                </h5>
                <p class="card-text h5 text-secondary pt-4 white-7">
                    {{ __('დაათვალიერეთ ჩვენი მანქანების კოლექცია') }}
                    <br/>
                    {{ __('იპოვეთ თქვენთვის სასურველი მანქანა,') }}
                    <br/>
                    {{ __('რომელიც ყველაზე მეტად შეესაბამება თქვენს საჭიროებებსა') }}
                    <br/>
                    {{ __('და ბიუჯეტს') }}
                </p>
            </div>
        </div>

        <div class="pt-5">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="display-4">
                    {{ __('ცხელი შეთავაზებები') }}
                </h1>
            </div>

            <h5 class="text-black-50 pt-2 mb-5">
                {{ __('გაეცანით მანქანებს, შეარჩიეთ ყველაზე საუკეთესო !') }}
            </h5>

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
                                    <p>{{ __('ფასი') }}</p>
                                    <p class="font-weight-bold">$ {{$hotDeal->price_usd}}</p>
                                </div>
                                <div class="card-text d-flex justify-content-between">
                                    <p>{{ __('გავლილი მანძილი') }}</p>
                                    <p class="font-weight-bold">{{$hotDeal->distance}} კმ</p>
                                </div>
                                <a href="{{route('carDetailedView', ['id' => $hotDeal->id])}}"
                                   class="card-link text-white">
                                    <button class="btn btn-primary d-block quad-rounded-less mt-4">
                                        {{ __('დეტალურად ნახვა') }}
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
