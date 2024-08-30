@extends('master')
@section('sidebar')


    <!-- Sidebar Menu -->
    <div class="d-flex flex-column flex-shrink-0 p-2 bg-light position-fixed vh-100 shadow " id="desktopMenu"
         style="width: 250px;">
        <ul class="nav nav-pills flex-column mb-auto">
            @foreach($categories as $category)

                <li class="nav-item"><a class="nav-link " href="#">{{$category->name}}</a>

            @endforeach
        </ul>

        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item"><a class="nav-link" href="#">Archive</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Shipping</a></li>
        </ul>
    </div>


@endsection
@section('content')

    <main class="container-fluid mt-3" style="margin-left: 270px;">
        <div class="row">
            <div class="col-md-9" id="mainblock" style="display: none">

                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4 ">
                    @for ($i = 0; $i < 20; $i++)
                        <div class="col">
                            <div class="card h-100 product-card shadow">
                                <div class="card-img ml-auto">
                                    <img src="{{asset('img/pro.webp')}}" class="card-img-top prod " alt="Product Image" >
                                </div>
                                <div class="card-footer">
                                    <h5 class="card-title">Товар {{$i + 1}}</h5>
                                    <p class="card-text">Описание товара.</p>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </main>


@endsection
