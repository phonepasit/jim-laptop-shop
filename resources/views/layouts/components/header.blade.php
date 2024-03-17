<div class="container-lg d-flex align-items-center justify-content-between">
    <!-- Name Brand - Left -->
    <div class="name-brand text-white"> <!-- Added text-white class here -->
        <h1>JIM SHOP</h1>
    </div>

    <!-- Content and Services - Center -->
    <div class="content-services text-center d-flex">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="">Services</a>
            </li>
        </ul>
    </div>

    <!-- Sign In - Right -->
    <div class="sign-in">
        <ul class="nav ms-auto">

            <li class="nav-item d-flex" style="padding: 0 8px">
                <a href="" class="nav-link position-relative d-flex align-items-center border rounded-1">
                    <i class="bi bi-basket text-white"></i>
                    <span class="ms-3 text-white">{{ count(session('cart', [])) }}</span>
                </a>
            </li>

            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link text-white" href="">Đăng Nhập</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link text-white" href="">Đăng ký</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-white" href=""
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        </a>

                        <form id="logout-form" action="" method="POST" class="d-none">
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</div>
