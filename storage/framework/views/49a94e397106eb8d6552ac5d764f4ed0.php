

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            
            <div class="card border-0 rounded-4 shadow-sm mb-4 overflow-hidden"
                 style="
                    background-image:
                        linear-gradient(
                            rgba(145, 190, 148, 0.78),
                            rgba(80, 130, 85, 0.72)
                        ),
                        url('<?php echo e(asset('images/tentang-pos.jpg')); ?>');
                    background-size: cover;
                    background-position: center;
                    min-height: 280px;
                ">

                <div class="card-body p-4 p-md-5 text-center d-flex flex-column justify-content-center align-items-center">

                    
                    <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm mb-3"
                         style="width: 70px; height: 70px;">
                        <span style="font-size: 2rem;">🍵</span>
                    </div>

                    
                    <h2 class="fw-bold mb-2 text-white">
                        Tentang Aplikasi POS
                    </h2>

                    
                    <p class="mb-0 text-white fw-medium">
                        Solusi Manajemen Kasir & Stok Ringan
                    </p>

                </div>
            </div>


            
            <div class="card border-0 rounded-4 shadow-sm"
                 style="background-color: #ffffff;">

                <div class="card-body p-4 p-md-5">

                    <h5 class="fw-semibold mb-3"
                        style="color: #557D58;">
                        Deskripsi Sistem
                    </h5>

                    <p class="lh-lg mb-4"
                       style="color: #5a6e5f; font-size: 0.95rem;">

                        Aplikasi Point of Sale (POS) ini dirancang khusus
                        untuk mempermudah operasional harian usaha Anda.
                        Mulai dari pencatatan data produk, pemantauan status
                        inventaris, hingga pembuatan laporan transaksi
                        penjualan—semuanya dikelola dalam satu platform
                        yang responsif dan efisien.

                    </p>


                    
                    <div class="p-3 rounded-3 mb-4"
                         style="
                            background-color: #f1f8f2;
                            border-left: 4px solid #8FBC92;
                         ">

                        <span class="d-block text-muted small">
                            Catatan Sistem
                        </span>

                        <span class="small"
                              style="color: #5F9163;">

                            Semua data tersinkronisasi secara langsung
                            untuk meminimalkan selisih stok.

                        </span>

                    </div>


                    <hr class="my-4"
                        style="border-color: #E0ECE1;">


                    
                    <div class="row g-3">

                        <div class="col-sm-6">

                            <div class="p-3 rounded-3"
                                 style="
                                    background-color: #fafafa;
                                    border: 1px solid #E4EFE4;
                                 ">

                                <div class="text-muted small mb-1">
                                    Versi Sistem
                                </div>

                                <div class="fw-bold"
                                     style="color: #5F9163;">

                                    v1.0.0 (Stable)

                                </div>

                            </div>

                        </div>


                        <div class="col-sm-6">

                            <div class="p-3 rounded-3"
                                 style="
                                    background-color: #fafafa;
                                    border: 1px solid #E4EFE4;
                                 ">

                                <div class="text-muted small mb-1">
                                    Pengembang
                                </div>

                                <div class="fw-bold"
                                     style="color: #5F9163;">

                                    Tim Pengembang POS

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>


            
            <div class="text-center mt-4">

                <small style="color: #8FBC92;">
                    &copy; <?php echo e(date('Y')); ?> POS System.
                    All rights reserved.
                </small>

            </div>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\seni_POS\resources\views/tentang.blade.php ENDPATH**/ ?>