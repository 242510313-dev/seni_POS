

<?php $__env->startSection('title', 'Produk'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<style>
    body {
        background: #f5fbf7;
    }

    .produk-wrapper {
        padding-top: 35px;
        padding-bottom: 50px;
    }

    .produk-title {
        color: #9ACF9D;
        font-size: 38px;
        font-weight: 700;
        margin-bottom: 22px;
    }

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

    .produk-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        border: none;
        box-shadow: 0 4px 15px rgba(45, 106, 79, 0.06);
    }

    .produk-table {
        margin: 0;
    }

    .produk-table thead {
        background: #ffffff;
    }

    .produk-table thead th {
        color: #86BD8B;
        font-weight: 600;
        font-size: 14px;
        border-bottom: 1px solid #e1e8e2;
        padding: 13px 10px;
        white-space: nowrap;
    }

    .produk-table tbody td,
    .produk-table tbody th {
        padding: 15px 10px;
        vertical-align: middle;
        border-bottom: 1px solid #e1e5e8;
        font-size: 14px;
    }

    .produk-table tbody tr:last-child td,
    .produk-table tbody tr:last-child th {
        border-bottom: none;
    }

    .produk-table tbody tr:hover {
        background: #f8fcf8;
    }

    .produk-foto {
        width: 92px;
        height: 92px;
        object-fit: cover;
        border-radius: 7px;
        border: 1px solid #d9e1dc;
        padding: 3px;
        background: white;
    }

    .produk-foto-empty {
        width: 92px;
        height: 92px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f0f5f1;
        border: 1px solid #d9e1dc;
        border-radius: 7px;
        color: #91a096;
        font-size: 12px;
    }

    .nama-produk {
        font-weight: 500;
        color: #111111;
    }

    .harga {
        color: #111111;
        white-space: nowrap;
    }

    .stok {
        color: #111111;
    }

    .btn-edit {
        background: #69B96F;
        border: none;
        color: white;
        font-weight: 600;
        border-radius: 6px;
        padding: 8px 14px;
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
        padding: 8px 14px;
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
        margin: 0 4px;
    }

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

    .empty-data {
        padding: 35px !important;
        color: #8b9690;
    }

    @media (max-width: 768px) {

        .produk-title {
            font-size: 30px;
        }

        .produk-card {
            overflow-x: auto;
        }

        .produk-table {
            min-width: 950px;
        }

        .pagination-wrapper {
            min-width: 950px;
        }
    }
</style>


<div class="container produk-wrapper">

    
    <h1 class="produk-title">
        Halaman Produk
    </h1>


    
    <div class="mb-3">

        <a href="<?php echo e(route('produk.create')); ?>"
           class="btn btn-create">

            Create

        </a>

    </div>


    
    <form action="<?php echo e(route('produk.index')); ?>"
          method="GET"
          class="mb-3">

        <div class="input-group search-box">

            <input
                type="text"
                name="search"
                value="<?php echo e(request('search')); ?>"
                class="form-control"
                placeholder="Search nama produk"
            >

            <button class="btn btn-search"
                    type="submit">

                Search

            </button>

        </div>

    </form>


    
    <div class="produk-card">

        <table class="table produk-table align-middle">

            <thead>

                <tr>

                    <th width="50">
                        #
                    </th>

                    <th>
                        User
                    </th>

                    <th width="130">
                        Foto
                    </th>

                    <th>
                        Nama
                    </th>

                    <th>
                        Harga Beli
                    </th>

                    <th>
                        Harga Jual
                    </th>

                    <th>
                        Stok
                    </th>

                    <th width="190">
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        
                        <th scope="row">

                            <?php echo e($products->firstItem() + $loop->index); ?>


                        </th>


                        
                        <td>

                            <?php echo e($product->user->name ?? '-'); ?>


                        </td>


                        
                        <td>

                            <?php if($product->foto): ?>

                                <img
                                    src="<?php echo e(asset('storage/' . $product->foto)); ?>"
                                    class="produk-foto"
                                    alt="<?php echo e($product->nama); ?>"
                                >

                            <?php else: ?>

                                <div class="produk-foto-empty">

                                    Tidak ada foto

                                </div>

                            <?php endif; ?>

                        </td>


                        
                        <td class="nama-produk">

                            <?php echo e($product->nama); ?>


                        </td>


                        
                        <td class="harga">

                            <?php echo e(number_format($product->harga_beli, 0, ',', '.')); ?>


                        </td>


                        
                        <td class="harga">

                            <?php echo e(number_format($product->harga_jual, 0, ',', '.')); ?>


                        </td>


                        
                        <td class="stok">

                            <?php echo e($product->stok); ?>


                        </td>


                        
                        <td class="aksi">

                            <a href="<?php echo e(route('produk.edit', $product)); ?>"
                               class="btn btn-edit btn-sm">

                                Edit

                            </a>

                            <span class="aksi-separator">
                                ||
                            </span>


                            <form action="<?php echo e(route('produk.destroy', $product)); ?>"
                                  method="POST"
                                  class="d-inline">

                                <?php echo csrf_field(); ?>

                                <?php echo method_field('DELETE'); ?>

                                <button type="submit"
                                        class="btn btn-hapus btn-sm"
                                        onclick="return confirm('Apakah anda yakin akan menghapus produk ini?')">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td colspan="8"
                            class="text-center empty-data">

                            <i class="bi bi-box-seam"
                               style="font-size: 30px;"></i>

                            <div class="mt-2">
                                Data produk tidak tersedia.
                            </div>

                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>


        
        <?php if($products->total() > 0): ?>

            <div class="pagination-wrapper">

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                    
                    <div class="text-muted small">

                        Menampilkan

                        <strong>
                            <?php echo e($products->firstItem() ?? 0); ?>

                        </strong>

                        -

                        <strong>
                            <?php echo e($products->lastItem() ?? 0); ?>

                        </strong>

                        dari

                        <strong>
                            <?php echo e($products->total()); ?>

                        </strong>

                        products

                    </div>


                    
                    <?php if($products->hasPages()): ?>

                        <nav aria-label="Pagination">

                            <ul class="pagination mb-0">

                                
                                <?php if($products->onFirstPage()): ?>

                                    <li class="page-item disabled">

                                        <span class="page-link">

                                            <i class="bi bi-chevron-left"></i>

                                        </span>

                                    </li>

                                <?php else: ?>

                                    <li class="page-item">

                                        <a class="page-link"
                                           href="<?php echo e($products->previousPageUrl()); ?>">

                                            <i class="bi bi-chevron-left"></i>

                                        </a>

                                    </li>

                                <?php endif; ?>


                                
                                <?php $__currentLoopData = $products->getUrlRange(1, $products->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php if($page == $products->currentPage()): ?>

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


                                
                                <?php if($products->hasMorePages()): ?>

                                    <li class="page-item">

                                        <a class="page-link"
                                           href="<?php echo e($products->nextPageUrl()); ?>">

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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\seni_POS\resources\views/produk/index.blade.php ENDPATH**/ ?>