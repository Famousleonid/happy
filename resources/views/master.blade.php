<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="public/img/icons/favicon2.png"/>
    <title>HappyNat</title>
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/fontawesome.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{'css/main.css'}}">

</head>
<body class="antialiased">

<div class="picwrap">
    <header class="navbar navbar-dark bg-primary fixed-top row">
        <div class="container ">
            <div class="col text-start">
                <a class="navbar-brand d-flex align-items-center" href="{{route('home')}}">
                    <img src="{{asset('img/home.png')}}" alt="">
                    &nbsp;&nbsp; <h5>HappyNat</h5>
                </a>
            </div>
            <div class="col text-center text-white">
                <h5>Category</h5>
            </div>
            <div class="col text-right mx-auto">
                <a class="" href="{{route('admin.index')}}">
                    <img src="{{asset('img/set.png')}}" alt="" width="30px">
                </a>
                <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#mobileMenu" aria-controls="mobileMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>

    </header>

    <!-- Sidebar Menu -->
    <div class="d-flex flex-column flex-shrink-0 p-2 bg-light position-fixed vh-100 shadow " id="desktopMenu"
         style="width: 250px;">
        <ul class="nav nav-pills flex-column mb-auto">
            @foreach($main_categories as $category)
                <li class="nav-item"><a class="nav-link" href="{{route('card.show',['card' => $category->id] )}}">{{$category->name}}</a>
            @endforeach
        </ul>

        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item"><a class="nav-link" href="#">Archive</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Shipping</a></li>
        </ul>
    </div>

    <!-- for mobile -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav nav-pills flex-column mb-auto">
            @foreach($main_categories as $category)
                <li class="nav-item"><a class="nav-link" href="{{route('card.show',['card' => $category->id] )}}">{{$category->name}}</a></li>
            @endforeach
            </ul>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item"><a class="nav-link" href="#">Archive</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Shipping</a></li>
            </ul>
        </div>
    </div>
    @yield('content')
    <!-- Main Content -->

</div>
<footer class="bg-primary text-white text-center py-1 fixed-bottom w-100">
    <div class="row ">
        <div class="col-md-2 col-12 p-1"><img src="{{asset('img/icons/F.png')}}" alt="" width="30">&nbsp;&nbsp;Nataliya
            Steblyk
        </div>
        <div class="col-md-3 col-12 p-1"><img src="{{asset('img/icons/mail.png')}}" alt="" width="30">&nbsp;&nbsp;nataliya@gmail.com
        </div>
        <div class="col-md-6 col-12 p-1"><img src="{{asset('img/icons/location.png')}}" alt="" width="30">&nbsp;&nbsp;Toronto,
            South-east Etobicoke near The Queensway and ParkLawn Rd M8Y4E3
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>


    document.querySelectorAll('.nav-link').forEach(function (link) {
        link.addEventListener('click', function (event) {
            event.preventDefault();


            document.getElementById('mainblock').style.display = 'block';
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        var mobileMenuLinks = document.querySelectorAll('#mobileMenu .nav-link');

        mobileMenuLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                var mobileMenu = document.getElementById('mobileMenu');
                var offcanvas = bootstrap.Offcanvas.getInstance(mobileMenu);
                offcanvas.hide();
            });
        });
    });


</script>


</body>
</html>
