@extends('layouts.admin')

@section('content')
    <style>
        .card-user-create {
            box-shadow: 0 20px 27px 0 rgba(0, 0, 0, 0.05);
        }
    </style>

    <div class="container py-4">
        <div class="card-user-create row bg-white" style="border-radius: 1rem">
            <div class="table-header d-flex justify-content-between py-3">
                <h4 class="m-0 align-self-center fw-bold">Edit User</h4>
            </div>
            <div class="py-3 px-5">
                <form action="{{ route('admin.user.update', ['id' => $user->id]) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3 row justify-content-center">
                        <label for="name" class="col-sm-2 col-form-label">Name:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Please Enter Name..." value="{{ $user->name }}">
                            @if ($errors->has('name'))
                                <span class="help-block text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row justify-content-center">
                        <label for="email" class="col-sm-2 col-form-label">Email:</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="email" name="email"  placeholder="Please Enter Email..." value="{{ $user->email }}">
                            @if ($errors->has('email'))
                                <span class="help-block text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row justify-content-center">
                        <label for="password" class="col-sm-2 col-form-label">Password:</label>
                        <div class="col-sm-6 input-group w-50">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Please Enter Password...">
                            <button class="input-group-text toggle-password" type="button" data-target="#password">
                                <i class="bi bi-eye-fill"></i>
                            </button>
                            @if ($errors->has('password'))
                                <span class="help-block text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row justify-content-center">
                        <label for="phone" class="col-sm-2 col-form-label">Phone:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Please Enter Phone..." value="{{ $user->phone }}">
                            @if ($errors->has('phone'))
                                <span class="help-block text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                    </div>



                    <div class="mb-3 row justify-content-center">
                        <label for="gender" class="col-sm-2 col-form-label">Gender:</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="gender" id="gender">
                                <option value="" disabled>Please choose gender</option>
                                <option value="0" {{$user->gender == 0 ? 'selected' : ''}}>Female</option>
                                <option value="1" {{$user->gender == 1 ? 'selected' : ''}}>Male</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row justify-content-center">
                        <label for="date" class="col-sm-2 col-form-label">Date Of Birth</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="date" name="date" placeholder="Please Enter Date Of Birth..." value="{{ $user->date }}">
                            @if ($errors->has('date'))
                                <span class="help-block text-danger">{{ $errors->first('date') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row justify-content-center">
                        <label for="district" class="col-sm-2 col-form-label">District:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="district" name="district" placeholder="Please Enter District..." value="{{ $user->district }}">
                            @if ($errors->has('district'))
                                <span class="help-block text-danger">{{ $errors->first('district') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row justify-content-center">
                        <label for="ward" class="col-sm-2 col-form-label">Ward:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="ward" name="ward" placeholder="Please Enter Ward..." value="{{ $user->ward }}">
                            @if ($errors->has('ward'))
                                <span class="help-block text-danger">{{ $errors->first('ward') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row justify-content-center">
                        <label for="province" class="col-sm-2 col-form-label">Province:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="province" name="province" placeholder="Please Enter Province..." value="{{ $user->province }}">
                            @if ($errors->has('province'))
                                <span class="help-block text-danger">{{ $errors->first('province') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row justify-content-center">
                        <label for="address" class="col-sm-2 col-form-label">Address:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="address" name="address" placeholder="Please Enter Address..."  value="{{ $user->address }}">
                            @if ($errors->has('address'))
                                <span class="help-block text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 mt-5 row d-flex">
                        <div class="col-sm offset-sm-2">
                            <a href="{{ route('admin.user.index') }}" class="btn btn-light border">Back</a>
                        </div>

                        <div class="col-sm offset-sm-2">
                            <button type="submit" class="btn btn-dark text-white">Update User</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="module">
        $(document).ready(function() {
            $('.toggle-password').click(function() {
                $(this).toggleClass('active');
                var input = $($(this).attr('data-target'));
                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    $(this).find('i').removeClass('bi-eye-fill').addClass('bi-eye-slash-fill');
                } else {
                    input.attr('type', 'password');
                    $(this).find('i').removeClass('bi-eye-slash-fill').addClass('bi-eye-fill');
                }
            });
        });
    </script>
@endsection
