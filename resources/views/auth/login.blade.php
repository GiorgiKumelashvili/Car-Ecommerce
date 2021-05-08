<!--suppress HtmlFormInputWithoutLabel -->
@extends('layouts.app')

@section('content')
    <div class="row justify-content-center pt-5">
        <div class="card quad-rounded" style="min-width: 30rem">
            <div class="p-5">
                <div class="card-title h3 text-center">{{ __('ავტორიზაცია') }}</div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group pt-4">
                        <label for="exampleInputEmail1">
                            {{__('ელ-პოსტა')}}
                        </label>

                        <input
                            id="email"
                            required
                            autofocus
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            class="form-control @error('email') is-invalid @enderror rounded-pill"
                        >

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group py-3">
                        <label for="exampleInputEmail1">
                            {{__('პაროლი')}}
                        </label>

                        <input
                            id="password"
                            required
                            type="password"
                            name="password"
                            autocomplete="current-password"
                            class="form-control @error('password') is-invalid @enderror rounded-pill"
                        >

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="remember"
                                id="remember" {{ old('remember') ? 'checked' : '' }}
                            >

                            <label class="form-check-label" for="remember">
                                {{ __('დაიმახსოვრე') }}
                            </label>
                        </div>
                    </div>

                    <div class="form-group m-0 d-block">
                        <button type="submit" class="btn btn-primary w-100 rounded-pill">
                            {{ __('შესვლა') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
