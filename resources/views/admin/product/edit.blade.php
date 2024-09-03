@extends('admin.master')


@section('content')

    <style>
        .label-nowrap {
            white-space: nowrap;
        }

        .pic-image {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Изображение заполнит контейнер, сохраняя пропорции */
            display: block; /* Убирает возможные отступы вокруг изображения */
        }
        .image-container {
            position: relative;
            width: 150px;
            height: 150px;
            margin: 10px;
            border: 2px solid #ddd; /* Рамка вокруг изображения */
            display: inline-block;
        }

        .image-container img,
        .image-container video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .remove-image {
            position: absolute;
            top: 3px;
            right: 3px;
            background-color: rgba(255, 255, 255, 0.7);
            border: none;
            color: red;
            font-size: 18px;
            cursor: pointer;
            z-index: 10;
            padding: 0;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
    </style>

    <div class="container-fluid pl-1 pr-1 pt-2 row justify-content-center">
        <div class="card shadow firm-border bg-white mt-1 col-10">
            <div class="card-header">
                <h3 class="card-title text-bold">Edit of product</h3>
            </div>

            <form role="form" method="post" action="{{route('product.update',['product' => $current_prod->id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body row">
                    <div class="form-group d-flex align-items-center col-12 col-md-3">
                        <label for="category_id" class="small text-primary">Category:</label>&nbsp;
                        <select name="category_id" id="category_id" class="form-control">
                            <option hidden selected value="{{$current_prod->category_id}}">{{$current_prod->category->name}}</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>&nbsp;
                    </div>
                    <div class="form-group d-flex align-items-center col-12 col-md-3">
                        <label for="name" class="small text-primary">Name:</label>&nbsp;&nbsp;
                        <input type="text" name="name" id="name" value="{{$current_prod->name}}" class="form-control @error('name') is-invalid @enderror">&nbsp;
                    </div>
                    <div class="form-group d-flex align-items-center col-12 col-md-3">
                        <label for="price" class="small text-primary">Price:</label>&nbsp;&nbsp;
                        <input type="text" name="price" id="price" value="{{$current_prod->price}}" class="form-control  @error('price') is-invalid @enderror">&nbsp;
                    </div>
                    <div class="form-group d-flex align-items-center col-12 col-md-3">
                        <label for="old_price" class="small text-primary label-nowrap">Old price:</label>&nbsp;&nbsp;
                        <input type="text" name="old_price" id="old_price" value="{{$current_prod->old_price}}" class="form-control  @error('old_price') is-invalid @enderror">
                    </div>
                </div>

                <div class="card-body row">

                    <div class="form-group d-flex align-items-center col-12 col-md-8">
                        <label for="location" class="small text-primary">location:</label>&nbsp;&nbsp;
                        <input type="text" name="location" id="location" value="{{$current_prod->location}}" class="form-control @error('location') is-invalid @enderror">&nbsp;
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
                            <option hidden selected value="{{$current_prod->status}}">{{$current_prod->status}}</option>
                            <option value="{{'yes'}}">Yes</option>
                            <option value="{{'no'}}">No</option>
                        </select>&nbsp;
                    </div>
                </div>

                <div class="card-body row d-flex flex-wrap justify-content-start">

                    @foreach ($current_prod->getMedia('photos') as $media)

                        <div class="image-container">

                            @if(strpos($media->mime_type, 'image') !== false)

                                <a href="{{ $media->getFullUrl() }}" data-fancybox="gallery-{{ $current_prod->id }}">
                                    <img class="pic-image" src="{{ $media->getUrl() }}" alt="">
                                </a>
                            @elseif(strpos($media->mime_type, 'video') !== false)

                                <a href="{{ $media->getFullUrl() }}" data-fancybox="gallery-{{ $current_prod->id }}">
                                    <video width="150" controls>
                                        <source src="{{ $media->getUrl() }}" type="{{ $media->mime_type }}">
                                        Your browser does not support the video tag.
                                    </video>
                                </a>
                            @endif
                            <button type="button" class="remove-image" data-id="{{ $media->id }}">&times;</button>
                        </div>

                    @endforeach

                </div>

                <div class="form-group ">
                    <input type="file"
                           class="filepond"
                           name="photos[]"
                           id="filepond"
                           multiple
                           data-max-file-size="5MB"
                           data-max-files="10"/>

                </div>

                <div class="card-footer d-flex flex-column flex-md-row justify-content-between">
                    <div class="mb-2 mb-md-0">
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </div>
                    <div class="">
                        <a href="{{route('product.index')}}" class="btn btn-info btn-block">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const removeButtons = document.querySelectorAll('.remove-image');

            if (removeButtons.length === 0) {
                console.warn('No elements with class .remove-image found.');
            }

            removeButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    const mediaId = this.getAttribute('data-id');
                    const url = `/admin/media/${mediaId}`;  // Динамически создаем URL на стороне клиента
                    const container = this.closest('.image-container');

                    if (mediaId && container && confirm('Are you sure you want to delete this image?')) {
                        fetch(url, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    container.remove(); // Удаляем элемент из DOM
                                } else {
                                    alert('Failed to delete the image.');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('Failed to delete the image.');
                            });
                    } else {
                        console.error('Element not found or mediaId is null.');
                    }
                });
            });
        });
    </script>





@endsection








