@extends('master')

@section('content')

    @include('components.side-menu')

    <div class="container-fluid main-card">

        <div class="row">
            <div class="col-md-9 offset-md-3">

                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4 mt-3 p-3">
                    @foreach ($filter_cards as $card)
                        <div class="col">
                            <div class="card h-100 product-card shadow">
                                <div class="card-img ml-auto">
                                    <p>{{$card->name}}</p>
                                   {{-- <img src="{{asset('img/pro.webp')}}" class="card-img-top prod " alt="Product Image" >--}}
                                </div>
                                <div class="card-footer">
                                    <h5 class="card-title">Товар </h5>
                                    <p class="card-text">Описание товара.</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("show_category").innerText = @json($name_category->name);;
        });
    </script>
@endsection
