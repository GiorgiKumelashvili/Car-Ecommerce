@extends('layouts.profile')

@section('profile_content')
    <h1 class="text-center">{{__('პროფილის რედაქტირება')}}</h1>

    <div class="p-5">
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')

            <div class="form-group pt-4">
                <label for="name">
                    {{__('სახელი')}}
                </label>

                <input id="name"
                       type="text"
                       name="name"
                       value="{{ $user->name }}"
                       class="form-control border quad-rounded-less rounded-pill {{$errors->has('name') ? "border-danger" : ""}}"
                >

                @error('name')
                <div class="text-danger pl-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group py-2">
                <label for="email">
                    {{__('ელ-ფოსტა')}}
                </label>

                <input
                    id="email"
                    type="text"
                    name="email"
                    value="{{ $user->email }}"
                    class="form-control border quad-rounded-less rounded-pill {{$errors->has('email') ? "border-danger" : ""}}"
                >

                @error('email')
                <div class="text-danger pl-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="m-0 pt-3">
                <button type="submit" class="btn btn-primary rounded-pill px-5">
                    {{ __('განახლება') }}
                </button>
            </div>
        </form>
    </div>
@endsection
