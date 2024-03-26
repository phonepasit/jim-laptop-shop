<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>JIM SHOP</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        #app {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }
    </style>
</head>

<body>
    <div id="app">
        {{-- Header --}}
        <header class="bg-dark">
            @include('layouts.components.header')
        </header>

        @switch(true)
            @case(request()->is('/') || request()->is('search*'))
                {{-- Category & Slide --}}
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-4">
                            @include('layouts.components.navbar')
                        </div>

                        <div class="col-8">
                            @include('layouts.components.ad')
                        </div>
                    </div>
                </div>

                {{-- Main --}}
                <main class="container">
                    @include('web.product')
                </main>

                @break

            @case(request()->is('category/*'))
                {{-- Category & Slide --}}
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-4">
                            @include('layouts.components.navbar')
                        </div>

                        <div class="col-8">
                            @include('layouts.components.ad')
                        </div>
                    </div>
                </div>

                {{-- Main --}}
                <main class="container">
                    @include('web.productWithCategory')
                </main>

                @break

            @case(request()->is('product-detail/*'))
                {{-- Main --}}
                <main class="container my-4">
                    @include('web.productDetail')
                </main>

                @break

            @case(request()->is('cart*'))
                {{-- Main --}}
                <main class="container my-4">
                    @include('web.cart')
                </main>

                @break

            @case(request()->is('login*'))
                {{-- Main --}}
                <main class="container my-4">
                    @include('web.auth.login')
                </main>

                @break

            @case(request()->is('register*'))
                {{-- Main --}}
                <main class="container my-4">
                    @include('web.auth.register')
                </main>

                @break

            @case(request()->is('edit-user*'))
                {{-- Main --}}
                <main class="container my-4">
                    @include('web.editUser')
                </main>

                @break

        @endswitch

        {{-- Footer --}}
        <footer class="bg-dark text-white py-5">
            @include('layouts.components.footer')
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                toastr.success("{{ session('success') }}");
            @endif

            @if (session('error'))
                toastr.error("{{ session('error') }}");
            @endif
        });
    </script>
</body>

</html>
