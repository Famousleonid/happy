@extends('master')

@section('content')

    <style>
        .cloud-background {
            background: rgba(0, 0, 0, 0.5);
            border-radius: 5%;
            box-shadow: 10px 10px 30px rgba(0, 0, 0.3, 0.3); /* Размытие по краям */
            backdrop-filter: blur(10px); /* Эффект размытия внутри */
            padding: 20px;
            text-align: center;

        }

    </style>


    @include('components.side-menu')

    <div class="container custom-background min-vh-100 p-3 offset-md-2">

        <div class="row">
            <div class="col-md-6">
                <div id="main-image-container" class="text-center mb-3" style="height: 60vh; overflow: hidden;">
                    <img id="main-image" src="{{ $images->first()->getUrl() }}" alt="Main Image" style="height: 100%; width: 100%; object-fit: cover;">
                </div>

                <div class="d-flex align-items-center">
                    <button class="btn btn-outline-secondary" id="scroll-left" style="height: 50px;">&lt;</button>
                    <div id="thumbnail-container" class="d-flex overflow-auto" style="width: calc(100% - 50px); white-space: nowrap;">
                        @foreach($images as $image)
                            <div class="thumbnail m-2" style="width: 50px; height: 50px; flex-shrink: 0; overflow: hidden;">
                                <img src="{{ $image->getUrl() }}" class="img-thumbnail" alt="Thumbnail" data-full-image="{{ $image->getUrl() }}" style="width: 100%; height: 100%; object-fit: cover; cursor: pointer;">
                            </div>
                        @endforeach
                    </div>
                    <button class="btn btn-outline-secondary" id="scroll-right" style="height: 50px;">&gt;</button>
                </div>
            </div>


            <div class="col-12 col-md-4 offset-md-1 mt-2 ">

                <div id="main-image-container" class="text-center mb-3 mt-1 text-white cloud-background " style="height: 60vh; overflow: hidden; ">
                    <h2 class="text-decoration-underline">{{ $product->name }}</h2>
                    @if($product->description)
                        <p class="" style="height: 90%; overflow-y: auto;">{!! nl2br($product->description) !!}</p>
                    @endif
                </div>

                <div class="d-flex justify-content-center align-items-center w-100 mt-1" style="height: 70px;">
                    <a href="{{url()->previous()}}" class="btn btn-primary px-4">Back to list </a>
                </div>
            </div>
        </div>

    </div>


    <script>

        const img = new Image();
        img.src = '../public/img/h2_blurred.jpeg';

        img.onload = function () {
            document.body.style.backgroundImage = 'url(' + img.src + ')';
            document.body.style.display = 'block'; // Показываем body после загрузки фона
        };

        document.addEventListener('DOMContentLoaded', function () {
            const thumbnails = document.querySelectorAll('.thumbnail img');
            const mainImage = document.getElementById('main-image');
            const thumbnailContainer = document.getElementById('thumbnail-container');

            // Обработка клика по миниатюрам
            thumbnails.forEach(thumb => {
                thumb.addEventListener('click', function () {
                    mainImage.src = this.dataset.fullImage;
                });
            });

            // Прокрутка влево
            document.getElementById('scroll-left').addEventListener('click', function () {
                thumbnailContainer.scrollBy({
                    left: -200,
                    behavior: 'smooth'
                });
            });

            // Прокрутка вправо
            document.getElementById('scroll-right').addEventListener('click', function () {
                thumbnailContainer.scrollBy({
                    left: 200,
                    behavior: 'smooth'
                });
            });
        });
    </script>

@endsection
