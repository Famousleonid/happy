<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{asset('public/img/icons/favicon2.png')}}" type="image/png">
    <title>Admin happy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.css')}}">


    @yield('links')

    <style>
        .firm-border {
            border-top: 5px solid #F8C50E;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini  layout-fixed ">

<div class="">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light shadow">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" data-enable-remember="true" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        @yield('add-menu')

        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-bell"></i>
                </a>
            </li>

            <li class="nav-item d-none d-sm-inline-block">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                document.getElementById('logout-form-admin').submit();">Logout</a>
                <form id="logout-form-admin" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>

        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ url('/') }}" target="_blank" class="brand-link">
            <span class="brand-text "> HappyNat <span style="color: yellow">(Admin)</span></span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item ">
                        <a href="{{route('product.index')}}" class="nav-link">
                            <i class="nav-icon fa-solid fa-sitemap"></i>
                            <p>Product</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('category.index')}}" class="nav-link">
                            <i class="nav-icon fa-solid fa-layer-group"></i>
                            <p>Categories</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('home')}}" class="nav-link">
                            <i class="nav-icon fa-solid fa-sitemap"></i>
                            <p>Back to website</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form-menu').submit();">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </a>
                        <form id="logout-form-menu" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>

                        </div>
                    @endif
                    @if(session()->has('success'))
                        <div class="alert alert-success text-white">
                            {{session('success')}}
                            <button type="button" class="close test-white" data-dismiss="alert" aria-label="Close">
                                <span class="text-bold ">X</span>
                            </button>
                        </div>
                    @endif
                    @if(session()->has('info'))
                        <div class="alert alert-info">
                            {{session('info')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{session('error')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @yield('content')

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/adminlte.min.js')}}"></script>
<script src="https://cdn.datatables.net/v/bs4/dt-1.13.8/af-2.6.0/cr-1.7.0/fh-3.4.0/rr-1.4.1/sp-2.2.0/datatables.min.js"></script>
<script src="https://kit.fontawesome.com/49f401fbd8.js" crossorigin="anonymous"></script>


@yield('scripts')


<script>

    $('.nav-sidebar a').each(function () {

        let location = window.location.protocol + '//' + window.location.host + window.location.pathname;
        let link = this.href;

        console.log("location = ", location)
        console.log('link = ', link)

        if (link === location) {
            $(this).addClass('active');
            $(this).closest('.has-treeview').addClass('menu-open');
        }
    });

</script>

</body>
</html>















