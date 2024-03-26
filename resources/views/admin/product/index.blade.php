@extends('layouts.admin')
@section('content')
    <style>
        .card-product-index {
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

        .btn-new-product {
            border-radius: 10px;
            box-shadow: 0 4px 7px -1px rgba(0, 0, 0, 0.11), 0 2px 4px -1px rgba(0, 0, 0, 0.07)
        }

        a {
            text-decoration: none
        }
    </style>

    @php

        $active = [
            0 => 'No Active',
            1 => 'Active',
        ];

    @endphp

    <div class="container py-4">
        <div class="card-product-index row bg-white" style="border-radius: 1rem">
            <div class="table-header d-flex justify-content-between py-3">
                <h4 class="m-0 align-self-center fw-bold">All Products</h4>
                <a href="{{ route('admin.product.create') }}" class="btn-new-product btn bg-black btn-sm mb-0 text-white"
                    type="button">+&nbsp; New Product</a>
            </div>
            <div class="p-0">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th style="width: 50px">ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Price Sale</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Image Detail</th>
                            <th style="width: 100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    <img src="{{ asset('/uploads/product/' . $product->image) }}" height="40px">
                                </td>
                                <td>{{ number_format($product->price) }} VND</td>
                                <td>{{ number_format($product->price_sale) }} VND</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $active[$product->active] }}</td>

                                <td>
                                    <a href="{{ route('admin.product-image.index', ['id' => $product->id]) }}"
                                        class="btn-new-product btn bg-black btn-sm mb-0 text-white">Image</a>
                                </td>

                                <td>
                                    <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}" class="me-3">
                                        <i class="bi bi-person-exclamation text-black"></i>
                                    </a>
                                    <form action="{{ route('admin.product.delete', ['id' => $product->id]) }}"
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
    {{ $products->links() }}
@endsection
