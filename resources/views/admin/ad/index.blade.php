@extends('layouts.admin')

@section('content')
    <style>
        .card-ad-index {
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

        .btn-new-ad {
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
        <div class="card-ad-index row bg-white" style="border-radius: 1rem">
            <div class="table-header d-flex justify-content-between py-3">
                <h4 class="m-0 align-self-center fw-bold">All Ads</h4>
                <a href="{{ route('admin.ad.create') }}" class="btn-new-ad btn bg-black btn-sm mb-0 text-white"
                    type="button">+&nbsp; New Ad</a>
            </div>
            <div class="p-0">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th style="width: 50px">ID</th>
                            <th>Name</th>
                            <th>Link</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th style="width: 100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ad as $key => $ad)
                            <tr>
                                <td>{{ $ad->id }}</td>
                                <td>{{ $ad->name }}</td>
                                <td>{{ $ad->url }}</td>
                                <td>
                                    <img src="{{ asset('uploads/Ad/' . $ad->image) }}" height="40px">

                                </td>
                                <td>{{ $active[$ad->active] }}</td>

                                <td>
                                    <a href="{{ route('admin.ad.edit', ['id' => $ad->id]) }}" class="me-3">
                                        <i class="bi bi-person-exclamation text-black"></i>
                                    </a>
                                    <form action="{{ route('admin.ad.delete', ['id' => $ad->id]) }}" method="POST"
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
