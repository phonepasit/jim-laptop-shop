@extends('layouts.admin')

@section('content')
    <style>
        .card-product-edit {
            box-shadow: 0 20px 27px 0 rgba(0, 0, 0, 0.05);
        }
    </style>

    <div class="container py-4">
        <div class="card-product-edit row bg-white" style="border-radius: 1rem">
            <div class="table-header d-flex justify-content-between py-3">
                <h4 class="m-0 align-self-center fw-bold">Edit Products</h4>
            </div>
            <div class="py-3 px-5">
                <form action="{{ route('admin.product.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="mb-3 row justify-content-center">
                        <label for="name" class="col-sm-2 col-form-label">Tên:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Nhập tên..."  value="{{ $product->name }}">
                            @if ($errors->has('name'))
                                <span class="help-block text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row justify-content-center">
                        <label for="description" class="col-sm-2 col-form-label">Description:</label>
                        <div class="col-sm-6">
                            <input type="text" name="description" class="form-control" placeholder="Nhập description..." value="{{ $product->description }}">
                            @if ($errors->has('description'))
                                <span class="help-block text-danger">{{ $errors->first('description') }}</span>
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
                            <img src="{{ asset('uploads/Product/' . $product->image) }}" width="70px" height="70px"
                                alt="Image">
                        </div>
                    </div>

                    <div class="mb-3 row justify-content-center">
                        <label for="price" class="col-sm-2 col-form-label">Giá tiền:</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="price" name="price"
                                placeholder="Nhập giá tiền..." value="{{ $product->price }}">
                            @if ($errors->has('price'))
                                <span class="help-block text-danger">{{ $errors->first('price') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row justify-content-center">
                        <label for="price_sale" class="col-sm-2 col-form-label">Giá tiền đã giảm:</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="price_sale" name="price_sale"
                                placeholder="Nhập giá tiền đã giảm..." value="{{ $product->price_sale }}">
                            @if ($errors->has('price_sale'))
                                <span class="help-block text-danger">{{ $errors->first('price_sale') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row justify-content-center">
                        <label class="col-sm-2 col-form-label">Danh Mục:</label>

                        <div class="col-sm-6">
                            <select class="form-control" name="category_id">
                                @foreach ($category as $key => $category)
                                    <option value="{{ $category->id }}"
                                        {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row justify-content-center">
                        <label class="col-sm-2 col-form-label">Kích Hoạt:</label>
                        <div class="col-sm-6">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" value="1" type="radio" id="active"
                                    name="active" {{ $product->active == 1 ? 'checked' : '' }}>
                                <label for="active" class="custom-control-label">Có</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" value="0" type="radio" id="no_active"
                                    name="active"  {{ $product->active == 0 ? 'checked' : '' }}>
                                <label for="no_active" class="custom-control-label">Không</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 mt-5 row d-flex">
                        <div class="col-sm offset-sm-2">
                            <a href="{{ route('admin.product.index') }}" class="btn border">Trở lại</a>
                        </div>

                        <div class="col-sm offset-sm-2">
                            <button type="submit" class="btn btn-dark text-white">Chỉnh sửa Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
