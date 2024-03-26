<style>
    .form-signin {
        max-width: 330px;
        padding:15px;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-signin input[type="text"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

    .form-signin input[type="checkbox"] {
        margin-right: 6px;
        margin-top: 0.3em;
    }
</style>

<div class="text-center" style="margin-top: 100px; margin-bottom: 100px">
    <div class="form-signin w-100 m-auto text-center">

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <h1 class="h3 mb-3 fw-bold">LOGIN</h1>

            <div class="form-floating">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror bg-white"
                    name="email" value="{{ old('email') }}" required placeholder="Email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label for="email">Email</label>
            </div>

            <div class="form-floating">
                <input id="password" type="password"
                    class="form-control @error('password') is-invalid @enderror bg-white" name="password" required
                    autocomplete="current-password" placeholder="Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label for="password">Password</label>
            </div>

            <div class="checkbox mb-3">
                <input class="form-check-input" type="checkbox"name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    Remember Me
                </label>
            </div>

            <div>
                <button type="submit" class="w-100 btn btn-lg btn-primary">
                    Login
                </button>
            </div>
        </form>
    </div>
</div>
