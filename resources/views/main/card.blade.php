@extends('master')

@section('content')

    <style>
        .price {
            font-weight: bold;
            font-size: 1.2em;
            margin-left: 10px;
            padding: 0;
        }
        .old-price {
            color: gray;
            text-decoration: line-through;
            margin-left: 10px;
            padding: 0;
        }
        .card-location {
            text-align: left;
            margin-left: 10px;
            padding: 0;
        }
        .card-img {
            width: 100%;
            height: 210px; /* Задайте высоту по вашему усмотрению */
            position: relative;
        }
        .pic-image{
            width: 100%;
            height: 100%;
            object-fit: cover; /* Изображение заполнит контейнер, сохраняя пропорции */
            display: block; /* Убирает возможные отступы вокруг изображения */
        }
    </style>

    @include('components.side-menu')

    <div class="container-fluid main-card">
        <div class="row">
            <div class="col-md-9 offset-md-2">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4 mt-1 p-1">

                    @foreach ($filter_cards as $card)

                        <div class="col base-card">
                            <div class="card h-100 product-card shadow ">
                                <div class="card-img ml-auto mb-1">
                                        @if ($card->getMedia('photos')->first())
                                            <a href="{{route('bigshow',['id'=>$card->id])}}">
                                                <img class="pic-image" src="{{ $card->getMedia('photos')->first()->getUrl() }}"  alt="Image">
                                            </a>
                                        @else
                                            <img  src="{{asset('img/noimage2.png')}}" width="200" height="200" alt="Image">
                                        @endif
                                </div>
                                <div class="card-footer p-1">
                                    <p style="margin-bottom: 0; text-align: left; ">
                                        <span class="price">{{$card->price}} CA$</span>
                                        &nbsp;&nbsp;
                                        @if($card->old_price)
                                            <span class="old-price">{{$card->old_price}} CA$</span>
                                        @endif
                                    </p>
                                    <h5 style="margin-bottom: 0; text-align: left; margin-left: 10px">{{$card->name}}</h5>
                                    <p class="card-location mb-0">{{$card->location}}</p>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            document.getElementById("show_category").innerText = @json($name_category->name);


        });
    </script>
@endsection
