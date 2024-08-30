<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HappyNat</title>
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/font-awesome.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
    body {
        padding-top: 56px; /* Отступ для хедера */
        padding-bottom: 56px; /* Отступ для футера */
    }
    footer {
        margin-left: 0 !important; /* Убираем отступ слева */
        width: 100% !important; /* Задаем ширину 100% */
        left: 0 !important; /* Прижимаем футер к левой стороне */
        z-index: 1000; /* Убедимся, что футер поверх другого контента */
    }

    @media (max-width: 768px) {
        #desktopMenu {
            display: none !important; /* Прячем меню на десктопе в мобильной версии */
        }

        main {
            margin-left: 0 !important; /* Убираем отступ в мобильной версии */
        }

        footer.fixed-bottom {
            margin-left: 0 !important; /* На десктопе футер тоже занимает всю ширину */
        }
    }

    .product-grid {
        width: 70%;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 15px;
        padding: 15px;
        overflow-y: auto;
    }
    .product-card {
        background-color: #fff;
        border: 1px solid #ddd;
        padding: 15px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
    }

    .product-card:hover {
        transform: scale(1.05);
    }
    img.prod {
        max-width: 100px;
    }

</style>


<body>

<!-- Header -->
<header class="navbar navbar-dark bg-primary fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{asset('img/home.png')}}" alt="" size="30px">
            &nbsp;&nbsp; <b>HappyNat</b>
        </a>
        <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</header>

<!-- Sidebar Menu -->
<div class="d-flex flex-column flex-shrink-0 p-3 bg-light position-fixed vh-100" id="desktopMenu" style="width: 250px;">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item"><a class="nav-link active" href="#">Earring</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Brooch</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Bags (purs)</a></li>
        <hr>
        <li class="nav-item"><a class="nav-link" href="#">Vintage</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Dishes</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Other</a></li>
        <hr>
        <li class="nav-item"><a class="nav-link" href="#">Archive</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Shipping</a></li>
    </ul>
</div>

<!-- Offcanvas for mobile -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="mobileMenuLabel">Категории</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav nav-pills flex-column mb-auto">
            li class="nav-item"><a class="nav-link active" href="#">Earring</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Brooch</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Bags (purs)</a></li>
            <hr>
            <li class="nav-item"><a class="nav-link" href="#">Vintage</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Dishes</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Other</a></li>
            <hr>
            <li class="nav-item"><a class="nav-link" href="#">Archive</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Shipping</a></li>
        </ul>
    </div>
</div>

<!-- Main Content -->
<main class="container-fluid mt-5 pt-3 product-grid" style="margin-left: 290px;">
    <div class="row">
        <div class="col-md-12">
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <!-- Example Product Card -->
                @for ($i = 0; $i < 20; $i++)
                    <div class="col">
                        <div class="card h-100 product-card">
                            <img src="{{asset('img/pro.webp')}}" class="card-img-top prod" alt="Product Image" sizes="300">
                            <div class="card-body">
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

<!-- Footer -->
<footer class="bg-primary text-white text-center py-3 fixed-bottom w-100">
    <div>FB: /happynat | Email: contact@happynat.com | Location: Your City | Телефон: +123 456 7890</div>
</footer>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const productCards = document.querySelectorAll('.product-card');

        productCards.forEach(card => {
            card.addEventListener('mouseover', () => {
                card.classList.add('hovered');
            });

            card.addEventListener('mouseout', () => {
                card.classList.remove('hovered');
            });
        });
    });

</script>

</body>
</html>
