<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin JIM SHOP</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body {
            background: #fff !important;
            color: #000 !important;
        }
        /* Sidebar styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            border-right: 1px solid #c7c8c9;
        }

        .sidebar ul.nav flex-column {
            padding-left: 0;
        }

        .sidebar ul.nav.flex-column li.nav-item {
            margin-bottom: 10px;
        }

        .sidebar ul.nav.flex-column li.nav-item a.nav-link {
            color: black;
            padding: 10px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .sidebar ul.nav.flex-column li.nav-item a.nav-link:hover {
            background-color: #000;
            color: #fff;
        }

        .sidebar ul.nav.flex-column li.nav-item a.nav-link.active {
            background: #000 !important;
            color: #fff;
        }

        /* Main content styles */
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .dropdown-menu:hover {
            background-color: #000 !important;
            color: #fff !important;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: #000 !important;
            color: #fff !important;
        }
    </style>
</head>

<body>
    <div id="app">
        <div class="sidebar">
            <div class="container-fluid mt-5 mb-5" style="padding-left: 25px">
                <a class="nav-link" href="{{ route('admin.home') }}">
                    <h4>Admin JIM SHOP</h4>
                </a>
            </div>
            <ul class="nav flex-column" style="padding: 0 20px">
                <li class="nav-item">
                    <a class="nav-link {{ url()->current() == route('admin.home') ? 'active' : '' }}"
                        href="{{ route('admin.home') }}">
                        <i class="bi bi-speedometer me-2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(url()->current(), 'admin/admin') ? 'active' : '' }}"
                        href="{{ route('admin.admin.index') }}">
                        <i class="bi bi-person-fill-gear me-2"></i>
                        Admins
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(url()->current(), 'admin/user') ? 'active' : '' }}"
                        href="{{ route('admin.user.index') }}">
                        <i class="bi bi-person-lines-fill me-2"></i>
                        Users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/ad*') && !Request::is('admin/admin*') ? 'active' : '' }}"
                        href="{{ route('admin.ad.index') }}">
                        <i class="bi bi-badge-ad me-2"></i>
                        Ads
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(url()->current(), 'admin/category') ? 'active' : '' }}"
                        href="{{ route('admin.category.index') }}">
                        <i class="bi bi-bar-chart-steps me-2"></i>
                        Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(url()->current(), 'admin/product') ? 'active' : '' }}"
                        href="{{ route('admin.product.index') }}">
                        <i class="bi bi-ui-checks me-2"></i>
                        Products
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ strpos(url()->current(), 'admin/order') !== false ? 'active' : '' }}" href="{{ route('admin.order.index') }}">
                        <i class="bi bi-inboxes-fill me-2"></i>
                        Orders
                    </a>
                </li>
            </ul>
        </div>

        <div class="main-content">
            <div class="d-flex justify-content-end">
                <ul class="navbar-nav">
                    <!-- Authentication Links -->
                    <li class="nav-item dropdown">
                        <div class="dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href=""
                                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit()">
                                        <i class="bi bi-box-arrow-right"></i>
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="mt-2">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
