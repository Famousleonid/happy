@extends('admin.master')

@section('content')

    <style>

    </style>

    <div class="container h-100">
        <div class="row my-3">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-gradient-success shadow">
                    <div class="inner">
                        <h3>{{ count($products) }}</h3>
                        <p>Quantity of products</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('product.index') }}" class="small-box-footer">open product list <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-gradient-info shadow">
                    <div class="inner">
                        <h3>{{ count($categories) }}</h3>
                        <p>Quantity of categories</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('category.index') }}" class="small-box-footer">open categories list <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-gradient-secondary shadow">
                    <div class="inner">
                       <h3> {{ $totalViews }}</h3>
                        <p>views per day: &nbsp; <span class="text-yellow">{{ now()->format('d.M.y') }} -</span>  {{$todayViews}}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" onclick="openModal('modal1'); return false;" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-gradient-secondary shadow">
                    <div class="inner">
                        <h3>...</h3>
                        <p>Quantity of orders for now</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" onclick="openModal('modal2'); return false;" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    <x-modal id="modal1" title="Views per product">
        <div class="mb-3">
            <div class="form-check mt-2">
                <input type="checkbox" class="form-check-input" id="filterTodayCheckbox">
                <label class="form-check-label" for="filterTodayCheckbox">Показать за день</label>
            </div>
        </div>

        <table class="table table-bordered table-dark" id="viewsTable">
            <thead>
            <tr>
                <th>Product Name</th>
                <th class="text-center">Date</th>
                <th class="text-center">IP</th>
                <th class="text-center">views</th>
                <th class="text-center">Country</th>
            </tr>
            </thead>
            <tbody>
            @foreach($views_all as $view)
                <tr>
                    <td>{{ $view->viewable->name }}</td>
                    <td class="text-center">{{ $view->view_date }}</td>
                    <td class="text-center">{{ $view->ip_address }}</td>
                    <td class="text-center">{{ $view->views_count }}</td>
                    <td class="text-center">{{ $view->country ?? 'Unknown' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </x-modal>

    <x-modal id="modal2" title="">
        <p>2.</p>
    </x-modal>

    <script>
        function openModal(id) {
            document.getElementById(id).style.display = 'block';
            const table = $('#viewsTable').DataTable();
            table.columns.adjust().draw();
        }

        function closeModal(id) {
            document.getElementById(id).style.display = 'none';
        }

        document.addEventListener('DOMContentLoaded', function () {
            const table = $('#viewsTable').DataTable({
                "autoWidth": true,
                "paging": false,
                "ordering": false,
                "info": false,
                "searching": true,
                "scrollY": '350px',
                "scrollCollapse": true,
                "scrollX": false,
                "fixedHeader": false,
                "columnDefs": [
                    {
                        "targets": 1, // Колонка с датой
                        "render": function (data, type, row) {
                            if (type === 'display') {
                                // Преобразование даты в формат 01.jul.24
                                const date = new Date(data);
                                const options = {day: '2-digit', month: 'short', year: '2-digit'};
                                return date.toLocaleDateString('en-GB', options).replace(/\./g, '').replace(/ /g, '.');
                            }
                            return data;
                        }
                    }
                ]
            });

            $('#filterTodayCheckbox').on('change', function () {
                const today = new Date().toISOString().split('T')[0];

                if (this.checked) {
                    table.rows().every(function () {
                        const dateCell = this.data()[1];
                        if (dateCell !== today) {
                            $(this.node()).hide();
                        } else {
                            $(this.node()).show();
                        }
                    });
                } else {
                    table.rows().every(function () {
                        $(this.node()).show();
                    });
                }
                table.draw();
            });
        });


        document.addEventListener('keydown', function (event) {
            if (event.key === "Escape") {
                let modals = document.getElementsByClassName('modal');
                for (let modal of modals) {
                    modal.style.display = 'none';
                }
            }
        });
    </script>
@endsection
