

<?php $__env->startSection('title', 'POS'); ?>

<?php $__env->startSection('content'); ?>

<?php if(session('errors')): ?>
    <div class="alert alert-danger">
        <?php echo e(session('errors')); ?>

    </div>
<?php endif; ?>

<h4 class="mb-3">
    <?php echo e($mode === 'edit' ? 'Edit Penjualan' : 'Tambah Penjualan'); ?>

</h4>

<div class="row">

    
    <div class="col-md-6">
        <div class="card">
            <div class="card-body" style="max-height:70vh; overflow:auto">

                
                <div class="mb-3">
                    <form method="GET" action="<?php echo e(route('penjualan.create')); ?>">
                        <input type="text"
                               name="search"
                               value="<?php echo e(request('search')); ?>"
                               class="form-control"
                               placeholder="Cari produk..."
                               onkeyup="this.form.submit()">
                    </form>
                </div>

                
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <form method="POST"
                      action="<?php echo e(route('itempenjualan.store')); ?>"
                      class="row mb-2 align-items-center">

                    <?php echo csrf_field(); ?>

                    <input type="hidden"
                           name="product_id"
                           value="<?php echo e($product->id); ?>">

                    
                    <div class="col-7">
                        <button type="submit"
                                class="btn btn-light w-100 text-start">

                            <div class="d-flex align-items-center gap-2">

                                <img src="https://via.placeholder.com/50"
                                     width="50"
                                     height="50"
                                     class="rounded">

                                <div>
                                    <div class="fw-semibold">
                                        <?php echo e($product->nama); ?>

                                    </div>

                                    <small>
                                        Rp <?php echo e(number_format($product->harga_jual)); ?>

                                    </small>
                                </div>

                            </div>
                        </button>
                    </div>

                    
                    <div class="col-3">
                        <input type="number"
                               name="quantity"
                               value="1"
                               min="1"
                               class="form-control">
                    </div>

                    
                    <div class="col-2">
                        <button type="submit"
                                class="btn btn-primary w-100">
                            +
                        </button>
                    </div>

                </form>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>

    
    <div class="col-md-6">
        <div class="card">

            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $sale->itemPenjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        
                        <td><?php echo e($item->produk->nama); ?></td>
                        <td>Rp. <?php echo e(number_format($item->produk->harga_jual)); ?></td>
                        <td>
                            <form method="POST" action="<?php echo e(route('itempenjualan.update', $item->id)); ?>">
                                <?php echo csrf_field(); ?>  <?php echo method_field('PUT'); ?>
                                <input type="number" name="quantity"
                                       value="<?php echo e($item->kuantitas); ?>" min="1"
                                       class="form-control form-control-sm"
                                       onchange="this.form.submit()">
                            </form>
                        </td>
                        <td>
                            Rp <?php echo e(number_format($item->subtotal)); ?>

                        </td>
                        <td>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $item)): ?>
                            <form method="POST" action="<?php echo e(route('itempenjualan.destroy', $item->id)); ?>">
                                <?php echo csrf_field(); ?>  <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-center">
                            Keranjang masih kosong
                        </td>
                    </tr>
                    <?php endif; ?>

                </tbody>
            </table>

            
            <div class="card-footer">

                <strong>
                    Total: Rp <span id="total-display"><?php echo e(number_format($sale->total_pembayaran)); ?></span>
                </strong>

                <form method="POST"
                      action="<?php echo e(route('penjualan.update', $sale->id)); ?>"
                      onsubmit="return confirm('Yakin ingin checkout?')" class="mt-2">
                
                    <?php echo csrf_field(); ?>  <?php echo method_field('PUT'); ?>
                    
                    <select name="payment_method"
                            id="payment_method"
                            class="form-select mb-2"
                            onchange="handlePaymentMethodChange(this.value)">

                        <option value="">
                            Pilih Pembayaran
                        </option>

                        <option value="CASH">
                            Cash
                        </option>

                        <option value="QRIS">
                            QRIS
                        </option>

                    </select>

                    <label for="discount_percentage" class="form-label mb-1">Diskon</label>
                    <select name="discount_percentage"
                            id="discount_percentage"
                            class="form-select mb-2"
                            onchange="calculateDiscount()">
                        <option value="0">Tanpa Diskon</option>
                        <option value="5">Diskon 5%</option>
                        <option value="10">Diskon 10%</option>
                        <option value="15">Diskon 15%</option>
                    </select>

                    <div class="alert alert-success py-2 mb-2">
                        Diskon: <strong id="discount-amount">Rp 0</strong>
                    </div>

                    
                    <div id="cash-section" class="mb-2" style="display: none;">
                        <label class="form-label mb-1">Jumlah Uang Tunai</label>
                        <input type="number" 
                               name="cash_amount" 
                               id="cash_amount" 
                               class="form-control mb-2" 
                               placeholder="Masukkan nominal uang"
                               oninput="calculateChange()">
                        
                        <div class="alert alert-info py-2 mb-0">
                            Kembalian: <strong id="change-amount">Rp 0</strong>
                        </div>
                    </div>

                    
                    <div id="qris-section" class="mb-2 text-center" style="display: none;">
                        <label class="form-label mb-1">Scan Barcode QRIS</label>
                        <div class="p-2 bg-white border rounded d-inline-block">
                            <?php
                                $qrisPayload = config('services.qris.payload')
                                    ?: 'SENI POS|TRANSAKSI=' . $sale->id . '|TOTAL=' . $sale->total_pembayaran;
                            ?>
                            <canvas data-qris-payload="<?php echo e($qrisPayload); ?>"
                                    aria-label="Barcode QRIS transaksi <?php echo e($sale->id); ?>"></canvas>
                        </div>
                        <small class="d-block text-muted mt-1">Silakan scan menggunakan e-wallet / m-banking</small>
                    </div>

                    <button class="btn btn-success w-100 <?php echo e($sale->status === 'COMPLETED' ? 'disabled' : ''); ?>">
                        Checkout
                    </button>
                </form>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $sale)): ?>
                <form action="<?php echo e(route('penjualan.destroy', $sale->id)); ?>"
                      method="POST"
                      onsubmit="return confirm('Yakin ingin membatalkan transaksi?')">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>

                    <button class="btn btn-outline-danger w-100 mt-2 <?php echo e($sale->status === 'COMPLETED' ? 'disabled' : ''); ?>">
                        Batalkan Transaksi
                    </button>
                </form>
                <?php endif; ?>

            </div>
        </div>
    </div>

