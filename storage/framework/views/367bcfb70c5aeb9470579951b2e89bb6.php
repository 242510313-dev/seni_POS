<style>
    .custom-navbar {
        background: #2E7D32;
        border-radius: 24px;
        margin: 18px auto 30px;
        padding: 10px 18px;
        box-shadow: 0 8px 25px rgba(46, 125, 50, 0.18);
    }

    .custom-navbar .navbar-brand {
        color: #ffffff !important;
        font-weight: 700;
        font-size: 17px;
        display: flex;
        align-items: center;
        gap: 8px;
        white-space: nowrap;
    }

    .brand-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #ffffff;
        color: #2E7D32;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 20px;
    }

    .brand-text {
        line-height: 1.1;
    }

    .brand-subtitle {
        display: block;
        font-size: 10px;
        font-weight: 500;
        opacity: .8;
        margin-top: 2px;
    }

    .custom-navbar .navbar-nav {
        gap: 5px;
    }

    .custom-navbar .nav-link {
        color: #ffffff !important;
        border-radius: 25px;
        padding: 10px 15px !important;

        font-size: 14px;
        font-weight: 500;

        transition: all .2s ease;
    }

    .custom-navbar .nav-link:hover {
        background: rgba(255, 255, 255, .18);
    }

    .custom-navbar .nav-link.active,
    .custom-navbar .nav-link.fw-bold {
        background: #ffffff;
        color: #2E7D32 !important;
        font-weight: 700 !important;
    }

    .navbar-user {
        background: rgba(255, 255, 255, .16);
        color: #ffffff;

        border-radius: 25px;
        padding: 9px 15px;

        font-size: 13px;
        font-weight: 600;

        white-space: nowrap;
    }

    .logout-btn {
        border: none;
        border-radius: 25px;

        background: #ffffff;
        color: #2E7D32;

        padding: 10px 18px;

        font-size: 14px;
        font-weight: 700;

        transition: all .2s ease;
    }

    .logout-btn:hover {
        background: #f1f8f2;
        color: #2E7D32;
        transform: translateY(-1px);
    }

    .navbar-toggler {
        border: none;
        border-radius: 10px;
        padding: 7px 10px;
    }

    .navbar-toggler:focus {
        box-shadow: none;
    }

    @media (max-width: 991px) {

        .custom-navbar {
            margin: 12px 12px 25px;
            border-radius: 18px;
        }

        .custom-navbar .navbar-collapse {
            padding-top: 15px;
        }

        .custom-navbar .navbar-nav {
            gap: 3px;
        }

        .custom-navbar .nav-link {
            padding: 10px 13px !important;
        }

        .navbar-user {
            display: inline-block;
            margin-top: 12px;
        }

        .logout-btn {
            margin-top: 12px;
            width: 100%;
        }
    }
</style>


<nav class="navbar navbar-expand-lg custom-navbar">

    <div class="container-fluid">

        
        <a class="navbar-brand"
           href="<?php echo e(route('dashboard')); ?>">

            <span class="brand-icon">
                🥐
            </span>

            <span class="brand-text">
                Midori Bakery
                <span class="brand-subtitle">
                    Bakery & Tea
                </span>
            </span>

        </a>


        
        <button class="navbar-toggler bg-white"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>


        <div class="collapse navbar-collapse"
             id="navbarNav">


            
            <ul class="navbar-nav ms-lg-4 mt-3 mt-lg-0">

                
                <li class="nav-item">

                    <a class="nav-link
                        <?php echo e(Request::is('dashboard') ? 'fw-bold' : ''); ?>"
                       href="<?php echo e(route('dashboard')); ?>">

                        <i class="bi bi-speedometer2 me-1"></i>
                        Dashboard

                    </a>

                </li>


                
                <li class="nav-item">

                    <a class="nav-link
                        <?php echo e(Request::is('admin/users') ? 'fw-bold' : ''); ?>"
                       href="<?php echo e(route('admin.users')); ?>">

                        <i class="bi bi-people-fill me-1"></i>
                        Users

                    </a>

                </li>


                
                <li class="nav-item">

                    <a class="nav-link
                        <?php echo e(Request::is('jenis*') ? 'fw-bold' : ''); ?>"
                       href="<?php echo e(route('jenis.index')); ?>">

                        <i class="bi bi-tags-fill me-1"></i>
                        Jenis

                    </a>

                </li>


                
                <li class="nav-item">

                    <a class="nav-link
                        <?php echo e(Request::is('produk*') ? 'fw-bold' : ''); ?>"
                       href="<?php echo e(route('produk.index')); ?>">

                        <i class="bi bi-box-seam-fill me-1"></i>
                        Produk

                    </a>

                </li>


                
                <li class="nav-item">

                    <a class="nav-link
                        <?php echo e(Request::is('penjualan*') ? 'fw-bold' : ''); ?>"
                       href="<?php echo e(route('penjualan.index')); ?>">

                        <i class="bi bi-cart-check-fill me-1"></i>
                        Penjualan

                    </a>

                </li>


                
                <li class="nav-item">

                    <a class="nav-link
                        <?php echo e(Request::is('tentang*') ? 'fw-bold' : ''); ?>"
                       href="<?php echo e(route('tentang')); ?>">

                        <i class="bi bi-info-circle-fill me-1"></i>
                        Tentang

                    </a>

                </li>

            </ul>


            
            <div class="ms-lg-auto d-flex flex-column flex-lg-row align-items-lg-center gap-2 mt-3 mt-lg-0">

                <?php if(auth()->guard()->check()): ?>

                    <div class="navbar-user">

                        <i class="bi bi-person-circle me-1"></i>

                        Hai, <?php echo e(auth()->user()->name); ?>


                    </div>

                <?php endif; ?>


                <form action="<?php echo e(route('logout')); ?>"
                      method="POST"
                      class="m-0">

                    <?php echo csrf_field(); ?>

                    <button type="submit"
                            class="logout-btn">

                        <i class="bi bi-box-arrow-right me-1"></i>
                        Logout

                    </button>

                </form>

            </div>

        </div>

    </div>

</nav>
<?php /**PATH C:\laragon\www\seni_POS\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>