@extends('layouts.app')

@section('content')
    <style>
        body {
            background-color: rgba(0, 0, 0, 0.1);
        }


        .list-group-item:hover:not(.list-group-item:first-child) {
            background-color: rgba(0, 0, 0, 0.3);
            color: white;
            box-shadow: 0 0 0 3px white;
            border-radius: 5px;
            font-weight: bold;
        }

        .logout-link:hover a {
            color: white !important;
        }

        .list-group-item:active:not(.list-group-item:first-child) {
            background-color: rgba(0, 0, 0, 0.6);
        }
    </style>
    <div class="row m-0 p-3 p-md-0 d-flex justify-content-center">
        <div class="col-12 col-md-8">
            <div class="row">
                <div class="col-3">
                    <div class="bg-light quad-rounded-less shadow">
                        <ul class="list-group quad-rounded-less pointer">
                            <li class="list-group-item border-0">
                                <div class="d-flex">
                                    <div class="d-flex align-items-center">
                                        <svg class="bi bi-person-circle text-info"
                                             xmlns="http://www.w3.org/2000/svg"
                                             width="40"
                                             height="40"
                                             fill="currentColor"
                                             viewBox="0 0 16 16"
                                        >
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                            <path fill-rule="evenodd"
                                                  d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                        </svg>
                                    </div>

                                    <div class="pl-3">
                                        <h5 class="card-title m-0 h3">
                                            {{ucfirst($user->name)}}
                                        </h5>

                                        <p class="m-0 pt-2">
                                            ID {{$user->id}}
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item border-0">{{__('ჩემი განცხადებები')}}</li>
                            <li class="list-group-item border-0">{{__('შენახული მანქანები')}}</li>
                            <li class="list-group-item border-0">{{__('ფეივორიტები')}}</li>
                            <li class="list-group-item border-0">{{__('ჩემი წერილები')}}</li>
                            <li class="list-group-item border-0">{{__('ბალანსის შევსება')}}</li>
                            <li class="list-group-item border-0 d-flex align-items-center logout-link">
                                <a
                                    class="text-decoration-none text-dark"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                >
                                    {{ __('გამოსვლა') }}
                                </a>

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="22"
                                    height="22"
                                    fill="currentColor"
                                    class="bi bi-box-arrow-left ml-3"
                                    viewBox="0 0 16 16"
                                >
                                    <path fill-rule="evenodd"
                                          d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                                    <path fill-rule="evenodd"
                                          d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                                </svg>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-9 bg-light quad-rounded-less shadow">
                    <h1>aoskd</h1>
                </div>
            </div>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
@endsection
