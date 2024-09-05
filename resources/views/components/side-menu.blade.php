
<!-- Sidebar Menu -->
<div class="d-flex flex-column flex-shrink-0 p-2 bg-light position-fixed vh-100 shadow " id="desktopMenu"
     style="width: 200px;">
    <ul class="nav nav-pills flex-column mb-auto">
        @foreach($categories as $category)
            <li class="nav-item"><a class="nav-link" href="{{route('card.show',['card' => $category->id] )}}">{{$category->name}}</a>
        @endforeach
    </ul>

    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#shippingModal">Shipping</a>
        </li>
    </ul>
</div>

<!-- for mobile -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
    <div class="offcanvas-header">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav nav-pills flex-column mb-auto">
            @foreach($categories as $category)
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
<!-- Модальное окно -->
<div class="modal fade" id="shippingModal" tabindex="-1" aria-labelledby="shippingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="shippingModalLabel">Shipping Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
 Any information...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

