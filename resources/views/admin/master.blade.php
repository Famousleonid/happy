<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('public/img/icons/favicon2.png')}}" type="image/png">
    <title>Admin happy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
{{--    <link href="https://unpkg.com/filepond/dist/filepond.min.css" rel="stylesheet">--}}
{{--    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css" rel="stylesheet">--}}

    <style>
        .firm-border {
            border-top: 5px solid #F8C50E;
        }

        .win {
            z-index: 120;
            position: absolute;
            top: 45%;
            left: 50%;
            /*            margin: auto;*/
        }
        .ss {border: 2px solid green}
        .bb {border: 2px solid blue}
        .rr {border: 2px solid red}
    </style>

</head>

<body class="hold-transition sidebar-mini  layout-fixed ">

{{--<div id="loading-spinner" class="loading-spinner">--}}
{{--    <div class="spinner-border text-primary" role="status">--}}
{{--        <span class="sr-only">Loading...</span>--}}
{{--    </div>--}}
{{--</div>--}}

<div id="spinner-load">
    <i style="text-align: center;" class="fa fa-spinner fa-spin text-primary fa-3x win"></i>
</div>


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
</body>
<script src="{{asset('js/jquery371min.js')}}" ></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/adminlte.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="https://kit.fontawesome.com/49f401fbd8.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>


<script>
    document.addEventListener("DOMContentLoaded", function() {

        $('.nav-sidebar a').each(function () {

            let location = window.location.protocol + '//' + window.location.host + window.location.pathname;
            let link = this.href;
            if (link === location) {
                $(this).addClass('active');
                $(this).closest('.has-treeview').addClass('menu-open');
            }
        });

        $('#confirmDelete').on('show.bs.modal', function (e) {

            let message = $(e.relatedTarget).attr('data-message');
            $(this).find('.modal-body p').text(message);
            let $title = $(e.relatedTarget).attr('data-title');
            $(this).find('.modal-title').text($title);
            let form = $(e.relatedTarget).closest('form');
            $(this).find('.modal-footer #buttonConfirm').data('form', form);
        });

        $('#confirmDelete').find('.modal-footer #buttonConfirm').on('click', function () {
            $(this).data('form').submit();
        });


        function showLoadingSpinner() {
            document.querySelector('#spinner-load').classList.remove('d-none');

        }

        function hideLoadingSpinner() {
            document.querySelector('#spinner-load').classList.add('d-none');

        }

        hideLoadingSpinner();

    });
</script>


</html>















