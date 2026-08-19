

<?php $__env->startSection('title', 'Penjualan'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php if(session('errors')): ?>


    <div class="alert alert-danger">
        <?php echo e(session('errors')); ?>

    </div>
<?php endif; ?>

<h1>Halaman Penjualan</h1>

<a href="<?php echo e(route('penjualan.create')); ?>" class="btn btn-primary mb-3">Create</a>

<form action="<?php echo e(route('penjualan.index')); ?>" method="GET" class="mb-3">
    <div class="input-group">
        <input
            type="text"
            name="search"
            value="<?php echo e(request()->search); ?>"
            class="form-control"
            placeholder="Search penjualan"
        >
        <button class="btn btn-outline-secondary" type="submit">
            Search
        </button>
    </div>
</form>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal Transaksi</th>
            <th scope="col">Kasir</th>
            <th scope="col">Total Pembayaran</th>
            <th scope="col">Metode Pembayaran</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <th scope="row"><?php echo e($sales->firstItem() + $loop->index); ?></th>
            <td><?php echo e($sale->created_at->translatedFormat('d-m-Y H:i:s')); ?></td>
            <td><?php echo e($sale->user->name); ?></td>
            <td>Rp.<?php echo e(number_format($sale->total_pembayaran)); ?></td>
            <td><?php echo e($sale->metode_pembayaran); ?></td>
            <td><?php echo e($sale->status); ?></td>
            <td class="d-flex gap-1">

            <a href="<?php echo e(route('penjualan.show', $sale)); ?>" class="btn btn-primary">
    Detail
</a>
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $sale)): ?>
                ||
                <a href="<?php echo e(route('penjualan.edit', $sale)); ?>" class="btn btn-warning">Edit</a>
                ||
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $sale)): ?>
                <form action="<?php echo e(route('penjualan.destroy', $sale)); ?>" method="POST" class="d-inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus penjualan ini?')">
                        Hapus
                    </button>
                </form>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="7" class="text-center">Data Tidak Ditemukan</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>

<div class="d-flex justify-content-between align-items-center mt-4">

    <div class="text-muted small">
        Menampilkan
        <strong><?php echo e($sales->firstItem() ?? 0); ?></strong>
        -
        <strong><?php echo e($sales->lastItem() ?? 0); ?></strong>
        dari
        <strong><?php echo e($sales->total()); ?></strong>
        user
    </div>

    <?php if($sales->hasPages()): ?>
        <nav aria-label="Pagination">
            <ul class="pagination mb-0">

                
                <?php if($sales->onFirstPage()): ?>
                    <li class="page-item disabled">
                        <span class="page-link">
                            <i class="bi bi-chevron-left"></i>
                        </span>
                    </li>
                <?php else: ?>
                    <li class="page-item">
                        <a class="page-link"
                           href="<?php echo e($sales->previousPageUrl()); ?>">
                            <i class="bi bi-chevron-left"></i>
                        </a>
                    </li>
                <?php endif; ?>

                
                <?php $__currentLoopData = $sales->getUrlRange(1,$sales->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php if($page == $sales->currentPage()): ?>
                        <li class="page-item active">
                            <span class="page-link">
                                <?php echo e($page); ?>

                            </span>
                        </li>
                    <?php else: ?>
                        <li class="page-item">
                            <a class="page-link"
                               href="<?php echo e($url); ?>">
                                <?php echo e($page); ?>

                            </a>
                        </li>
                    <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
                <?php if($sales->hasMorePages()): ?>
                    <li class="page-item">
                        <a class="page-link"
                           href="<?php echo e($sales->nextPageUrl()); ?>">
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="page-item disabled">
                        <span class="page-link">
                            <i class="bi bi-chevron-right"></i>
                        </span>
                    </li>
                <?php endif; ?>

            </ul>
        </nav>
    <?php endif; ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\seni_POS\resources\views/penjualan/index.blade.php ENDPATH**/ ?>