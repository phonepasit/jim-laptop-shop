@extends('layouts.admin')

@section('content')
    <style>
        .card-banner-edit {
            box-shadow: 0 20px 27px 0 rgba(0, 0, 0, 0.05);
        }
    </style>

    <div class="container py-4">
        <div class="card-banner-edit row bg-white" style="border-radius: 1rem">
            <div class="table-header d-flex justify-content-between py-3">
                <h4 class="m-0 align-self-center fw-bold">Edit Banners</h4>
            </div>
            <div class="py-3 px-5">
                <form action="{{ route('admin.banner.update', ['id' => $banner->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="mb-3 row justify-content-center">
                        <label for="name" class="col-sm-2 col-form-label">Tên:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Nhập tên..." value="{{ $banner->name }}">
                            @if ($errors->has('name'))
                                <span class="help-block text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row justify-content-center">
                        <label for="description" class="col-sm-2 col-form-label">Description:</label>
                        <div class="col-sm-6">
                            <input type="text" name="description" class="form-control" placeholder="Nhập description..."  value="{{ $banner->description }}">
                            @if ($errors->has('description'))
                                <span class="help-block text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row justify-content-center">
                        <label for="url" class="col-sm-2 col-form-label">URL:</label>
                        <div class="col-sm-6">
                            <input type="text" name="url" class="form-control" placeholder="Nhập URL..."  value="{{ $banner->url }}">
                            @if ($errors->has('url'))
                                <span class="help-block text-danger">{{ $errors->first('url') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row justify-content-center">
                        <label for="image" class="col-sm-2 col-form-label">Hình ảnh:</label>
                        <div class="col-sm-6">
                            <input type="file" name="image" class="form-control" placeholder="Nhập hình ảnh...">
                            @if ($errors->has('image'))
                                <span class="help-block text-danger">{{ $errors->first('image') }}</span>
                            @endif
                            <img src="{{ asset('uploads/Banner/' . $banner->image) }}" width="70px" height="70px"
                            alt="Image">
                        </div>
                    </div>

                    <div class="mb-3 row justify-content-center">
                        <label for="menu" class="col-sm-2 col-form-label">Sắp Xếp:</label>
                        <div class="col-sm-6">
                            <input type="number" name="sort_by" class="form-control"
                                placeholder="Nhập sắp xếp..." value="{{ $banner->sort_by }}">
                            @if ($errors->has('sort_by'))
                                <span class="help-block text-danger">{{ $errors->first('sort_by') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row justify-content-center">
                        <label class="col-sm-2 col-form-label">Kích Hoạt:</label>
                        <div class="col-sm-6">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" value="1" type="radio" id="active"
                                    name="active" {{ $banner->active == 1 ? 'checked' : '' }}>
                                <label for="active" class="custom-control-label">Có</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" value="0" type="radio" id="no_active"
                                    name="active" {{ $banner->active == 0 ? 'checked' : '' }}>
                                <label for="no_active" class="custom-control-label">Không</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 mt-5 row d-flex">
                        <div class="col-sm offset-sm-2">
                            <a href="{{ route('admin.banner.index') }}" class="btn border">Trở lại</a>
                        </div>

                        <div class="col-sm offset-sm-2">
                            <button type="submit" class="btn btn-dark text-white">Chỉnh sửa Banner</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="module">
        $(document).ready(function() {
            $('.toggle-password').click(function() {
                $(this).toggleClass('active');
                var input = $($(this).attr('data-target'));
                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    $(this).find('i').removeClass('bi-eye-fill').addClass('bi-eye-slash-fill');
                } else {
                    input.attr('type', 'password');
                    $(this).find('i').removeClass('bi-eye-slash-fill').addClass('bi-eye-fill');
                }
            });
        });
    </script>
@endsection
