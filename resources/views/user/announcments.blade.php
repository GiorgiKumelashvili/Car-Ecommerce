<!--suppress HtmlFormInputWithoutLabel -->
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

                    {{--                    <img--}}
                    {{--                        src="{{$car->img_url}}"--}}
                    {{--                        style="object-fit: cover;"--}}
                    {{--                        class="card-img-top img-res"--}}
                    {{--                        alt="mercedes"--}}
                    {{--                    >--}}

                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between">
                            <p>ID</p>
                            <p class="font-weight-bold">{{$car->id}}</p>
                        </div>
                        <div class="card-text d-flex justify-content-between">
                            <p>{{ __('ფასი') }}</p>
                            <p class="font-weight-bold">$ {{$car->price_usd}}</p>
                        </div>
                        <div class="card-text d-flex justify-content-between">
                            <p>{{ __('გავლილი მანძილი') }}</p>
                            <p class="font-weight-bold">{{$car->distance}} კმ</p>
                        </div>

                        <div class="mt-4 d-flex justify-content-end">
                            <span class="badge badge-danger text-white p-2 mr-2 pointer deleteModalCardBtn"
                                  data-toggle="modal"
                                  data-target="#deleteCarModal"
                            >
                                <p class="text-hide m-0">{{$car->id}}</p>
                                {{ __('წაშლა') }}
                            </span>


                            <a class="badge badge-primary text-white p-2"
                               href="{{route('carDetailedView', ['id' => $car->id])}}"
                            >
                                {{ __('დეტალურად ნახვა') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteCarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body h5 border-0">
                    {{__('დარწმუნებული ხართ რომ ამ მანქანის წაშლა გსურთ')}}
                </div>

                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                        {{__('ჩაკეცვა')}}
                    </button>

                    <form action="{{route('announcementDelete')}}" method="POST">
                        <input type="text" name="id" value="" id="deleteIdInput" class="text-hide">

                        <button type="submit" class="btn btn-danger">
                            {{__('დიახ')}}
                        </button>

                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Pagination --}}
    <div class="mt-5 d-flex justify-content-center">
        {{$cars}}
    </div>

    <script>
        document.querySelectorAll('.deleteModalCardBtn').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = btn.children[0].textContent;
                document.getElementById('deleteIdInput').value = id;
                console.dir(id)
            });
        });
    </script>
@endsection
