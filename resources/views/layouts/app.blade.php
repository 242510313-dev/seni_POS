<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-light">

<!-- <nav class="navbar navbar-expand-lg shadow-sm" style="background:#2E7D32;">
    <div class="container">

        <a class="navbar-brand fw-bold text-white" href="{{ Route::has('dashboard') ? route('dashboard') : '#' }}">
            🌿 POS
        </a>

        <button class="navbar-toggler bg-white" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-4">

                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ Route::has('dashboard') ? route('dashboard') : '#' }}">
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ Route::has('admin.users') ? route('admin.users') : '#' }}">
                        Users
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ Route::has('produk.index') ? route('produk.index') : '#' }}">
                        Produk
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ Route::has('penjualan.index') ? route('penjualan.index') : '#' }}">
                        Penjualan
                    </a>
                </li>

            </ul>

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <form action="{{ Route::has('logout') ? route('logout') : '#' }}" method="POST">

                        @csrf

                        <button type="submit" class="btn btn-light text-success fw-bold">
                            Logout
                        </button>

                    </form>
                </li>

            </ul>

        </div>

    </div>
</nav> -->

<div class="container py-4">

    @if(session('success'))

        <div class="alert alert-success rounded-4 shadow-sm">

            {{ session('success') }}

        </div>

    @endif

    @yield('content')

</div>

</body>
</html>