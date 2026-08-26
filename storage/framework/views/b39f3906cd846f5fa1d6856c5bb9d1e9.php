

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<style>
    body {
        background: #f5fbf7;
    }

    /* =========================
       PAGE HEADER
    ========================= */

    .page-header {
        margin-bottom: 24px;
    }

    .page-title {
        color: #2d6a4f;
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .page-subtitle {
        color: #8a9a8d;
        font-size: 14px;
    }

    /* =========================
       ADD BUTTON
    ========================= */

    .btn-tambah-jenis {
        background: #2E7D32;
        border: none;
        color: #ffffff;
        border-radius: 25px;
        padding: 10px 18px;
        transition: all .2s ease;
        box-shadow: 0 5px 15px rgba(46, 125, 50, .15);
    }

    .btn-tambah-jenis:hover {
        background: #256b29;
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(46, 125, 50, .20);
    }

    /* =========================
       ALERT
    ========================= */

    .custom-alert {
        border: none;
        border-radius: 14px;
        background: #d8f3dc;
        color: #1b4332;
        box-shadow: 0 5px 15px rgba(45, 106, 79, .06);
    }

    /* =========================
       MAIN CARD
    ========================= */

    .jenis-card {
        background: #ffffff;
        border: 1px solid #dfe9df;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 7px 22px rgba(45, 106, 79, .06);
    }

    .jenis-card-header {
        padding: 20px 24px;
        border-bottom: 1px solid #edf2ed;
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .jenis-card-icon {
        width: 45px;
        height: 45px;
        border-radius: 14px;
        background: #eef5eb;
        color: #6f917b;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 20px;
    }

    .jenis-card-title {
        color: #2d6a4f;
        font-weight: 700;
        font-size: 18px;
        margin: 0;
    }

    .jenis-card-subtitle {
        color: #96a497;
        font-size: 13px;
        margin-top: 2px;
    }

    /* =========================
       TABLE
    ========================= */

    .jenis-table {
        margin-bottom: 0;
    }

    .jenis-table thead {
        background: #d8f3dc;
        color: #2d6a4f;
    }

    .jenis-table thead th {
        border: none;
        padding: 15px 18px;
        font-size: 13px;
        font-weight: 700;
    }

    .jenis-table tbody td {
        padding: 16px 18px;
        border-color: #edf2ed;
        color: #718074;
        font-size: 14px;
    }

    .jenis-table tbody tr {
        transition: background .2s ease;
    }

    .jenis-table tbody tr:hover {
        background: #f4faf5;
    }

    .nomor {
        color: #8b9a8e;
        font-weight: 600;
    }

    .nama-jenis {
        color: #426c51 !important;
        font-weight: 600;
    }

    /* =========================
       ACTION BUTTONS
    ========================= */

    .btn-edit {
        background: #f2c66d;
        color: #ffffff;
        border: none;
        border-radius: 10px;
        padding: 7px 14px;
        font-weight: 600;
        font-size: 13px;
    }

    .btn-edit:hover {
        background: #dfa94d;
        color: #ffffff;
    }

    .btn-hapus {
        background: #d66b6b;
        color: #ffffff;
        border: none;
        border-radius: 10px;
        padding: 7px 14px;
        font-weight: 600;
        font-size: 13px;
    }

    .btn-hapus:hover {
        background: #bf5555;
        color: #ffffff;
    }

    /* =========================
       EMPTY STATE
    ========================= */

    .empty-state {
        padding: 40px 20px !important;
        color: #9aaa9d !important;
    }

    .empty-icon {
        width: 50px;
        height: 50px;
        border-radius: 15px;
        background: #eef5eb;
        color: #8ba995;

        display: flex;
        align-items: center;
        justify-content: center;

        margin: 0 auto 12px;
        font-size: 22px;
    }

    /* =========================
       MODAL
    ========================= */

    .custom-modal {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 45px rgba(45, 106, 79, .18);
    }

    .custom-modal-header {
        background: #2E7D32;
        color: #ffffff;
        padding: 18px 22px;
        border: none;
    }

    .custom-modal-title {
        font-weight: 700;
        font-size: 18px;
    }

    .custom-modal-body {
        padding: 24px;
        background: #ffffff;
    }

    .custom-modal-footer {
        padding: 15px 22px;
        background: #f8fbf8;
        border-top: 1px solid #edf2ed;
    }

    .form-label-custom {
        color: #426c51;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .custom-input {
        border: 1px solid #d8e4d9;
        border-radius: 12px;
        padding: 11px 14px;
        color: #53685a;
        box-shadow: none;
    }

    .custom-input:focus {
        border-color: #7ca486;
        box-shadow: 0 0 0 3px rgba(45, 106, 79, .08);
    }

    .btn-batal {
        background: #e9eeee;
        color: #647268;
        border: none;
        border-radius: 10px;
        padding: 9px 17px;
        font-weight: 600;
    }

    .btn-batal:hover {
        background: #dce4de;
        color: #536159;
    }

    .btn-simpan {
        background: #2E7D32;
        color: #ffffff;
        border: none;
        border-radius: 10px;
        padding: 9px 18px;
        font-weight: 700;
    }

    .btn-simpan:hover {
        background: #256b29;
        color: #ffffff;
    }

    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 768px) {

        .page-title {
            font-size: 23px;
        }

        .page-header {
            flex-direction: column;
            align-items: flex-start !important;
            gap: 15px;
        }

        .jenis-card-header {
            padding: 17px;
        }

        .jenis-table thead th,
        .jenis-table tbody td {
            padding: 12px 10px;
        }

        .action-wrapper {
            flex-direction: column;
            align-items: center;
        }
    }
</style>


<div class="container mt-4 mb-5">

    
    <div class="page-header d-flex justify-content-between align-items-center">

        <div>

            <h2 class="page-title">
                Daftar Jenis Produk
            </h2>

            <div class="page-subtitle">
                Kelola kategori atau jenis produk Midori Bakery
            </div>

        </div>


        <button type="button"
                class="btn btn-tambah-jenis fw-bold"
                data-bs-toggle="modal"
                data-bs-target="#modalTambahJenis">

            <i class="bi bi-plus-lg me-1"></i>
            Tambah Jenis

        </button>

    </div>


    
    <?php if(session('success')): ?>

        <div class="alert custom-alert alert-dismissible fade show"
             role="alert">

            <i class="bi bi-check-circle-fill me-2"></i>

            <?php echo e(session('success')); ?>


            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close">
            </button>

        </div>

    <?php endif; ?>


    
    <div class="jenis-card">

        <div class="jenis-card-header">

            <div class="jenis-card-icon">
                <i class="bi bi-tags-fill"></i>
            </div>

            <div>

                <h5 class="jenis-card-title">
                    Data Jenis Produk
                </h5>

                <div class="jenis-card-subtitle">
                    Daftar jenis produk yang tersedia
                </div>

            </div>

        </div>


        <div class="table-responsive">

            <table class="table jenis-table table-hover align-middle">

                <thead>

                    <tr>

                        <th width="70" class="text-center">
                            No
                        </th>

                        <th>
                            Nama Jenis
                        </th>

                        <th width="190" class="text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $jenis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        <td class="text-center nomor">
                            <?php echo e($key + 1); ?>

                        </td>

                        <td class="nama-jenis">
                            <i class="bi bi-tag me-2 text-muted"></i>
                            <?php echo e($item->nama_jenis); ?>

                        </td>

                        <td class="text-center">

                            <div class="d-flex justify-content-center gap-2 action-wrapper">

                                
                                <button type="button"
                                        class="btn btn-edit"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEditJenis<?php echo e($item->id); ?>">

                                    <i class="bi bi-pencil-square me-1"></i>
                                    Edit

                                </button>


                                
                                <form action="<?php echo e(route('jenis.destroy', $item->id)); ?>"
                                      method="POST"
                                      class="m-0"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus jenis ini?')">

                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <button type="submit"
                                            class="btn btn-hapus">

                                        <i class="bi bi-trash3 me-1"></i>
                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>


                    
                    <div class="modal fade"
                         id="modalEditJenis<?php echo e($item->id); ?>"
                         tabindex="-1"
                         aria-labelledby="modalEditJenisLabel<?php echo e($item->id); ?>"
                         aria-hidden="true">

                        <div class="modal-dialog modal-dialog-centered">

                            <div class="modal-content custom-modal">

                                <div class="modal-header custom-modal-header">

                                    <h5 class="modal-title custom-modal-title"
                                        id="modalEditJenisLabel<?php echo e($item->id); ?>">

                                        <i class="bi bi-pencil-square me-2"></i>
                                        Edit Jenis Produk

                                    </h5>

                                    <button type="button"
                                            class="btn-close btn-close-white"
                                            data-bs-dismiss="modal"
                                            aria-label="Close">
                                    </button>

                                </div>


                                <form action="<?php echo e(route('jenis.update', $item->id)); ?>"
                                      method="POST">

                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>

                                    <div class="custom-modal-body">

                                        <div class="mb-3">

                                            <label for="nama_jenis_<?php echo e($item->id); ?>"
                                                   class="form-label-custom">

                                                Nama Jenis

                                            </label>

                                            <input type="text"
                                                   class="form-control custom-input"
                                                   id="nama_jenis_<?php echo e($item->id); ?>"
                                                   name="nama_jenis"
                                                   value="<?php echo e(old('nama_jenis', $item->nama_jenis)); ?>"
                                                   placeholder="Masukkan nama jenis..."
                                                   required>

                                        </div>

                                    </div>


                                    <div class="modal-footer custom-modal-footer">

                                        <button type="button"
                                                class="btn btn-batal"
                                                data-bs-dismiss="modal">

                                            Batal

                                        </button>

                                        <button type="submit"
                                                class="btn btn-simpan">

                                            <i class="bi bi-check-lg me-1"></i>
                                            Simpan Perubahan

                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td colspan="3"
                            class="text-center empty-state">

                            <div class="empty-icon">
                                <i class="bi bi-tags"></i>
                            </div>

                            <div class="fw-semibold">
                                Belum ada data jenis
                            </div>

                            <small>
                                Silakan tambahkan jenis produk baru.
                            </small>

                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>



<div class="modal fade"
     id="modalTambahJenis"
     tabindex="-1"
     aria-labelledby="modalTambahJenisLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content custom-modal">

            <div class="modal-header custom-modal-header">

                <h5 class="modal-title custom-modal-title"
                    id="modalTambahJenisLabel">

                    <i class="bi bi-plus-circle me-2"></i>
                    Tambah Jenis Produk

                </h5>

                <button type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                </button>

            </div>


            <form action="<?php echo e(route('jenis.store')); ?>"
                  method="POST">

                <?php echo csrf_field(); ?>

                <div class="custom-modal-body">

                    <div class="mb-3">

                        <label for="nama_jenis"
                               class="form-label-custom">

                            Nama Jenis

                        </label>

                        <input type="text"
                               class="form-control custom-input"
                               id="nama_jenis"
                               name="nama_jenis"
                               placeholder="Contoh: Roti, Cake, Minuman..."
                               required>

                    </div>

                </div>


                <div class="modal-footer custom-modal-footer">

                    <button type="button"
                            class="btn btn-batal"
                            data-bs-dismiss="modal">

                        Batal

                    </button>

                    <button type="submit"
                            class="btn btn-simpan">

                        <i class="bi bi-check-lg me-1"></i>
                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\seni_POS\resources\views/jenis/index.blade.php ENDPATH**/ ?>