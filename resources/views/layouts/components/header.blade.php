<style>
    .header:hover {
        color: black !important;
    }

    .cart-header {
        background: none !important;
    }
</style>

<div class="container-lg d-flex align-items-center justify-content-between">
    <!-- Name Brand - Left -->
    <div class="name-brand text-white">
        <h1>
            <a href="/" class="text-white text-decoration-none">JIM SHOP</a>
        </h1>
    </div>

    <!-- Sign In - Right -->
    <div class="sign-in">
        <ul class="nav ms-auto">

            <li class="nav-item header d-flex" style="padding: 0 8px">
                <a href="{{ route('cart') }}" class="nav-link cart-header position-relative d-flex align-items-center border rounded-1">
                    <i class="bi bi-basket text-white"></i>
                    <span class="ms-3 text-white">{{ count(session('cart', [])) }}</span>
                </a>
            </li>

            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link header text-white" href="{{ route('login') }}">Login</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link header text-white" href="{{ route('register') }}">Register</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link cart-header dropdown-toggle text-white" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item cart-header text-dark" href="{{ route('edit-user') }}" data-bs-target="#userInfoModal">
                            User information
                        </a>
                        <a class="dropdown-item cart-header text-dark" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</div>
