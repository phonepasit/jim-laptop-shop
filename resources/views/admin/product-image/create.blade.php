@extends('layouts.admin')

@section('content')
    <style>
        .card-product-image-create {
            box-shadow: 0 20px 27px 0 rgba(0, 0, 0, 0.05);
        }
    </style>

    <div class="container py-4">
        <div class="card-product-image-create row bg-white" style="border-radius: 1rem">
            <div class="table-header d-flex justify-content-between py-3">
                <h4 class="m-0 align-self-center fw-bold">Add Image Products</h4>
            </div>
            <div class="py-3 px-5">
                <form action="{{ route('admin.product-image.store', ['id' => $id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 row justify-content-center">
                        <label for="image[]" class="col-sm-2 col-form-label">Image:</label>
                        <div class="col-sm-6">
                            <input type="file" name="image[]" class="form-control" multiple>
                            @if ($errors->has('image[]'))
                                <span class="help-block text-danger">{{ $errors->first('image[]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 mt-5 row d-flex">
                        <div class="col-sm offset-sm-2">
                            <a href="{{ route('admin.product-image.index', ['id' => $id]) }}" class="btn btn-light border">Back</a>
                        </div>

                        <div class="col-sm offset-sm-2">
                            <button type="submit" class="btn btn-dark text-white">Add Image Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
