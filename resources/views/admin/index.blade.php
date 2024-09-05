@extends('admin.master')

@section('content')

    <div class="container h-100">
        <div class="row my-3">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-success shadow">
                    <div class="inner">
                        <h3>{{count($product)}}</h3>
                        <p>Quantity of products</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('product.index')}}" class="small-box-footer">open product list <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6 ">
                <!-- small box -->
                <div class="small-box bg-gradient-info shadow">
                    <div class="inner">
                        <h3>{{count($categories)}}</h3>
                        <p>Quantity of categories</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('category.index')}}" class="small-box-footer">open categories list <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-secondary shadow">
                    <div class="inner">
                        <h3>...<sup style="font-size: 20px"></sup></h3>

                        <p>views per day {{ now()->format('d.M') }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>



            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-secondary shadow">
                    <div class="inner">
                        <h3>...</h3>
                        <p>Quantity of orders for now</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
    </div><!-- /.container-fluid -->


@endsection
