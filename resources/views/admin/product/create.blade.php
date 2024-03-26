@extends('layouts.admin')

@section('content')
    <style>
        .card-product-create {
            box-shadow: 0 20px 27px 0 rgba(0, 0, 0, 0.05);
        }
    </style>

    <div class="container py-4">
        <div class="card-product-create row bg-white" style="border-radius: 1rem">
            <div class="table-header d-flex justify-content-between py-3">
                <h4 class="m-0 align-self-center fw-bold">Add Products</h4>
            </div>
            <div class="py-3 px-5">
                <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 row justify-content-center">
                        <label for="name" class="col-sm-2 col-form-label">Name:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Please Enter Name...">
                            @if ($errors->has('name'))
                                <span class="help-block text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row justify-content-center">
                        <label for="description" class="col-sm-2 col-form-label">Description:</label>
                        <div class="col-sm-6">
                            <input type="text" name="description" class="form-control" placeholder="Please Enter Description...">
                            @if ($errors->has('description'))
                                <span class="help-block text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row justify-content-center">
                        <label for="image" class="col-sm-2 col-form-label">Image:</label>
                        <div class="col-sm-6">
                            <input type="file" name="image" class="form-control" placeholder="Please Enter Image...">
                            @if ($errors->has('image'))
                                <span class="help-block text-danger">{{ $errors->first('image') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row justify-content-center">
                        <label for="price" class="col-sm-2 col-form-label">Price:</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="price" name="price"
                                placeholder="Please Enter Price...">
                            @if ($errors->has('price'))
                                <span class="help-block text-danger">{{ $errors->first('price') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row justify-content-center">
                        <label for="price_sale" class="col-sm-2 col-form-label">Price Sale:</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="price_sale" name="price_sale"
                                placeholder="Please Enter Price Sale...">
                            @if ($errors->has('price_sale'))
                                <span class="help-block text-danger">{{ $errors->first('price_sale') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row justify-content-center">
                        <label class="col-sm-2 col-form-label">Categories:</label>

                        <div class="col-sm-6">
                            <select class="form-control" name="category_id">
                                @foreach ($category as $key => $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row justify-content-center">
                        <label for="quantity" class="col-sm-2 col-form-label">Quantity:</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="quantity" name="quantity"
                                placeholder="Please Enter Quantity...">
                            @if ($errors->has('quantity'))
                                <span class="help-block text-danger">{{ $errors->first('quantity') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row justify-content-center">
                        <label class="col-sm-2 col-form-label">Active:</label>
                        <div class="col-sm-6">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" value="1" type="radio" id="active"
                                    name="active" checked="">
                                <label for="active" class="custom-control-label">Yes</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" value="0" type="radio" id="no_active"
                                    name="active">
                                <label for="no_active" class="custom-control-label">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 mt-5 row d-flex">
                        <div class="col-sm offset-sm-2">
                            <a href="{{ route('admin.product.index') }}" class="btn btn-light border">Back</a>
                        </div>

                        <div class="col-sm offset-sm-2">
                            <button type="submit" class="btn btn-dark text-white">Add Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
