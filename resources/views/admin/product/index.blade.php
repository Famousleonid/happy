@extends('admin.master')


@section('content')

    <style>
        table.dataTable td {
            white-space: normal;
            word-wrap: break-word;
        }

         input[type="checkbox"] {
             width: 50px;
             height: 30px;
             -webkit-appearance: none;
             -moz-appearance: none;
             background: #f08282;
             outline: none;
             border-radius: 50px;
             box-shadow: inset 0 0 5px rgba(0, 0, 0, .2);
             transition: 0.5s;
             position: relative;
         }

        input:checked[type="checkbox"] {
            background: #42a50d;
        }

        input[type="checkbox"]::before {
            content: '';
            position: absolute;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 1px solid darkgray;
            top: 0;
            left: 0;
            background: #fff;
            transform: scale(1.1);
            box-shadow: 0 2px 5px rgba(0, 0, 0, .2);
            transition: 0.5s;
        }

        input:checked[type="checkbox"]::before {
            left: 25px;
        }

    </style>



    <div class="container-fluid pl-3 pr-3 pt-2">
        <div class="card shadow firm-border bg-white mt-2">
            <div class="card-header row">
                <div class="col-5"><h3 class="card-title text-bold">list of product ( {{count($products)}} )</h3></div>
                <div class="col-2 form-check d-flex align-items-center">
                    <label for="is_picture" class="m-0"><span class="text-bold mr-4 ">Picture</span>&nbsp;</label>
                    <input class="form-check-input" type="checkbox" name="is_picture" value="0" id="is_picture">
                </div>
                <div class="col-4"><a id="admin_new_firm_create" href={{route('product.create')}} class=""><img src="{{asset('img/plus.png')}}" width="30px" alt="" data-toggle="tooltip" data-placement="top" title="Add new product"></a></div>
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
                                <th data-orderable="true">Category</th>
                                <th>Name</th>
                                <th>Price</th>
{{--                                <th>Old_price</th>--}}
                                <th>Images</th>
{{--                                <th>location</th>--}}
{{--                                <th>Icon video</th>--}}
{{--                                <th>Visible</th>--}}
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
{{--                                    <td>{{$product->old_price}}</td>--}}
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
{{--                                    <td>{{$product->location}}</td>--}}
{{--                                    <td>{{$product->icon}}</td>--}}
{{--                                    <td>{{$product->status}}</td>--}}
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

            let table = $('#product-list').DataTable({
                "AutoWidth": false,
                "scrollY": "auto",
                "scrollCollapse": true,
                "paging": false,
                "ordering": true,
                "info": false,
                "ajax": {
                    "url": "/api/data",  // URL для загрузки данных
                    "type": "POST"
                },
                columns: [
                    { "data": "category", "width": "10%" },
                    { "data": "name", "width": "20%" },
                    { "data": "price", "width": "10%" },
                    { "data": "picture", "width": "40%" },
                    { "data": "edit", "width": "80px" },
                    { "data": "delete", "width": "80px" },

                ],
                order: [[0, 'asc']],

                columnDefs: [
                  //   { targets: 0, visible: false },
                     { targets: 3, orderable: false },
                     { targets: 4, orderable: false },
                     { targets: 5, orderable: false }
                ],
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf', 'print'
                ],
            });

            $('#is_picture').on('change', function() {
                let pictureColumn = table.column(3);
                if (this.checked) {
                    pictureColumn.visible(true);
                } else {
                    pictureColumn.visible(false);
                }
                table.draw();
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
