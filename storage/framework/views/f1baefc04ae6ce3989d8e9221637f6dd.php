

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<style>
    body {
        background: #f5fbf7;
    }

    .page-title {
        color: #2d6a4f;
        font-weight: 700;
    }

    .section-title {
        color: #2d6a4f;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(45, 106, 79, 0.08);
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(45, 106, 79, 0.15);
    }

    .card-header {
        font-weight: 600;
        border: none;
    }

    /* Varian Hijau Kustom */
    .bg-green-primary {
        background: #2d6a4f !important;
        color: #ffffff !important;
    }

    .bg-green-medium {
        background: #40916c !important;
        color: #ffffff !important;
    }

    .bg-soft-green {
        background: #d8f3dc !important;
        color: #1b4332 !important;
    }

    .bg-soft-green2 {
        background: #b7e4c7 !important;
        color: #1b4332 !important;
    }

    .text-green-dark {
        color: #1b4332 !important;
    }

    .text-green-main {
        color: #2d6a4f !important;
    }

    /* Tabel */
    .table thead {
        background: #d8f3dc;
        color: #2d6a4f;
    }

    .table-hover tbody tr:hover {
        background: #eefbf1;
    }
</style>

<div class="mb-4">
    <h2 class="page-title">
        Ringkasan Hari Ini 
        <small class="fs-6 text-muted font-normal">
            (<?php echo e($tanggalHariIni->translatedFormat('l, d F Y')); ?>)
        </small>
    </h2>
</div>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny', App\Models\User::class)): ?>

<h3 class="section-title">Today's Sales</h3>

<div class="row mb-4">

    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-header bg-green-primary">
                Total Nilai Penjualan Hari Ini
            </div>
            <div class="card-body text-center bg-white py-4">
                <h3 class="text-green-main fw-bold m-0">
                    Rp <?php echo e(number_format($ringkasan['total_penjualan'] ?? 0,0,',','.')); ?>

                </h3>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-header bg-green-primary">
                Jumlah Transaksi Hari Ini
            </div>
            <div class="card-body text-center bg-white py-4">
                <h3 class="text-green-main fw-bold m-0">
                    <?php echo e($ringkasan['total_transaksi'] ?? 0); ?>

                </h3>
            </div>
        </div>
    </div>

</div>

<h3 class="section-title">Cash & Payment Status</h3>

<div class="row mb-5">

    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-header bg-green-medium">
                Total Pembayaran Tunai
            </div>
            <div class="card-body text-center bg-white py-4">
                <h3 class="fw-bold text-green-dark m-0">
                    Rp <?php echo e(number_format($ringkasan['total_cash'] ?? 0,0,',','.')); ?>

                </h3>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-header bg-green-medium">
                Total Pembayaran Non Tunai
            </div>
            <div class="card-body text-center bg-white py-4">
                <h3 class="fw-bold text-green-dark m-0">
                    Rp <?php echo e(number_format($ringkasan['total_non_tunai'] ?? 0,0,',','.')); ?>

                </h3>
            </div>
        </div>
    </div>

</div>

<?php endif; ?>

<h3 class="section-title">Critical Inventory Status</h3>

<div class="row mb-5">

    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-header bg-soft-green d-flex justify-content-between align-items-center">
                <span>Daftar Produk Stok Rendah</span>
                <span class="badge bg-warning text-dark">Peringatan</span>
            </div>
            <div class="card-body bg-white p-3">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th width="10%">#</th>
                            <th>Nama</th>
                            <th width="25%">Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $produkStokRendah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($produkStokRendah->firstItem() + $index); ?></td>
                            <td><?php echo e($produk->nama); ?></td>
                            <td><span class="badge bg-warning text-dark"><?php echo e($produk->stok); ?></span></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="3" class="text-center text-muted py-3">
                                Seluruh produk berada dalam kondisi stok aman.
                            </td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
                <div class="mt-3">
                    <?php echo e($produkStokRendah->links()); ?>

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-header bg-soft-green d-flex justify-content-between align-items-center">
                <span>Produk Habis Stok</span>
                <span class="badge bg-danger">Kritis</span>
            </div>
            <div class="card-body bg-white p-3">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th width="10%">#</th>
                            <th>Nama</th>
                            <th width="25%">Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $produkStokHabis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($produkStokHabis->firstItem() + $index); ?></td>
                            <td><?php echo e($produk->nama); ?></td>
                            <td><span class="badge bg-danger"><?php echo e($produk->stok); ?></span></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="3" class="text-center text-muted py-3">
                                Seluruh produk berada dalam kondisi stok aman.
                            </td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
                <div class="mt-3">
                    <?php echo e($produkStokHabis->links()); ?>

                </div>
            </div>
        </div>
    </div>

</div>

<h3 class="section-title">Best Seller Products</h3>

<div class="card">
    <div class="card-body p-3">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th width="20%">Stok</th>
                    <th width="20%">Unit Terjual</th>
                </tr>
            </thead>
            <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $produkTerlaris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="fw-semibold text-green-dark"><?php echo e($produk->nama); ?></td>
                    <td><?php echo e($produk->stok); ?></td>
                    <td>
                        <span class="badge bg-soft-green2 text-green-dark fs-6 px-3">
                            <?php echo e($produk->total_terjual); ?>

                        </span>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="3" class="text-center text-muted py-3">
                        Belum ada data penjualan.
                    </td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\apk_pos_seni\seni_POS\resources\views/dashboard.blade.php ENDPATH**/ ?>