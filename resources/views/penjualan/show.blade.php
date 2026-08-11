@extends('layouts.app')

@section('title', 'Struk Transaksi')

@section('content')

@include('layouts.navbar')

<div class="container mt-4">

    <div class="receipt">

        <div class="text-center">
            <h4 class="fw-bold mb-1">POS SENI</h4>
            <div>STRUK PEMBAYARAN</div>
            <hr>
        </div>

        {{-- Informasi transaksi --}}
        <div class="receipt-info">
            <div class="d-flex justify-content-between">
                <span>No. Transaksi</span>
                <span>#{{ $penjualan->id }}</span>
            </div>

            <div class="d-flex justify-content-between">
                <span>Tanggal</span>
                <span>
                    {{ $penjualan->created_at->format('d/m/Y H:i') }}
                </span>
            </div>

            <div class="d-flex justify-content-between">
                <span>Kasir</span>
                <span>{{ $penjualan->user->name }}</span>
            </div>
        </div>

        <hr>

        {{-- Daftar produk --}}
        @foreach($penjualan->itemPenjualan as $item)

            <div class="mb-2">

                <div class="fw-bold">
                    {{ $item->produk->nama }}
                </div>

                <div class="d-flex justify-content-between">
                    <span>
                        {{ $item->kuantitas }}
                        x
                        Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}
                    </span>

                    <span>
                        Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                    </span>
                </div>

            </div>

        @endforeach

        <hr>

        {{-- Total --}}
        <div class="d-flex justify-content-between fw-bold fs-5">
            <span>TOTAL</span>

            <span>
                Rp {{ number_format($penjualan->total_pembayaran, 0, ',', '.') }}
            </span>
        </div>

        <div class="d-flex justify-content-between mt-2">
            <span>Pembayaran</span>
            <span>{{ $penjualan->metode_pembayaran }}</span>
        </div>

        <div class="d-flex justify-content-between">
            <span>Status</span>
            <span>{{ $penjualan->status }}</span>
        </div>

        <hr>

        <div class="text-center">
            <p class="mb-1">Terima kasih</p>
            <small>Barang yang sudah dibeli tidak dapat dikembalikan.</small>
        </div>

    </div>

    {{-- Tombol --}}
    <div class="text-center mt-3">

        <a href="{{ route('penjualan.index') }}"
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

@endsection