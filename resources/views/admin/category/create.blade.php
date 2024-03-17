@extends('layouts.admin')

@section('content')
<style>
    .card-category-create {
        box-shadow: 0 20px 27px 0 rgba(0, 0, 0, 0.05);
    }
</style>

<div class="container py-4">
    <div class="card-category-create row bg-white" style="border-radius: 1rem">
        <div class="table-header d-flex justify-content-between py-3">
            <h4 class="m-0 align-self-center fw-bold">Add Category</h4>
        </div>
        <div class="py-3 px-5">
    <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
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
                <a href="{{ route('admin.category.index') }}" class="btn btn-light border">Back</a>
            </div>

            <div class="col-sm offset-sm-2">
                <button type="submit" class="btn btn-dark text-white">Add Category</button>
            </div>
        </div>
    </form>
@endsection
