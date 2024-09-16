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
                    <label for="toggle-images" class="m-0"><span class="text-bold mr-4 ">Picture</span>&nbsp;</label>
                    <input class="form-check-input toggle-column" type="checkbox" name="is_picture" data-column="3" id="toggle-images">
                </div>
                <div class="col-4"><a id="admin_new_firm_create" href={{route('product.create')}} class=""><img src="{{asset('img/plus.png')}}" width="30px" alt="" data-toggle="tooltip" data-placement="top" title="Add new product"></a></div>
                <div class="col-1 card-tools">
                    <button type="button" class="btn btn-tool toggle-column" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="box-body table-responsive">
                    @if(count($products))
                        <table id="product-list" class="table-sm table-bordered table-striped table-hover " style="width:100%;"></table>
                    @else
                        <p>No product created</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('components.delete')

    <script>

        document.addEventListener("DOMContentLoaded", function () {

            $('#spinner-load').show();

            function getShowImages() {
                return localStorage.getItem('show_images') === 'true';
            }
            function setShowImages(value) {
                localStorage.setItem('show_images', value);
            }
            $('#toggle-images').prop('checked', getShowImages());

            function getColumns() {
                let columns = [
                    { data: 'id', name: 'id'},
                    { data: 'category_name', name: 'category_name' },
                    { data: 'name', name: 'name' },
                    { data: 'price', name: 'price' },
                    { data: 'created_at', name: 'created_at', wight: '50px'},
                    { data: 'edit', name: 'edit', orderable: false, searchable: false, wight: '3%', className: 'text-center' },
                    { data: 'delete', name: 'delete', orderable: false, searchable: false, wight: '3%', className: 'text-center'}
                ];

                if (getShowImages()) {
                    columns.splice(5, 0, { data: 'images', name: 'images', orderable: false, searchable: false, width: '40%' });
                }

                return columns;
            }

            function initDataTable() {
                if ($.fn.DataTable.isDataTable('#product-list')) {
                    $('#product-list').DataTable().destroy();
                }

                $('#product-list').empty();

                let thead = '<tr>' +
                    '<th>Id</th>' +
                    '<th>Category</th>' +
                    '<th>Name</th>' +
                    '<th>Price</th>' +
                    '<th>Created</th>';

                if (getShowImages()) {
                    thead += '<th>Images</th>';
                }

                thead +=
                    '<th class="text-center">Edit</th>' +
                    '<th class="text-center">Delete</th>' +
                    '</tr>';

                $('#product-list').append('<thead>' + thead + '</thead><tbody></tbody>');

                let table = $('#product-list').DataTable({
                    autoWidth: false,
                    paging: false,
                    info: false,
                    processing: true,
                    serverSide: true,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'excel', 'pdf', 'print'
                    ],
                    ajax: {
                        url: '{{ route("products.data") }}',
                        data: function(d) {
                            d.show_images = getShowImages();
                        },
                        dataSrc: function(json) {
                            $('#spinner-load').hide();
                            return json.data;
                        },
                        error: function(xhr, error, thrown) {
                            console.log('Error fetching data:', xhr.responseText);
                          $('#spinner-load').hide();
                        }
                    },
                    columns: getColumns(),
                    order: [[0, 'desc']],
                    columnDefs: [
                        { targets: '_all', defaultContent: '' }
                    ]
                });

                table.on('processing.dt', function(e, settings, processing) {
                    if (processing) {
                        $('#spinner-load').show();
                    } else {
                        $('#lspinner-load').hide();
                    }
                });
            }

            initDataTable();

            $('#toggle-images').on('change', function() {
                setShowImages(this.checked);
                initDataTable();
            });

            $('[data-fancybox]').fancybox({
                buttons: ["zoom", "slideShow", "download", "thumbs", "close"],
                video: {autoStart: true}
            })

        });

        function showLoadingSpinner() {
            document.querySelector('#spinner-load').classList.remove('d-none');
        }

    </script>

@endsection
