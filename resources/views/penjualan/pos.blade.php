@extends('layouts.app')

@section('title', 'POS')

@section('content')

@if(session('errors'))
    <div class="alert alert-danger">
        {{ session('errors') }}
    </div>
@endif

<h4 class="mb-3">
    {{ $mode === 'edit' ? 'Edit Penjualan' : 'Tambah Penjualan' }}
</h4>

<div class="row">

    {{-- ================= PRODUK ================= --}}
    <div class="col-md-6">
        <div class="card">
            <div class="card-body" style="max-height:70vh; overflow:auto">

                {{-- SEARCH --}}
                <div class="mb-3">
                    <form method="GET" action="{{ route('penjualan.create') }}">
                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               class="form-control"
                               placeholder="Cari produk..."
                               onkeyup="this.form.submit()">
                    </form>
                </div>

                {{-- LIST PRODUK --}}
                @foreach($products as $product)
                <form method="POST"
                      action="{{ route('itempenjualan.store') }}"
                      class="row mb-2 align-items-center">

                    @csrf

                    <input type="hidden"
                           name="product_id"
                           value="{{ $product->id }}">

                    {{-- NAMA PRODUK --}}
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
                                        {{ $product->nama }}
                                    </div>

                                    <small>
                                        Rp {{ number_format($product->harga_jual) }}
                                    </small>
                                </div>

                            </div>
                        </button>
                    </div>

                    {{-- QTY --}}
                    <div class="col-3">
                        <input type="number"
                               name="quantity"
                               value="1"
                               min="1"
                               class="form-control">
                    </div>

                    {{-- BUTTON --}}
                    <div class="col-2">
                        <button type="submit"
                                class="btn btn-primary w-100">
                            +
                        </button>
                    </div>

                </form>
                @endforeach

            </div>
        </div>
    </div>

    {{-- ================= KERANJANG ================= --}}
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

                    @forelse($sale->itemPenjualan as $item)
                    <tr>
                        {{-- NAMA --}}
                        <td>{{ $item->produk->nama }}</td>
                        <td>Rp. {{ number_format($item->produk->harga_jual) }}</td>
                        <td>
                            <form method="POST" action="{{ route('itempenjualan.update', $item->id) }}">
                                @csrf  @method('PUT')
                                <input type="number" name="quantity"
                                       value="{{ $item->kuantitas }}" min="1"
                                       class="form-control form-control-sm"
                                       onchange="this.form.submit()">
                            </form>
                        </td>
                        <td>
                            Rp {{ number_format($item->subtotal) }}
                        </td>
                        <td>
                            @can('delete', $item)
                            <form method="POST" action="{{ route('itempenjualan.destroy', $item->id) }}">
                                @csrf  @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">
                            Keranjang masih kosong
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>

            {{-- FOOTER --}}
            <div class="card-footer">

                <strong>
                    Total: Rp {{ number_format($sale->total_pembayaran) }}
                </strong>

                <form method="POST"
                      action="{{ route('penjualan.update', $sale->id) }}"
                      onsubmit="return confirm('Yakin ingin checkout?')" class="mt-2">
                
                    @csrf  @method('PUT')
                    
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

                    {{-- BAGIAN CASH: INPUT NOMINAL & KEMBALIAN --}}
                    <div id="cash-section" class="mb-2" style="display: none;">
                        <label class="form-label mb-1">Jumlah Uang Tunai</label>
                        <input type="number" 
                               name="cash_amount" 
                               id="cash_amount" 
                               class="form-control mb-2" 
                               placeholder="Masukkan nominal uang"
                               oninput="calculateChange({{ $sale->total_pembayaran }})">
                        
                        <div class="alert alert-info py-2 mb-0">
                            Kembalian: <strong id="change-amount">Rp 0</strong>
                        </div>
                    </div>

                    {{-- BAGIAN QRIS: TAMPILAN BARCODE --}}
                    <div id="qris-section" class="mb-2 text-center" style="display: none;">
                        <label class="form-label mb-1">Scan Barcode QRIS</label>
                        <div class="p-2 bg-white border rounded d-inline-block">
                            @php
                                $qrisPayload = config('services.qris.payload')
                                    ?: 'SENI POS|TRANSAKSI=' . $sale->id . '|TOTAL=' . $sale->total_pembayaran;
                            @endphp
                            <canvas data-qris-payload="{{ $qrisPayload }}"
                                    aria-label="Barcode QRIS transaksi {{ $sale->id }}"></canvas>
                        </div>
                        <small class="d-block text-muted mt-1">Silakan scan menggunakan e-wallet / m-banking</small>
                    </div>

                    <button class="btn btn-success w-100 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">
                        Checkout
                    </button>
                </form>

                @can('delete', $sale)
                <form action="{{ route('penjualan.destroy', $sale->id) }}"
                      method="POST"
                      onsubmit="return confirm('Yakin ingin membatalkan transaksi?')">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-outline-danger w-100 mt-2 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">
                        Batalkan Transaksi
                    </button>
                </form>
                @endcan

            </div>
        </div>
    </div>

</div>

{{-- SCRIPT JAVASCRIPT --}}
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

function calculateChange(totalPembayaran) {
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
</script>

@endsection