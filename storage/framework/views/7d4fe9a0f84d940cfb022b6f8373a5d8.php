

<?php $__env->startSection('title', 'Struk Transaksi'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="container mt-4">

    <div class="receipt">

        <div class="text-center">
            <h4 class="fw-bold mb-1">MIDORI BAKERY</h4>
            <div>STRUK PEMBAYARAN</div>
            <hr>
        </div>

        
        <div class="receipt-info">
            <div class="d-flex justify-content-between">
                <span>No. Transaksi</span>
                <span>#<?php echo e($penjualan->id); ?></span>
            </div>

            <div class="d-flex justify-content-between">
                <span>Tanggal</span>
                <span>
                    <?php echo e($penjualan->created_at->format('d/m/Y H:i')); ?>

                </span>
            </div>

            <div class="d-flex justify-content-between">
                <span>Kasir</span>
                <span><?php echo e($penjualan->user->name); ?></span>
            </div>
        </div>

        <hr>

        
        <?php $__currentLoopData = $penjualan->itemPenjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="mb-2">

                <div class="fw-bold">
                    <?php echo e($item->produk->nama); ?>

                </div>

                <div class="d-flex justify-content-between">
                    <span>
                        <?php echo e($item->kuantitas); ?>

                        x
                        Rp <?php echo e(number_format($item->harga_satuan, 0, ',', '.')); ?>

                    </span>

                    <span>
                        Rp <?php echo e(number_format($item->subtotal, 0, ',', '.')); ?>

                    </span>
                </div>

            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <hr>

        <?php if(($penjualan->discount_percentage ?? 0) > 0): ?>
            <div class="d-flex justify-content-between">
                <span>Diskon <?php echo e($penjualan->discount_percentage); ?>%</span>
                <span>- Rp <?php echo e(number_format($penjualan->discount_amount ?? 0, 0, ',', '.')); ?></span>
            </div>
        <?php endif; ?>

        
        <div class="d-flex justify-content-between fw-bold fs-5">
            <span>TOTAL</span>

            <span>
                Rp <?php echo e(number_format($penjualan->total_pembayaran, 0, ',', '.')); ?>

            </span>
        </div>

        <div class="d-flex justify-content-between mt-2">
            <span>Pembayaran</span>
            <span><?php echo e($penjualan->metode_pembayaran); ?></span>
        </div>

        <?php if($penjualan->metode_pembayaran === 'CASH'): ?>
            <div class="d-flex justify-content-between">
                <span>Uang Diterima</span>
                <span>
                    Rp <?php echo e(number_format($penjualan->cash_amount ?? 0, 0, ',', '.')); ?>

                </span>
            </div>

            <div class="d-flex justify-content-between fw-bold">
                <span>Kembalian</span>
                <span>
                    Rp <?php echo e(number_format($penjualan->change_amount ?? 0, 0, ',', '.')); ?>

                </span>
            </div>
        <?php endif; ?>

        <div class="d-flex justify-content-between">
            <span>Status</span>
            <span><?php echo e($penjualan->status); ?></span>
        </div>

        <hr>

        <div class="text-center">
            <p class="mb-1">Terima kasih</p>
            <small>Barang yang sudah dibeli tidak dapat dikembalikan.</small>
        </div>

    </div>

    
    <div class="text-center mt-3">

        <a href="<?php echo e(route('penjualan.index')); ?>"
           class="btn btn-secondary">
            Kembali
        </a>

        <button onclick="window.print()"
                class="btn btn-primary">
            Cetak Struk
        </button>

    </div>

</div>


<style>

.receipt {
    width: 380px;
    margin: 30px auto;
    padding: 25px;
    background: white;
    border: 1px solid #ddd;
    border-radius: 5px;

    font-family: "Courier New", monospace;
    color: #000;

    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}

.receipt hr {
    border: 0;
    border-top: 1px dashed #000;
    margin: 12px 0;
}

.receipt-info {
    font-size: 14px;
}

.receipt small {
    font-size: 11px;
}

@media print {

    body * {
        visibility: hidden;
    }

    .receipt,
    .receipt * {
        visibility: visible;
    }

    .receipt {
        position: absolute;
        left: 0;
        top: 0;

        width: 80mm;
        margin: 0;
        padding: 10px;

        border: none;
        box-shadow: none;
    }

    .btn,
    nav,
    .navbar {
        display: none !important;
    }

}

</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\seni_POS\resources\views/penjualan/show.blade.php ENDPATH**/ ?>