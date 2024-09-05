<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('img/icons/favicon2.png') }}"/>
    <title>HappyNat</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

</head>
<body>

<div class="picwrap">

    <header class="navbar navbar-dark bg-primary fixed-top ">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('img/home.png') }}" alt="Home" width="25" height="25">
                <span class="ms-2 text-light">HappyNat</span>
            </a>
            <div class="col text-center text-white">
                <h4 id="show_category" class="text-white mb-0"></h4>
            </div>
            <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#mobileMenu" aria-controls="mobileMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </header>

    @yield('content')

</div>

<footer class="bg-primary text-white text-center py-1 fixed-bottom">
    <div class="container-fluid">
        <div class="row d-flex justify-content-around d-flex align-items-center">

            <div class="col-3 col-md-2 mb-1 mb-md-0  ">
                <a href="{{ route('admin.index') }}">
                    @if(Auth::check())
                        <img src="{{ asset('img/set_active2.png') }}" alt="Admin" width="30">
                    @else
                        <img src="{{ asset('img/set.png') }}" alt="Settings" width="30">
                    @endif
                </a>
            </div>

            <div class="col-3 col-md-2 mb-1 mb-md-0">
                <a href="https://www.facebook.com/marketplace/profile/nataliyasteblyk" target="_blank" class="text-white text-decoration-none">
                    <img src="{{asset('img/icons/F.png')}}" alt="" width="25">&nbsp;
                    <span class="footer-facebook-text">Nataliya Steblyk</span>
                </a>
            </div>

            <div class="col-3 col-md-2 mb-1 mb-md-0 text">
                <a href="mailto:nataliya@gmail.com" class="text-white text-decoration-none ">
                    <i class="fas fa-envelope fa-lg me-2"></i>
                    <span class="footer-email-text" >info@happynat.ca</span>
                </a>
            </div>

            <div class="col-3 col-md-6 mb-1 mb-md-0">
                <a href="#" data-bs-toggle="modal" data-bs-target="#locationModal" class="text-white text-decoration-none">
                    <img src="{{ asset('img/icons/location.png') }}" alt="Location" width="25">&nbsp;
                    <span class="footer-location-text">Toronto, South-east Etobicoke near The Queensway and ParkLawn Rd M8Y4E3</span>
                </a>
            </div>
        </div>
    </div>
</footer>

<div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11582.8774258931!2d-79.4829992317544!3d43.61917387912056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b34efeddbaf0d%3A0x451a7c6178f1b78b!2sEtobicoke%2C%20Toronto%2C%20ON%20M8Y%2C%20Canada!5e0!3m2!1sen!2sus!4v1634306937289!5m2!1sen!2sus"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@stack('stack')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // // Функция для адаптивного поведения футера (если необходимо)
        // function adjustFooter() {
        //     const footer = document.querySelector('footer');
        //     if (window.innerWidth < 768) {
        //         footer.classList.remove('fixed-bottom');
        //     } else {
        //         footer.classList.add('fixed-bottom');
        //     }
        // }
        // adjustFooter();
        // window.addEventListener('resize', adjustFooter);
    });
</script>


</html>
