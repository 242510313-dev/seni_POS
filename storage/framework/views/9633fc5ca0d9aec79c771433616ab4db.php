

<?php $__env->startSection('title', 'Users'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<style>
    body {
        background: #f5fbf7;
    }

    .users-wrapper {
        padding-top: 35px;
        padding-bottom: 50px;
    }

    .users-title {
        color: #9ACF9D;
        font-size: 38px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .users-subtitle {
        color: #8a958d;
        font-size: 14px;
    }

    /* CARD */
    .users-card {
        background: #ffffff;
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(45, 106, 79, 0.06);
        overflow: hidden;
    }

    /* BUTTON TAMBAH */
    .btn-tambah {
        background: #78B77D;
        border: none;
        color: #ffffff;
        font-weight: 600;
        border-radius: 6px;
        padding: 9px 16px;
    }

    .btn-tambah:hover {
        background: #68A96E;
        color: #ffffff;
    }

    /* SEARCH */
    .search-wrapper {
        background: #ffffff;
        border: 1px solid #dcebdd;
        border-radius: 10px;
        overflow: hidden;
    }

    .search-wrapper .input-group-text {
        border: none;
        background: #ffffff;
        color: #83B987;
    }

    .search-wrapper .form-control {
        border: none;
        box-shadow: none;
        padding: 10px 12px;
    }

    .search-wrapper .form-control:focus {
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

    /* TABLE */
    .users-table {
        margin-bottom: 0;
    }

    .users-table thead th {
        color: #86BD8B;
        font-weight: 600;
        font-size: 14px;
        padding: 13px 12px;
        border-bottom: 1px solid #e1e8e2;
        white-space: nowrap;
    }

    .users-table tbody td {
        padding: 14px 12px;
        border-bottom: 1px solid #e1e5e8;
        font-size: 14px;
        vertical-align: middle;
    }

    .users-table tbody tr:last-child td {
        border-bottom: none;
    }

    .users-table tbody tr:hover {
        background: #f8fcf8;
    }

    /* ROLE */
    .badge-admin {
        background: #d9f2dc;
        color: #4f8755;
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 600;
        border-radius: 20px;
    }

    .badge-kasir {
        background: #edf1ee;
        color: #68736c;
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 600;
        border-radius: 20px;
    }

    /* ACTION */
    .btn-edit {
        background: #69B96F;
        border: none;
        color: #ffffff;
        border-radius: 6px;
        padding: 7px 11px;
    }

    .btn-edit:hover {
        background: #5EAA64;
        color: #ffffff;
    }

    .btn-hapus {
        background: #F05252;
        border: none;
        color: #ffffff;
        border-radius: 6px;
        padding: 7px 11px;
    }

    .btn-hapus:hover {
        background: #dc4444;
        color: #ffffff;
    }

    /* EMPTY */
    .empty-data {
        padding: 50px !important;
        color: #8b9690;
    }

    .empty-icon {
        color: #9ACF9D;
        font-size: 42px;
    }

    /* PAGINATION */
    .pagination-wrapper {
        padding-top: 18px;
    }

    .pagination .page-link {
        color: #6e7b83;
        border-color: #dce3e0;
    }

    .pagination .page-item.active .page-link {
        background: #83C987;
        border-color: #83C987;
        color: #ffffff;
    }

    .pagination .page-link:hover {
        background: #eef8ef;
        color: #4f8755;
    }

    .pagination .page-item.disabled .page-link {
        color: #b5bdb8;
        background: #f5f7f6;
    }

    /* ALERT */
    .alert {
        border: none;
        border-radius: 10px;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {

        .users-title {
            font-size: 30px;
        }

        .users-card {
            overflow-x: auto;
        }

        .users-table {
            min-width: 750px;
        }
    }
</style>


<div class="container users-wrapper">

    <div class="users-card">

        <div class="card-body p-4">


            
            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>

                    <h2 class="users-title">
                        <i class="bi bi-people-fill"></i>
                        Users
                    </h2>

                    <div class="users-subtitle">
                        Kelola akun admin dan kasir
                    </div>

                </div>


                <a href="<?php echo e(route('admin.users.create')); ?>"
                   class="btn btn-tambah">

                    <i class="bi bi-plus-circle"></i>
                    Tambah User

                </a>

            </div>


            
            <form action="<?php echo e(route('admin.users')); ?>"
                  method="GET"
                  class="mb-4">

                <div class="input-group search-wrapper">

                    <span class="input-group-text">

                        <i class="bi bi-search"></i>

                    </span>

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Cari nama atau email..."
                        value="<?php echo e(request('search')); ?>"
                    >

                    <button type="submit"
                            class="btn btn-search">

                        Search

                    </button>

                </div>

            </form>


            
            <div class="table-responsive">

                <table class="table users-table align-middle">

                    <thead>

                        <tr>

                            <th width="60">
                                #
                            </th>

                            <th>
                                Nama
                            </th>

                            <th>
                                Email
                            </th>

                            <th>
                                Role
                            </th>

                            <th width="150">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr>

                            
                            <td>

                                <?php echo e($users->firstItem() + $loop->index); ?>


                            </td>


                            
                            <td class="fw-semibold">

                                <?php echo e($user->name); ?>


                            </td>


                            
                            <td>

                                <?php echo e($user->email); ?>


                            </td>


                            
                            <td>

                                <?php if($user->role && $user->role->name == 'admin'): ?>

                                    <span class="badge-admin">
                                        Admin
                                    </span>

                                <?php else: ?>

                                    <span class="badge-kasir">
                                        Kasir
                                    </span>

                                <?php endif; ?>

                            </td>


                            
                            <td>

                                <a href="<?php echo e(route('admin.users.edit', $user->id)); ?>"
                                   class="btn btn-edit btn-sm"
                                   title="Edit">

                                    <i class="bi bi-pencil-square"></i>

                                </a>


                                <form
                                    action="<?php echo e(route('admin.users.destroy', $user)); ?>"
                                    method="POST"
                                    class="d-inline">

                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <button
                                        type="submit"
                                        class="btn btn-hapus btn-sm"
                                        title="Hapus"
                                        onclick="return confirm('Yakin ingin menghapus user ini?')">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <tr>

                            <td colspan="5"
                                class="text-center empty-data">

                                <i class="bi bi-inbox empty-icon"></i>

                                <p class="mt-3 mb-0 text-muted">
                                    Tidak ada data user.
                                </p>

                            </td>

                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>


            
            <?php if($users->total() > 0): ?>

                <div class="pagination-wrapper">

                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                        
                        <div class="text-muted small">

                            Menampilkan

                            <strong>
                                <?php echo e($users->firstItem() ?? 0); ?>

                            </strong>

                            -

                            <strong>
                                <?php echo e($users->lastItem() ?? 0); ?>

                            </strong>

                            dari

                            <strong>
                                <?php echo e($users->total()); ?>

                            </strong>

                            user

                        </div>


                        
                        <?php if($users->hasPages()): ?>

                            <nav aria-label="Pagination">

                                <ul class="pagination mb-0">

                                    
                                    <?php if($users->onFirstPage()): ?>

                                        <li class="page-item disabled">

                                            <span class="page-link">

                                                <i class="bi bi-chevron-left"></i>

                                            </span>

                                        </li>

                                    <?php else: ?>

                                        <li class="page-item">

                                            <a class="page-link"
                                               href="<?php echo e($users->previousPageUrl()); ?>">

                                                <i class="bi bi-chevron-left"></i>

                                            </a>

                                        </li>

                                    <?php endif; ?>


                                    
                                    <?php $__currentLoopData = $users->getUrlRange(1, $users->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($page == $users->currentPage()): ?>

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


                                    
                                    <?php if($users->hasMorePages()): ?>

                                        <li class="page-item">

                                            <a class="page-link"
                                               href="<?php echo e($users->nextPageUrl()); ?>">

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

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\seni_POS\resources\views/users/index.blade.php ENDPATH**/ ?>