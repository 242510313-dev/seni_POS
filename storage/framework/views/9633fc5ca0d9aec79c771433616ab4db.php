


<?php $__env->startSection('title', 'Users'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="card shadow-sm border-0 rounded-4">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h2 class="fw-bold users-title mb-1">
                    <i class="bi bi-people-fill"></i> Users
                </h2>

                <small class="text-muted">
                    Kelola akun admin dan kasir
                </small>
            </div>

            <a href="<?php echo e(route('admin.users.create')); ?>"
               class="btn btn-soft-green rounded-pill px-4">
                <i class="bi bi-plus-circle"></i>
                Tambah User
            </a>

        </div>


        <form action="<?php echo e(route('admin.users')); ?>" method="GET">

            <div class="input-group mb-4">

                <span class="input-group-text bg-white">
                    <i class="bi bi-search search-icon"></i>
                </span>

                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Cari nama atau email..."
                    value="<?php echo e(request('search')); ?>"
                >

                <button class="btn btn-soft-green">
                    Cari
                </button>

            </div>

        </form>


        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>

                        <th>No</th>

                        <th>Nama</th>

                        <th>Email</th>

                        <th>Role</th>

                        <th width="180">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        <td><?php echo e($users->firstItem() + $loop->index); ?></td>

                        <td class="fw-semibold">
                            <?php echo e($user->name); ?>

                        </td>

                        <td><?php echo e($user->email); ?></td>

                        <td>

                            <?php if($user->role->name == 'admin'): ?>

                                <span class="badge badge-soft-green rounded-pill">
                                    Admin
                                </span>

                            <?php else: ?>

                                <span class="badge badge-soft-gray rounded-pill">
                                    Kasir
                                </span>

                            <?php endif; ?>

                        </td>

                        <td>

                            <a href="<?php echo e(route('admin.users.edit',$user->id)); ?>"
                               class="btn btn-sm btn-soft-green">

                                <i class="bi bi-pencil-square"></i>

                            </a>


                            <form
                                action="<?php echo e(route('admin.users.destroy',$user)); ?>"
                                method="POST"
                                class="d-inline">

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button
                                    onclick="return confirm('Yakin ingin menghapus user ini?')"
                                    class="btn btn-sm btn-soft-danger">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td colspan="5" class="text-center py-5">

                            <i class="bi bi-inbox fs-1 empty-icon"></i>

                            <p class="mt-2 text-muted">
                                Tidak ada data user.
                            </p>

                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>


        <div class="d-flex justify-content-between align-items-center mt-4">

            <div class="text-muted small">

                Menampilkan
                <strong><?php echo e($users->firstItem() ?? 0); ?></strong>
                -
                <strong><?php echo e($users->lastItem() ?? 0); ?></strong>
                dari
                <strong><?php echo e($users->total()); ?></strong>
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

</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\seni_POS\resources\views/users/index.blade.php ENDPATH**/ ?>