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
                <h4 class="m-0 align-self-center fw-bold">All Orders</h4>
            </div>
            <div class="p-0">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th style="width: 50px">ID</th>
                            <th>Name User</th>
                            <th>Note</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Order Date</th>
                            <th style="width: 100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $order)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->note }}</td>
                            <td>{{ number_format($order->total_price) }} VND</td>
                            <td>{{ $status[$order->status] }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.order.edit', ['id' => $order->id]) }}" class="btn btn-secondary btn-sm">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
