@extends('layouts.admin')

@section('content')
    <style>
        .card-product-image-index {
            box-shadow: 0 20px 27px 0 rgba(0, 0, 0, 0.05);
        }

        .table td {
            border-top-width: var(--bs-border-width);
            border-bottom-width: 0px !important;
        }

        .table th,
        .table td {
            background: white;
            vertical-align: middle;
        }

        .btn-new-product-image {
            border-radius: 10px;
            box-shadow: 0 4px 7px -1px rgba(0, 0, 0, 0.11), 0 2px 4px -1px rgba(0, 0, 0, 0.07)
        }

        a {
            text-decoration: none
        }
    </style>

    <div class="container py-4">
        <div class="card-product-image-index row bg-white" style="border-radius: 1rem">
            <div class="table-header d-flex justify-content-between py-3">
                <a href="{{ route('admin.product.index') }}"
                    class="btn-new-product-image btn btn-light btn-sm mb-0" type="button">Back
                </a>
                <a href="{{ route('admin.product-image.create', ['id' => $id]) }}"
                    class="btn-new-product-image btn bg-black btn-sm mb-0 text-white" type="button">+&nbsp; New Image Product
                </a>
            </div>
            <div class="p-0">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th style="width: 50px">ID</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product_image as $key => $product_image)
                            <tr>
                                <td>{{ $product_image->id }}</td>
                                <td>
                                    <img src="{{ asset('uploads/Product_image/' . $product_image->image) }}" height="40px">

                                </td>
                                <td>
                                    <form action="{{ route('admin.product-image.delete', ['id' => $product_image->id]) }}"
                                        method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="border-0 bg-transparent">
                                            <i class="bi bi-trash-fill text-black"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
