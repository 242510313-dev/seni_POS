<?php $__env->startSection('title', 'Produk'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>



<?php $__env->startSection('title','Produk'); ?>

<?php $__env->startSection('content'); ?>

<h1>Halaman Produk</h1>



<a href="<?php echo e(route('produk.create')); ?>" method="GET" class="btn btn-primary mb-3">create</a>

<form action="<?php echo e(route('produk.index')); ?>" method="GET" class="mb-3">
    <div class="input-group">
        <input
            type="text"
            name="search"
            value=""
            class="form-control"
            placeholder="Search nama produk"
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
      <th scope="col">User</th>
      <th scope="col">Foto</th>
      <th scope="col">Nama</th>
      <th scope="col">Harga Beli</th>
      <th scope="col">Harga Jual</th>
      <th scope="col">Stok</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <tr>
      <th scope="row"><?php echo e($products->firstItem() + $loop->index); ?></th>
      <td><?php echo e($product->user->name); ?></td>
      <td>
        <img src="<?php echo e(asset('storage/'.$product->foto)); ?>"
     width="100"
     class="img-thumbnail">
</td>
      <td><?php echo e($product->nama); ?></td>
      <td><?php echo e($product->harga_beli); ?></td>
      <td><?php echo e($product->harga_jual); ?></td>
      <td><?php echo e($product->stok); ?></td>
      <td class="d-flex gap-1">
    <a href="<?php echo e(route('produk.edit', $product)); ?>" class="btn btn-warning">Edit</a>
||

<form action="<?php echo e(route('produk.destroy', $product)); ?>" method="POST" class="d-inline">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus user ini?')">
        Hapus
    </button>
    </form>
</td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <tr>
      <td colspan="8"><h1>Data tidak tersedia.</h1></td>
    </tr>
    <?php endif; ?>
  </tbody>
</table>

<!-- Pagination info & links di bawah tabel -->
<div class="d-flex justify-content-between align-items-center mt-3">
  <div>
    Showing <?php echo e($products->firstItem()); ?> to <?php echo e($products->lastItem()); ?> of <?php echo e($products->total()); ?> results
  </div>
  <div>
    <?php echo e($products->links()); ?>

  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\apk_pos1\APK_POS1\resources\views/produk/index.blade.php ENDPATH**/ ?>