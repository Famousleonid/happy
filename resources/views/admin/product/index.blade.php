@extends('admin.master')


@section('content')

    <style>
        table.dataTable td {
            white-space: normal;
            word-wrap: break-word;
        }
    </style>



    <div class="container-fluid pl-3 pr-3 pt-2">
        <div class="card shadow firm-border bg-white mt-2">
            <div class="card-header row">
                <div class="col-6"><h3 class="card-title text-bold">list of product ( {{count($products)}} )</h3></div>
                <div class="col-5"><a id="admin_new_firm_create" href={{route('product.create')}} class=""><img src="{{asset('img/plus.png')}}" width="30px" alt="" data-toggle="tooltip" data-placement="top" title="Add new product"></a></div>
                <div class="col-1 card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="box-body table-responsive">
                    @if(count($products))
                        <table id="product-list" class="table-sm table-bordered table-striped table-hover " style="width:100%;">
                            <thead>
                            <tr>
                                <th data-orderable="true">category_id</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Old_price</th>
                                <th>Images</th>
                                <th>location</th>
                                <th>Icon video</th>
                                <th>Visible</th>
                                <th class="text-center" data-orderable="false">Edit</th>
                                <th class="text-center" data-orderable="false">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->category->name}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->old_price}}</td>
                                    <td>
                                    @foreach ($product->getMedia('photos') as $media)
                                        @if(strpos($media->mime_type, 'image') !== false)

                                                <a href="{{ $media->getFullUrl() }}" data-fancybox="gallery-{{ $product->id }}">
                                                    <img src="{{ $media->getUrl() }}" width="25" alt="">
                                                </a>
                                        @elseif(strpos($media->mime_type, 'video') !== false)

                                                <a href="{{ $media->getFullUrl() }}" data-fancybox="gallery-{{ $product->id }}">
                                                    <video width="25" controls>
                                                        <source src="{{ $media->getUrl() }}" type="{{ $media->mime_type }}">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                </a>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{$product->location}}</td>
                                    <td>{{$product->icon}}</td>
                                    <td>{{$product->status}}</td>
                                    <td class="text-center">
                                        <a href="{{route('product.edit', ['product' => $product->id]) }}"><img src="{{asset('img/set.png')}}" width="25" alt=""></a>
                                    </td>
                                    <td class="text-center">
                                        <div>
                                            <form action="{{route('product.destroy', ['product' => $product->id])}}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete product" data-message="Are you sure you want to delete product: {{$product->name}} ?">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>

                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    @else
                        <p>No product created</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('components.delete')




    <script>

        document.addEventListener("DOMContentLoaded", function() {

            $('#product-list').DataTable({
                "AutoWidth": false,
                "scrollY": "auto",
                "scrollCollapse": true,
                "paging": false,
                "ordering": true,
                "info": false,
                order: [[0, 'asc']],
                columnDefs: [
                    // { targets: 0, visible: false },
                     { targets: 4, orderable: false },
                    { targets: 6, orderable: false },
                     { targets: 7, orderable: false }
                ],
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });

            $('[data-fancybox]').fancybox({
                buttons: [
                    "zoom",
                    "slideShow",
                    "download",
                    "thumbs",
                    "close"
                ],
                video: {
                    autoStart: true
                }
            })
        });

    </script>

@endsection
