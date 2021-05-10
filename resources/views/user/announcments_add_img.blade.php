<!--suppress HtmlFormInputWithoutLabel -->
@extends('layouts.profile')

@section('profile_content')
    <h1 class="text-center">{{__('დაამატეთ მანქანის სურათები')}}</h1>

    {{$detailID}}

    {{-- price, engine, year --}}
    <div class="row mt-5">
        <div class="col-12">
            <div class="custom-file ">
                <label class="custom-file-label" for="customFile">{{__('აირჩიეთ სურათები')}}</label>
                <input type="file" class="custom-file-input" id="customFile" multiple>
            </div>
        </div>
    </div>

    <div class="alert alert-danger mt-4 mb-0" role="alert">
        {{__('მაქსიმუმ 12 სურათი !')}}
    </div>



    <div class="images row"></div>

    <div class="progress mt-4 d-none">
        <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
    </div>

    {{-- Submit, clear all --}}
    <div class="row mt-4">
        {{-- submit --}}
        <div class="col-6">
            <button
                class="btn btn-success text-light upload-btn"
                type="button"
            >
                {{__('დაამატე')}}
            </button>

            <a href="{{request()->url()}}">
                <button class="btn btn-danger text-light ml-2">
                    {{__('გაასუფთავე')}}
                </button>
            </a>
        </div>
    </div>
@endsection

<script>
    const redirect = () => window.location.replace('{{route('announcements.index')}}');

    window.addEventListener('load', () => {
        const images = setUploadedImages();
        document.querySelector('.upload-btn').addEventListener('click', async () => {
            if (!images.length) return;

            document.querySelector('.upload-btn').disabled = true;

            // upload to firebase
            let progress = 0;
            const newImages = await uploadImagesToFirebase(images, '{{$detailID}}', () => {
                // progress bar
                progress += 100 / images.length;
                const bar = document.querySelector('.progress-bar');
                const progressBar = document.querySelector('.progress');
                progressBar.classList.remove('d-none');
                bar.style.width = `${progress}%`
                bar.setAttribute('aria-volume', progress);
            });

            // upload to db

            await uploadImagesToDb(newImages, '{{route('announcement.store.images')}}', '{{$detailID}}', '{{$carID}}');

            // redirect
            redirect();
        })
    })
</script>
