

<?php $__env->startSection('title', 'Profil Midori Bakery'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="profile-hero text-center py-5 bg-light">
        <h1>Profil Midori Bakery</h1>
        <p>Mengenal lebih dekat perjalanan rasa, dedikasi kuliner, dan komitmen mutu terbaik kami.</p>
    </div>

    <!-- Section Cards -->
    <div class="container my-5">
        <div class="row g-4">
            <!-- Card 1: Cerita Kami -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-3 text-success fs-1">
                            <i class="bi bi-shop"></i>
                        </div>
                        <h4 class="card-title fw-bold mb-3">Cerita Kami</h4>
                        <p class="card-text text-muted">
                            Berdiri sejak tahun 2020, Midori Bakery berawal dari dapur rumahan dengan impian menghadirkan roti berkualitas tinggi, lembut, dan berbahan alami untuk seluruh keluarga.
                        </p>
                    </div>
                </div>
            </div>

            
            
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\seni_POS\resources\views/sejarah-visi-misi.blade.php ENDPATH**/ ?>