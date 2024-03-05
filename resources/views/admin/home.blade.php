@extends('layouts.admin')

@section('content')
    <style>
        .card {
            border: 0;
            background: black;
            box-shadow: 0 20px 27px 0 rgba(0, 0, 0, .05);
            border-radius: 10px;
        }
    </style>
    <div class="d-flex mt-5">
        <div class="col-xl col-sm-6 mb-xl-0 mb-4 mx-3">
            <div class="card">
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold text-white">Total Admins:</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <strong class="text-white">{{ $admin }}</strong>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <div class="text-center shadow bg-white text-center d-flex align-items-center justify-content-center w-100"
                                style="border-radius: 10px">
                                <i class="bi bi-person-fill-gear"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl col-sm-6 mb-xl-0 mb-4 mx-3">
            <div class="card">
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold text-white">Total Users:</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <strong class="text-white">{{ $user }}</strong>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <div class="text-center shadow bg-white text-center d-flex align-items-center justify-content-center w-100"
                                style="border-radius: 10px">
                                <i class="bi bi-person-lines-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl col-sm-6 mb-xl-0 mb-4 mx-3">
            <div class="card">
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold text-white">Total Products:</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <strong class="text-white">{{ $product }}</strong>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <div class="text-center shadow bg-white text-center d-flex align-items-center justify-content-center w-100"
                                style="border-radius: 10px">
                                <i class="bi bi-ui-checks"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl col-sm-6 mb-xl-0 mb-4 mx-3">
            <div class="card">
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold text-white">Total Order:</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <strong class="text-white">
                                        15
                                    </strong>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <div class="text-center shadow bg-white text-center d-flex align-items-center justify-content-center w-100"
                                style="border-radius: 10px">
                                <i class="bi bi-inboxes-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