</div>


<script>
function handlePaymentMethodChange(val) {
    const cashSection = document.getElementById('cash-section');
    const qrisSection = document.getElementById('qris-section');

    if (val === 'CASH') {
        cashSection.style.display = 'block';
        qrisSection.style.display = 'none';
    } else if (val === 'QRIS') {
        qrisSection.style.display = 'block';
        cashSection.style.display = 'none';
    } else {
        cashSection.style.display = 'none';
        qrisSection.style.display = 'none';
    }
}

function calculateDiscount() {
    const baseTotal = <?php echo e($sale->itemPenjualan->sum('subtotal')); ?>;
    const discountPercentage = Number(document.getElementById('discount_percentage').value) || 0;
    const discountAmount = Math.round(baseTotal * discountPercentage / 100);
    const finalTotal = baseTotal - discountAmount;

    document.getElementById('discount-amount').innerText = 'Rp ' + new Intl.NumberFormat('id-ID').format(discountAmount);
    document.getElementById('total-display').innerText = new Intl.NumberFormat('id-ID').format(finalTotal);
    calculateChange(finalTotal);
}

function calculateChange(totalPembayaran = <?php echo e($sale->total_pembayaran); ?>) {
    const cashInput = document.getElementById('cash_amount').value;
    const changeDisplay = document.getElementById('change-amount');
    
    const cash = parseFloat(cashInput) || 0;
    const change = cash - totalPembayaran;

    if (change >= 0) {
        changeDisplay.innerText = 'Rp ' + new Intl.NumberFormat('id-ID').format(change);
    } else {
        changeDisplay.innerText = 'Uang kurang';
    }
}

calculateDiscount();
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\seni_POS\resources\views/penjualan/pos.blade.php ENDPATH**/ ?>