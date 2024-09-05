@extends('admin.master')


@section('content')

    <style>
        .label-nowrap {
            white-space: nowrap;
        }
    </style>

    <div class="container-fluid pl-1 pr-1 pt-2 row justify-content-center">
        <div class="card shadow firm-border bg-white mt-1 col-10">
            <div class="card-header">
                <h3 class="card-title text-bold">Create of product</h3>
            </div>

            <form role="form" method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="card-body row">
                    <div class="form-group d-flex align-items-center col-12 col-md-3">
                        <label for="category_id" class="small text-primary">Category:</label>&nbsp;
                        <select name="category_id" id="category_id" class="form-control">
                            <option disabled selected value=""> -- select a category --</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>&nbsp;
                    </div>
                    <div class="form-group d-flex align-items-center col-12 col-md-3">
                        <label for="name" class="small text-primary">Name:</label>&nbsp;&nbsp;
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter name of ...">&nbsp;
                    </div>
                    <div class="form-group d-flex align-items-center col-12 col-md-3">
                        <label for="price" class="small text-primary">Price:</label>&nbsp;&nbsp;
                        <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Enter price of ...">&nbsp;
                    </div>
                    <div class="form-group d-flex align-items-center col-12 col-md-3">
                        <label for="old_price" class="small text-primary label-nowrap">Old price:</label>&nbsp;&nbsp;
                        <input type="text" name="old_price" id="old_price" class="form-control  @error('old_price') is-invalid @enderror" placeholder="Enter old price of ...">
                    </div>
                </div>

                <div class="card-body row">

                    <div class="form-group d-flex align-items-center col-12 col-md-5">
                        <label for="location" class="small text-primary">location:</label>&nbsp;&nbsp;
                        <input type="text" name="location" id="location" class="form-control @error('location') is-invalid @enderror" placeholder="Enter name of ...">&nbsp;
                    </div>
                    <div class="form-group d-flex align-items-center col-12 col-md-3">
                        <label for="cost" class="small text-primary label-nowrap">Cost price:</label>&nbsp;&nbsp;
                        <input type="number" name="cost" id="cost" class="form-control @error('location') is-invalid @enderror" >&nbsp;
                    </div>
                    <div class="form-group d-flex align-items-center col-12 col-md-2">
                        <label for="icon" class="small"><img src="{{asset('img/icons/video.png')}}" alt="v" width="40"></label>&nbsp;
                        <select name="icon" id="icon" class="form-control">
                            <option value="{{'yes'}}">Yes</option>
                            <option value="{{'no'}}" selected>No</option>
                        </select>&nbsp;
                    </div>

                    <div class="form-group d-flex align-items-center col-12 col-md-2">
                        <label for="status" class="small text-primary">Visible:</label>&nbsp;&nbsp;
                        <select name="status" id="status" class="form-control">
                            <option value="{{'yes'}}">Yes</option>
                            <option value="{{'no'}}">No</option>
                        </select>&nbsp;
                    </div>

                    <div class="form-group d-flex align-items-center col-12 col-md-12">
                        <label for="description" class="small text-primary">Description:</label>&nbsp;&nbsp;
                        <textarea style="padding: 10px; text-indent: 0;" name="description" id="description" class="form-control" rows="6" cols="60"></textarea>
                    </div>

                </div>
                <div class="form-group">
                    <input type="file"
                           class="filepond"
                           name="photos[]"
                           id="filepond"
                           multiple
                           data-max-file-size="10MB"
                           data-max-files="10" />

                </div>

                <div class="card-footer d-flex flex-column flex-md-row justify-content-between">
                    <div class="mb-2 mb-md-0">
                        <button type="submit" class="btn btn-primary btn-block" onclick="showLoadingSpinner()">Save</button>
                    </div>
                    <div class="">
                        <a href="{{route('product.index')}}" class="btn btn-info btn-block">Cancel</a>
                    </div>
                </div>

            </form>
        </div>
    </div>

@section('scripts')

@endsection

    <script>
        function showLoadingSpinner() {
            document.querySelector('#spinner-load').classList.remove('d-none');
        }

    </script>


@endsection






