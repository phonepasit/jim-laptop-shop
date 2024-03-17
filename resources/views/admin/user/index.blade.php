@extends('layouts.admin')

@section('content')
    <style>
        .card-user-index {
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

        .btn-new-user {
            border-radius: 10px;
            box-shadow: 0 4px 7px -1px rgba(0, 0, 0, 0.11), 0 2px 4px -1px rgba(0, 0, 0, 0.07)
        }

        a {
            text-decoration: none
        }
    </style>

    @php
        $gender = [
            0 => 'Female',
            1 => 'Male'
        ]
    @endphp

    <div class="container py-4">
        <div class="card-user-index row bg-white" style="border-radius: 1rem">
            <div class="table-header d-flex justify-content-between py-3">
                <h4 class="m-0 align-self-center fw-bold">All Users</h4>
                <a href="{{ route('admin.user.create') }}" class="btn-new-user btn bg-black btn-sm mb-0 text-white"
                    type="button">+&nbsp; New User</a>
            </div>
            <div class="p-0">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th style="width: 50px">ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Date Of Birth</th>
                            <th>District</th>
                            <th>Ward</th>
                            <th>Province</th>
                            <th>Address</th>
                            <th style="width: 100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $gender[$user->gender] }}</td>
                                <td>{{ $user->date }}</td>
                                <td>{{ $user->district }}</td>
                                <td>{{ $user->ward }}</td>
                                <td>{{ $user->province }}</td>
                                <td>{{ $user->address }}</td>
                                <td>
                                    <a href="{{ route('admin.user.edit', ['id' => $user->id]) }}" class="me-3">
                                        <i class="bi bi-person-exclamation text-black"></i>
                                    </a>
                                    <form action="{{ route('admin.user.delete', ['id' => $user->id]) }}" method="POST"
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
