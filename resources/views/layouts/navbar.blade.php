<nav class="navbar navbar-expand-lg shadow-sm" style="background:#2E7D32;">
    <div class="container">

        <a class="navbar-brand fw-bold text-white" href="{{ route('dashboard') }}">
            🌿 POS
        </a>

        <button class="navbar-toggler bg-white"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>


        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-4">

                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('dashboard') ? 'fw-bold' : '' }}"
                       href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('admin/users') ? 'fw-bold' : '' }}"
                       href="{{ route('admin.users') }}">
                        Users
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('produk*') ? 'fw-bold' : '' }}"
                       href="{{ route('produk.index') }}">
                        Produk
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('penjualan*') ? 'fw-bold' : '' }}"
                       href="{{ route('penjualan.index') }}">
                        Penjualan
                    </a>
                </li>

            </ul>


            <form class="ms-auto"
                  action="{{ route('logout') }}"
                  method="POST">

                @csrf

                <button class="btn btn-light text-success fw-bold">
                    Logout
                </button>

            </form>


        </div>

    </div>
</nav>