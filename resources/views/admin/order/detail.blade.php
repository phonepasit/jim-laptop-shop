@extends('layouts.admin')
@section('content')
    <style>
        .card-order-index {
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

        .btn-new-order {
            border-radius: 10px;
            box-shadow: 0 4px 7px -1px rgba(0, 0, 0, 0.11), 0 2px 4px -1px rgba(0, 0, 0, 0.07)
        }

        a {
            text-decoration: none
        }
    </style>

    @php

        $status = [
            1 => 'Pending',
            2 => 'Processing',
            3 => 'Completed',
            4 => 'Cancelled',
        ];

    @endphp

    <div class="container py-4">
        <div class="card-order-index row bg-white" style="border-radius: 1rem">
            <div class="table-header d-flex justify-content-between py-3">
                <h4 class="m-0 align-self-center fw-bold">Order Details</h4>
                <button class="btn btn-danger"><a href="{{ route('admin.order.index') }}" class="text-white text-decoration-none">Go Back</a></button>
            </div>
            <div class="p-0">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th style="width: 50px">ID</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderDetails as $index => $orderDetail)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $orderDetail->product->name }}</td>
                                <td>
                                    <img src="{{ asset('/uploads/product/' . $orderDetail->product->image) }}"
                                        class="card-img-top" style="height: 75px; width:75px" alt="...">
                                </td>
                                <td>{{ $orderDetail->quantity }}</td>
                                <td>{{ number_format($orderDetail->price / $orderDetail->quantity) }} VND</td>
                                <td>{{ number_format($orderDetail->price) }} VND</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="fw-bold text-end" colspan="5">Total Price:</td>
                            <td class="fw-bold" colspan="1">{{ number_format($order->total_price) }} VND</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mb-3">
                <form action="{{ route('admin.order.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4"> <!-- Adjust column size as needed -->
                            <select name="status" id="status" class="form-select">
                                @foreach ($status as $key => $value)
                                    <option value="{{ $key }}" {{ $order->status == $key ? 'selected' : '' }}>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2"> <!-- Adjust column size as needed -->
                            <button type="submit" class="btn btn-secondary">Update Status</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
