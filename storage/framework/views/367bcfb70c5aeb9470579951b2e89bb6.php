<nav class="navbar navbar-expand-lg shadow-sm" style="background:#2E7D32;">
    <div class="container">

        <a class="navbar-brand fw-bold text-white" href="<?php echo e(route('dashboard')); ?>">
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
                    <a class="nav-link text-white <?php echo e(Request::is('dashboard') ? 'fw-bold' : ''); ?>"
                       href="<?php echo e(route('dashboard')); ?>">
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white <?php echo e(Request::is('admin/users') ? 'fw-bold' : ''); ?>"
                       href="<?php echo e(route('admin.users')); ?>">
                        Users
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white <?php echo e(Request::is('produk*') ? 'fw-bold' : ''); ?>"
                       href="<?php echo e(route('produk.index')); ?>">
                        Produk
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white <?php echo e(Request::is('penjualan*') ? 'fw-bold' : ''); ?>"
                       href="<?php echo e(route('penjualan.index')); ?>">
                        Penjualan
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white <?php echo e(Request::is('tentang*') ? 'fw-bold' : ''); ?>"
                       href="<?php echo e(route('tentang')); ?>">
                        Tentang
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white <?php echo e(Request::is('jenis*') ? 'fw-bold' : ''); ?>"
                       href="<?php echo e(route('jenis.index')); ?>">
                        Jenis
                    </a>
                </li>

            </ul>

            <form class="ms-auto"
                  action="<?php echo e(route('logout')); ?>"
                  method="POST">
                <?php echo csrf_field(); ?>
                <button class="btn btn-light text-success fw-bold">
                    Logout
                </button>
            </form>

        </div>

    </div>
</nav><?php /**PATH C:\laragon\www\seni_POS\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>