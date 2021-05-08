@extends('layouts.app')

@section('content')
    <div class="row m-0 p-3 p-md-0 d-flex justify-content-center">
        <div class="col-12 col-md-10 col-xl-6">
                {{-- Head div--}}
                <div class="d-flex justify-content-center align-items-center">
                    <h1 class="display-4 m-0">
                        {{__('კონტაქტი')}}
                    </h1>
                </div>

                <div class="row py-5">
                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                        <div
                            class="p-3 border border-primary text-primary rounded-circle d-flex justify-content-center align-items-center"
                            style="width: 80px;height: 80px">
                            <svg class="bi bi-envelope-fill" xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                 fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                            </svg>
                        </div>

                        <h4 class="m-0 pl-4 text-primary">
                            (+995) 551 19 47 73
                        </h4>
                    </div>

                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                        <div
                            class="p-3 border border-primary text-primary rounded-circle d-flex justify-content-center align-items-center"
                            style="width: 80px;height: 80px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                 class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                            </svg>
                        </div>

                        <h4 class="m-0 pl-4 text-primary">
                            giorgi.kumelashvili21@gmail.com
                        </h4>
                    </div>
                </div>

                <form method="POST" class="pt-5">
                    <h2 class="text-black-50 mb-5 text-center">
                        გამოაგზავნეთ მესიჯი
                    </h2>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="validationCustom01">
                                {{__('სახელი და გვარი')}} <p class="m-0 d-inline-block text-danger">*</p>
                            </label>

                            <input type="text" class="form-control" id="validationCustom01" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">
                                {{__('ელ-პოსტა')}} <p class="m-0 d-inline-block text-danger">*</p>
                            </label>

                            <input type="email" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp"
                                   required>
                        </div>

                        <div class="form-group col-12">
                            <label for="validationTextarea">
                                {{__('წერილი')}}
                            </label>

                            <textarea
                                class="form-control"
                                id="validationTextarea"
                                required
                            ></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        {{__('გაგზავნა')}}
                    </button>
                </form>
        </div>
    </div>
@endsection
