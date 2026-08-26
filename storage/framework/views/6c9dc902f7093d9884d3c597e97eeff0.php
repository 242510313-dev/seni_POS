

<?php $__env->startSection('title', 'Penjualan'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<style>
    body {
        background: #f5fbf7;
    }

    .penjualan-wrapper {
        padding-top: 35px;
        padding-bottom: 50px;
    }

    .penjualan-title {
        color: #9ACF9D;
        font-size: 38px;
        font-weight: 700;
        margin-bottom: 22px;
    }

    /* ALERT */
    .alert-danger {
        border: none;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    /* CREATE */
    .btn-create {
        background: #78B77D;
        border: none;
        color: white;
        font-weight: 600;
        border-radius: 6px;
        padding: 8px 14px;
    }

    .btn-create:hover {
        background: #68A96E;
        color: white;
    }

    /* SEARCH */
    .search-box {
        background: white;
        border: 1px solid #dcebdd;
        border-radius: 10px;
        overflow: hidden;
    }

    .search-box .form-control {
        border: none;
        box-shadow: none;
        padding: 10px 12px;
    }

    .search-box .form-control:focus {
        box-shadow: none;
    }

    .btn-search {
        background: #ffffff;
        border: 1px solid #7d8b96;
        color: #6b7780;
        border-radius: 0 8px 8px 0;
        padding: 8px 15px;
    }

    .btn-search:hover {
        background: #f4f8f5;
        color: #4f8755;
    }

    /* TABLE CARD */
    .penjualan-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        border: none;
        box-shadow: 0 4px 15px rgba(45, 106, 79, 0.06);
    }

    .penjualan-table {
        margin: 0;
    }

    .penjualan-table thead {
        background: #ffffff;
    }

    .penjualan-table thead th {
        color: #86BD8B;
        font-weight: 600;
        font-size: 14px;
        border-bottom: 1px solid #e1e8e2;
        padding: 13px 10px;
        white-space: nowrap;
    }

    .penjualan-table tbody td,
    .penjualan-table tbody th {
        padding: 14px 10px;
        vertical-align: middle;
        border-bottom: 1px solid #e1e5e8;
        font-size: 14px;
    }

    .penjualan-table tbody tr:last-child td,
    .penjualan-table tbody tr:last-child th {
        border-bottom: none;
    }

    .penjualan-table tbody tr:hover {
        background: #f8fcf8;
    }

    /* TOTAL */
    .total-pembayaran {
        white-space: nowrap;
        color: #111111;
    }

    /* STATUS */
    .status-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .status-completed {
        background: #d9f2dc;
        color: #4f8755;
    }

    .status-open {
        background: #fff0d5;
        color: #a87520;
    }

    .status-cancelled {
        background: #fde0e0;
        color: #c44545;
    }

    .status-default {
        background: #edf1ee;
        color: #68736c;
    }

    /* METODE PEMBAYARAN */
    .payment-method {
        font-weight: 500;
        color: #111111;
    }

    /* BUTTON */
    .btn-detail {
        background: #78B77D;
        border: none;
        color: white;
        font-weight: 600;
        border-radius: 6px;
        padding: 8px 13px;
    }

    .btn-detail:hover {
        background: #68A96E;
        color: white;
    }

    .btn-edit {
        background: #69B96F;
        border: none;
        color: white;
        font-weight: 600;
        border-radius: 6px;
        padding: 8px 13px;
    }

    .btn-edit:hover {
        background: #5EAA64;
        color: white;
    }

    .btn-hapus {
        background: #F05252;
        border: none;
        color: white;
        font-weight: 600;
        border-radius: 6px;
        padding: 8px 13px;
    }

    .btn-hapus:hover {
        background: #dc4444;
        color: white;
    }

    .aksi {
        white-space: nowrap;
    }

    .aksi-separator {
        color: #777;
        margin: 0 3px;
    }

    /* PAGINATION */
    .pagination-wrapper {
        padding: 18px 20px;
        background: white;
        border-top: 1px solid #e5e9e6;
    }

    .pagination .page-link {
        color: #6e7b83;
        border-color: #dce3e0;
    }

    .pagination .page-item.active .page-link {
        background: #83C987;
        border-color: #83C987;
        color: white;
    }

    .pagination .page-link:hover {
        background: #eef8ef;
        color: #4f8755;
    }

    .pagination .page-item.disabled .page-link {
        color: #b5bdb8;
        background: #f5f7f6;
    }

    /* EMPTY */
    .empty-data {
        padding: 40px !important;
        color: #8b9690;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {

        .penjualan-title {
            font-size: 30px;
        }

        .penjualan-card {
            overflow-x: auto;
        }

        .penjualan-table {
            min-width: 1050px;
        }

        .pagination-wrapper {
            min-width: 1050px;
        }
    }
</style>


<div class="container penjualan-wrapper">

    
    <?php if(session('errors')): ?>

        <div class="alert alert-danger">
            <?php echo e(session('errors')); ?>

        </div>

    <?php endif; ?>


    
    <h1 class="penjualan-title">
        Halaman Penjualan
    </h1>


    
    <div class="mb-3">

        <a href="<?php echo e(route('penjualan.create')); ?>"
           class="btn btn-create">

            Create

        </a>

    </div>


    
    <form action="<?php echo e(route('penjualan.index')); ?>"
          method="GET"
          class="mb-3">

        <div class="input-group search-box">

            <input
                type="text"
                name="search"
                value="<?php echo e(request('search')); ?>"
                class="form-control"
                placeholder="Search penjualan"
            >

            <button class="btn btn-search"
                    type="submit">

                Search

            </button>

        </div>

    </form>


    
    <div class="penjualan-card">

        <table class="table penjualan-table align-middle">

            <thead>

                <tr>

                    <th width="50">
                        #
                    </th>

                    <th>
                        Tanggal Transaksi
                    </th>

                    <th>
                        Kasir
                    </th>

                    <th>
                        Total Pembayaran
                    </th>

                    <th>
                        Metode Pembayaran
                    </th>

                    <th>
                        Status
                    </th>

                    <th width="250">
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        
                        <th scope="row">

                            <?php echo e($sales->firstItem() + $loop->index); ?>


                        </th>


                        
                        <td>

                            <?php echo e($sale->created_at->translatedFormat('d-m-Y H:i:s')); ?>


                        </td>


                        
                        <td>

                            <?php echo e($sale->user->name ?? '-'); ?>


                        </td>


                        
                        <td class="total-pembayaran">

                            Rp.<?php echo e(number_format($sale->total_pembayaran, 0, ',', '.')); ?>


                        </td>


                        
                        <td class="payment-method">

                            <?php echo e($sale->metode_pembayaran); ?>


                        </td>


                        
                        <td>

                            <?php
                                $status = strtoupper($sale->status);
                            ?>

                            <?php if($status === 'COMPLETED'): ?>

                                <span class="status-badge status-completed">
                                    COMPLETED
                                </span>

                            <?php elseif($status === 'OPEN'): ?>

                                <span class="status-badge status-open">
                                    OPEN
                                </span>

                            <?php elseif($status === 'CANCELLED'): ?>

                                <span class="status-badge status-cancelled">
                                    CANCELLED
                                </span>

                            <?php else: ?>

                                <span class="status-badge status-default">
                                    <?php echo e($sale->status); ?>

                                </span>

                            <?php endif; ?>

                        </td>


                        
                        <td class="aksi">

                            
                            <a href="<?php echo e(route('penjualan.show', $sale)); ?>"
                               class="btn btn-detail btn-sm">

                                Detail

                            </a>


                            
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $sale)): ?>

                                <span class="aksi-separator">
                                    ||
                                </span>

                                <a href="<?php echo e(route('penjualan.edit', $sale)); ?>"
                                   class="btn btn-edit btn-sm">

                                    Edit

                                </a>

                            <?php endif; ?>


                            
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $sale)): ?>

                                <span class="aksi-separator">
                                    ||
                                </span>

                                <form action="<?php echo e(route('penjualan.destroy', $sale)); ?>"
                                      method="POST"
                                      class="d-inline">

                                    <?php echo csrf_field(); ?>

                                    <?php echo method_field('DELETE'); ?>

                                    <button type="submit"
                                            class="btn btn-hapus btn-sm"
                                            onclick="return confirm('Apakah anda yakin akan menghapus penjualan ini?')">

                                        Hapus

                                    </button>

                                </form>

                            <?php endif; ?>

                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td colspan="7"
                            class="text-center empty-data">

                            <i class="bi bi-receipt"
                               style="font-size: 32px;"></i>

                            <div class="mt-2">
                                Data penjualan tidak ditemukan.
                            </div>

                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>


        
        <?php if($sales->total() > 0): ?>

            <div class="pagination-wrapper">

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                    
                    <div class="text-muted small">

                        Menampilkan

                        <strong>
                            <?php echo e($sales->firstItem() ?? 0); ?>

                        </strong>

                        -

                        <strong>
                            <?php echo e($sales->lastItem() ?? 0); ?>

                        </strong>

                        dari

                        <strong>
                            <?php echo e($sales->total()); ?>

                        </strong>

                        penjualan

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


                                
                                <?php $__currentLoopData = $sales->getUrlRange(1, $sales->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

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

            </div>

        <?php endif; ?>

    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\seni_POS\resources\views/penjualan/index.blade.php ENDPATH**/ ?>