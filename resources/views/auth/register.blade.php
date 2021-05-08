@extends('layouts.app')

@section('content')
    <div class="row justify-content-center pt-5">
        <div class="card quad-rounded" style="min-width: 30rem">
            <div class="p-5">
                <div class="card-title h3 text-center">{{ __('რეგიტრაცია') }}</div>
w
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group pt-4">
                        <label for="name">
                            {{__('სახელი')}}
                        </label>

                        <input id="name"
                               type="text"
                               name="name"
                               value="{{ old('name') }}"
                               required
                               autocomplete="name"
                               autofocus
                               class="form-control @error('name') is-invalid @enderror rounded-pill"
                        >

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group py-2">
                        <label for="email">
                            {{__('ელ-ფოსტა')}}
                        </label>

                        <input
                            id="email"
                            required
                            autofocus
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            autocomplete="name"
                            class="form-control @error('name') is-invalid @enderror rounded-pill"
                        >

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group py-2">
                        <label for="password">
                            {{__('პაროლი')}}
                        </label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            class="form-control @error('password') is-invalid @enderror rounded-pill"
                        >

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group py-2">
                        <label for="password-confirm">
                            {{__('გაიმეორეთ პაროლი')}}
                        </label>

                        <input
                            id="password-confirm"
                            type="password"
                            class="form-control rounded-pill"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                        >
                    </div>

                    <div class="m-0 d-block pt-3">
                        <button type="submit" class="btn btn-primary w-100 rounded-pill">
                            {{ __('რეგისტრაცია') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
