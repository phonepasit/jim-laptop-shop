@extends('layouts.admin')

@section('content')
    <style>
        .card-banner-index {
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

        .btn-new-banner {
            border-radius: 10px;
            box-shadow: 0 4px 7px -1px rgba(0, 0, 0, 0.11), 0 2px 4px -1px rgba(0, 0, 0, 0.07)
        }

        a {
            text-decoration: none
        }
    </style>

    @php

        $active = [
            0 => 'Không hoạt động',
            1 => 'Hoạt động',
        ];

    @endphp

    <div class="container py-4">
        <div class="card-banner-index row bg-white" style="border-radius: 1rem">
            <div class="table-header d-flex justify-content-between py-3">
                <h4 class="m-0 align-self-center fw-bold">All Banners</h4>
                <a href="{{ route('admin.banner.create') }}" class="btn-new-banner btn bg-black btn-sm mb-0 text-white"
                    type="button">+&nbsp; New Banner</a>
            </div>
            <div class="p-0">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th style="width: 50px">ID</th>
                            <th>Tiêu Đề</th>
                            <th>Link</th>
                            <th>Ảnh</th>
                            <th>Thứ tự</th>
                            <th>Trạng Thái</th>
                            <th style="width: 100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banner as $key => $banner)
                            <tr>
                                <td>{{ $banner->id }}</td>
                                <td>{{ $banner->name }}</td>
                                <td>{{ $banner->url }}</td>
                                <td>
                                    <img src="{{ asset('uploads/Banner/' . $banner->image) }}" height="40px">

                                </td>
                                <td>{{ $banner->sort_by }}</td>
                                <td>{{ $active[$banner->active] }}</td>

                                <td>
                                    <a href="{{ route('admin.banner.edit', ['id' => $banner->id]) }}" class="me-3">
                                        <i class="bi bi-person-exclamation text-black"></i>
                                    </a>
                                    <form action="{{ route('admin.banner.delete', ['id' => $banner->id]) }}" method="POST"
                                        class="d-inline-block">
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
