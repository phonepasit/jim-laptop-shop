<div class="d-flex justify-content-center">
    <div class="card border-0 shadow-lg w-50 px-4 py-3">
        <h3 class="text-center fw-bold mb-3">USER INFORMATION</h3>

        <form method="POST" action="{{ route('edit-user-update', ['id' => $user->id]) }}">
            @csrf
            @method('put')

            <div class="row mb-3">
                <div class="col">
                    <label for="name" class="form-label fw-bold">Tên:</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ $user->name }}" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col">
                    <label for="email" class="form-label fw-bold">Email:</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ $user->email }}" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="password" class="form-label fw-bold">Mật Khẩu:</label>
                    <input type="password" class="form-control" id="password" name="password"
                        value="{{ old('password') }}" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col">
                    <label for="password_confirmation" class="form-label fw-bold">Xác nhận Mật Khẩu:</label>
                    <input type="password" class="form-control" id="password_confirmation"
                        name="password_confirmation" required>
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="phone" class="form-label fw-bold">Số Điện Thoại:</label>
                    <input type="text" class="form-control" id="phone" name="phone"
                        value="{{ $user->phone }}" required>
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label fw-bold" for="gender">Giới tính:</label>
                    <select class="form-select" id="gender" name="gender" required>
                        <option value="" selected disabled>Chọn giới tính</option>
                        <option value="1" {{ $user->gender == '1' ? 'selected' : '' }}>Nam</option>
                        <option value="0" {{ $user->gender == '0' ? 'selected' : '' }}>Nữ</option>
                    </select>
                    @error('gender')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="date" class="form-label fw-bold">Ngày Sinh:</label>
                    <input type="date" class="form-control" id="date" name="date"
                        value="{{ $user->date }}" required>
                    @error('date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col">
                    <label for="district" class="form-label fw-bold">Huyện:</label>
                    <input type="text" class="form-control" id="district" name="district"
                        value="{{ $user->district }}" required>
                    @error('district')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="ward" class="form-label fw-bold">Phường:</label>
                    <input type="text" class="form-control" id="ward" name="ward"
                        value="{{ $user->ward }}" required>
                    @error('ward')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col">
                    <label for="province" class="form-label fw-bold">Tỉnh:</label>
                    <input type="text" class="form-control" id="province" name="province"
                        value="{{ $user->province }}" required>
                    @error('province')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <label for="address" class="form-label fw-bold">Địa chỉ:</label>
                    <input type="text" class="form-control" id="address" name="address"
                        value="{{ $user->address }}" required>
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <button type="button" class="btn btn-danger w-100 mt-1">
                        <a href="/" class="text-white text-decoration-none">
                            Cancel
                        </a>
                    </button>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-secondary w-100 mt-1">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
