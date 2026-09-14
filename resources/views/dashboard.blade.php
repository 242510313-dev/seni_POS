@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

@include('layouts.navbar')

<style>
    body {
        background: #f5fbf7;
    }

    /* =========================
       GLOBAL
    ========================= */

    .dashboard-wrapper {
        padding-bottom: 50px;
    }

    .page-title {
        color: #2d6a4f;
        font-weight: 700;
    }

    .section-title {
        color: #2d6a4f;
        font-weight: 700;
        margin: 0;
        font-size: 22px;
    }

    .section-subtitle {
        color: #8aa08f;
        font-size: 14px;
        margin-top: 3px;
    }

    /* =========================
       WELCOME CARD
    ========================= */

    .welcome-card {
        background: linear-gradient(
            135deg,
            #eef6ed 0%,
            #f8fbf7 100%
        );
        border: 1px solid #d8e6d8;
        border-radius: 24px;
        padding: 28px 32px;
        margin-bottom: 32px;
        min-height: 150px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        box-shadow: 0 8px 25px rgba(45, 106, 79, 0.05);
    }

    .welcome-small {
        color: #3f5147;
        font-size: 15px;
        font-weight: 600;
        margin-bottom: 7px;
    }

    .welcome-title {
        color: #2d6a4f;
        font-size: 30px;
        font-weight: 700;
        margin-bottom: 7px;
    }

    .welcome-date {
        color: #819183;
        font-size: 14px;
    }

    .welcome-icon {
        width: 72px;
        height: 72px;
        border-radius: 22px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #8ca796;
        color: white;

        font-size: 30px;

        box-shadow: 0 10px 25px rgba(45, 106, 79, 0.15);
    }

    /* =========================
       SECTION HEADER
    ========================= */

    .section-header {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 18px;
    }

    .section-icon {
        width: 44px;
        height: 44px;
        border-radius: 14px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #eef5eb;
        color: #6f917b;
        font-size: 20px;
        flex-shrink: 0;
    }

    /* =========================
       STAT CARDS
    ========================= */

    .stat-card {
        height: 130px;
        background: #ffffff;

        border: 1px solid #dfe9df;
        border-radius: 20px;

        padding: 24px;

        display: flex;
        align-items: center;
        gap: 18px;

        box-shadow: 0 6px 20px rgba(45, 106, 79, 0.05);

        transition: all .2s ease;
    }

    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 28px rgba(45, 106, 79, 0.10);
    }

    .stat-icon {
        width: 60px;
        height: 60px;

        border-radius: 17px;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 25px;

        flex-shrink: 0;
    }

    .stat-icon.green {
        background: #edf4eb;
        color: #72977f;
    }

    .stat-icon.blue {
        background: #edf0f6;
        color: #7187a1;
    }

    .stat-label {
        color: #7f8f82;
        font-size: 14px;
        margin-bottom: 4px;
    }

    .stat-value {
        color: #587b64;
        font-size: 25px;
        font-weight: 700;
        line-height: 1.2;
        margin-bottom: 7px;
    }

    .stat-description {
        color: #9aaa9d;
        font-size: 13px;
    }

    /* =========================
       INVENTORY CARDS
    ========================= */

    .inventory-card {
        background: #f3f7f1;
        border: 1px solid #dfe8dc;
        border-radius: 20px;
        padding: 20px;

        min-height: 100px;

        display: flex;
        align-items: center;
        gap: 14px;
    }

    .inventory-icon {
        width: 44px;
        height: 44px;
        border-radius: 13px;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 19px;
        flex-shrink: 0;
    }

    .inventory-icon.warning {
        background: #f9edda;
        color: #dcae69;
    }

    .inventory-icon.danger {
        background: #f7e5e5;
        color: #c87575;
    }

    .inventory-title {
        color: #56775f;
        font-weight: 700;
        font-size: 16px;
        margin-bottom: 3px;
    }

    .inventory-description {
        color: #98a79a;
        font-size: 13px;
    }

    .inventory-count {
        margin-left: auto;
        font-size: 22px;
        font-weight: 700;
        color: #5f8069;
    }

    /* =========================
       TABLE CARD
    ========================= */

    .table-card {
        background: #ffffff;
        border: 1px solid #dfe9df;
        border-radius: 20px;
        overflow: hidden;

        box-shadow: 0 6px 20px rgba(45, 106, 79, 0.05);
    }

    .table-card .table {
        margin-bottom: 0;
    }

    .table-card .table thead {
        background: #d8f3dc;
        color: #2d6a4f;
    }

    .table-card .table thead th {
        border: none;
        padding: 14px 18px;
        font-size: 13px;
        font-weight: 700;
    }

    .table-card .table tbody td {
        padding: 15px 18px;
        border-color: #edf2ed;
        color: #718074;
        font-size: 14px;
    }

    .table-card .table-hover tbody tr:hover {
        background: #eefbf1;
    }

    /* =========================
       BADGES
    ========================= */

    .badge-soft-warning {
        background: #f7e8cc;
        color: #b27b2c;
        border-radius: 9px;
        padding: 6px 10px;
    }

    .badge-soft-danger {
        background: #f4dcdc;
        color: #b75f5f;
        border-radius: 9px;
        padding: 6px 10px;
    }

    .badge-soft-green {
        background: #b7e4c7;
        color: #1b4332;
        border-radius: 9px;
        padding: 7px 13px;
        font-size: 14px;
    }

    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 768px) {

        .welcome-card {
            padding: 22px;
            min-height: auto;
        }

        .welcome-title {
            font-size: 24px;
        }

        .welcome-icon {
            width: 58px;
            height: 58px;
            font-size: 24px;
        }

        .stat-card {
            height: auto;
            min-height: 120px;
            padding: 18px;
        }

        .section-title {
            font-size: 19px;
        }
    }
</style>


<div class="dashboard-wrapper">

    {{-- =========================
         WELCOME
    ========================= --}}
    <div class="welcome-card">

        <div>
            <div class="welcome-small">
                ✨ &nbsp; Selamat Datang di Midori Bakery
            </div>

            <div class="welcome-title">
                Ringkasan Hari Ini
            </div>

            <div class="welcome-date">
                <i class="bi bi-calendar3 me-1"></i>
                {{ $tanggalHariIni->translatedFormat('l, d F Y') }}
            </div>
        </div>

        <div class="welcome-icon">
            <i class="bi bi-bar-chart-fill"></i>
        </div>

    </div>


    @can('viewAny', App\Models\User::class)

    {{-- =========================
         PENJUALAN HARI INI
    ========================= --}}
    <div class="section-header">

        <div class="section-icon">
            <i class="bi bi-cash-stack"></i>
        </div>

        <div>
            <h3 class="section-title">
                Penjualan Hari Ini
            </h3>

            <div class="section-subtitle">
                Ringkasan transaksi yang terjadi hari ini
            </div>
        </div>

    </div>


    <div class="row g-4 mb-4">

        {{-- TOTAL PENJUALAN --}}
        <div class="col-md-6">

            <div class="stat-card">

                <div class="stat-icon green">
                    <i class="bi bi-wallet2"></i>
                </div>

                <div>

                    <div class="stat-label">
                        Total Nilai Penjualan
                    </div>

                    <div class="stat-value">
                        Rp {{ number_format($ringkasan['total_penjualan'] ?? 0,0,',','.') }}
                    </div>

                    <div class="stat-description">
                        <i class="bi bi-graph-up-arrow me-1"></i>
                        Penjualan hari ini
                    </div>

                </div>

            </div>

        </div>


        {{-- TOTAL TRANSAKSI --}}
        <div class="col-md-6">

            <div class="stat-card">

                <div class="stat-icon blue">
                    <i class="bi bi-receipt"></i>
                </div>

                <div>

                    <div class="stat-label">
                        Jumlah Transaksi
                    </div>

                    <div class="stat-value">
                        {{ $ringkasan['total_transaksi'] ?? 0 }}
                    </div>

                    <div class="stat-description">
                        <i class="bi bi-cart-check me-1"></i>
                        Transaksi selesai hari ini
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================
         STATUS PEMBAYARAN
    ========================= --}}
    <div class="section-header mt-4">

        <div class="section-icon">
            <i class="bi bi-credit-card"></i>
        </div>

        <div>
            <h3 class="section-title">
                Status Pembayaran
            </h3>

            <div class="section-subtitle">
                Ringkasan metode pembayaran hari ini
            </div>
        </div>

    </div>


    <div class="row g-4 mb-4">

        {{-- CASH --}}
        <div class="col-md-6">

            <div class="stat-card">

                <div class="stat-icon green">
                    <i class="bi bi-cash-coin"></i>
                </div>

                <div>

                    <div class="stat-label">
                        Total Pembayaran Tunai
                    </div>

                    <div class="stat-value">
                        Rp {{ number_format($ringkasan['total_cash'] ?? 0,0,',','.') }}
                    </div>

                    <div class="stat-description">
                        <i class="bi bi-check-circle-fill me-1"></i>
                        Pembayaran CASH
                    </div>

                </div>

            </div>

        </div>


        {{-- NON TUNAI --}}
        <div class="col-md-6">

            <div class="stat-card">

                <div class="stat-icon blue">
                    <i class="bi bi-credit-card"></i>
                </div>

                <div>

                    <div class="stat-label">
                        Total Pembayaran Non-Tunai
                    </div>

                    <div class="stat-value">
                        Rp {{ number_format($ringkasan['total_non_tunai'] ?? 0,0,',','.') }}
                    </div>

                    <div class="stat-description">
                        <i class="bi bi-credit-card me-1"></i>
                        Pembayaran non-tunai
                    </div>

                </div>

            </div>

        </div>

    </div>

    @endcan


    {{-- =========================
         STATUS PERSEDIAAN
    ========================= --}}
    <div class="section-header mt-4">

        <div class="section-icon">
            <i class="bi bi-box-seam"></i>
        </div>

        <div>
            <h3 class="section-title">
                Status Persediaan
            </h3>

            <div class="section-subtitle">
                Pantau kondisi stok produk
            </div>
        </div>

    </div>


    <div class="row g-4 mb-5">

        {{-- STOK RENDAH --}}
        <div class="col-md-6">

            <div class="inventory-card">

                <div class="inventory-icon warning">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                </div>

                <div>

                    <div class="inventory-title">
                        Stok Rendah
                    </div>

                    <div class="inventory-description">
                        Produk yang perlu segera diperhatikan
                    </div>

                </div>

                <div class="inventory-count">
                    {{ $produkStokRendah->total() }}
                </div>

            </div>

        </div>


        {{-- STOK HABIS --}}
        <div class="col-md-6">

            <div class="inventory-card">

                <div class="inventory-icon danger">
                    <i class="bi bi-x-circle-fill"></i>
                </div>

                <div>

                    <div class="inventory-title">
                        Stok Habis
                    </div>

                    <div class="inventory-description">
                        Produk yang sudah tidak tersedia
                    </div>

                </div>

                <div class="inventory-count">
                    {{ $produkStokHabis->total() }}
                </div>

            </div>

        </div>

    </div>


    {{-- =========================
         DETAIL STOK RENDAH & HABIS
    ========================= --}}
    <div class="row g-4 mb-5">

        {{-- STOK RENDAH --}}
        <div class="col-md-6">

            <div class="table-card">

                <div class="card-body p-3">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <div>
                            <h5 class="fw-bold text-green-main mb-1">
                                Daftar Produk Stok Rendah
                            </h5>

                            <small class="text-muted">
                                Produk yang membutuhkan perhatian
                            </small>
                        </div>

                        <span class="badge-soft-warning">
                            Peringatan
                        </span>

                    </div>


                    <div class="table-responsive">

                        <table class="table table-hover align-middle">

                            <thead>
                                <tr>
                                    <th width="10%">#</th>
                                    <th>Nama</th>
                                    <th width="25%">Stok</th>
                                </tr>
                            </thead>

                            <tbody>

                            @forelse($produkStokRendah as $index => $produk)

                                <tr>

                                    <td>
                                        {{ $produkStokRendah->firstItem() + $index }}
                                    </td>

                                    <td class="fw-semibold text-green-dark">
                                        {{ $produk->nama }}
                                    </td>

                                    <td>
                                        <span class="badge-soft-warning">
                                            {{ $produk->stok }}
                                        </span>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="3"
                                        class="text-center text-muted py-3">
                                        Seluruh produk berada dalam kondisi stok aman.
                                    </td>
                                </tr>

                            @endforelse

                            </tbody>

                        </table>

                    </div>


                    <div class="mt-3">
                        {{ $produkStokRendah->links() }}
                    </div>

                </div>

            </div>

        </div>


        {{-- STOK HABIS --}}
        <div class="col-md-6">

            <div class="table-card">

                <div class="card-body p-3">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <div>
                            <h5 class="fw-bold text-green-main mb-1">
                                Produk Habis Stok
                            </h5>

                            <small class="text-muted">
                                Produk yang sudah tidak tersedia
                            </small>
                        </div>

                        <span class="badge-soft-danger">
                            Kritis
                        </span>

                    </div>


                    <div class="table-responsive">

                        <table class="table table-hover align-middle">

                            <thead>
                                <tr>
                                    <th width="10%">#</th>
                                    <th>Nama</th>
                                    <th width="25%">Stok</th>
                                </tr>
                            </thead>

                            <tbody>

                            @forelse($produkStokHabis as $index => $produk)

                                <tr>

                                    <td>
                                        {{ $produkStokHabis->firstItem() + $index }}
                                    </td>

                                    <td class="fw-semibold text-green-dark">
                                        {{ $produk->nama }}
                                    </td>

                                    <td>
                                        <span class="badge-soft-danger">
                                            {{ $produk->stok }}
                                        </span>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="3"
                                        class="text-center text-muted py-3">
                                        Seluruh produk berada dalam kondisi stok aman.
                                    </td>
                                </tr>

                            @endforelse

                            </tbody>

                        </table>

                    </div>


                    <div class="mt-3">
                        {{ $produkStokHabis->links() }}
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================
         BEST SELLER
    ========================= --}}
    <div class="section-header">

        <div class="section-icon">
            <i class="bi bi-box-seam"></i>
        </div>

        <div>
            <h3 class="section-title">
                Produk Terlaris
            </h3>

            <div class="section-subtitle">
                Produk dengan jumlah penjualan terbanyak
            </div>
        </div>

    </div>


    <div class="table-card">

        <div class="card-body p-3">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th width="20%">Stok</th>
                            <th width="20%">Unit Terjual</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($produkTerlaris as $produk)

                        <tr>

                            <td class="fw-semibold text-green-dark">
                                {{ $produk->nama }}
                            </td>

                            <td>
                                {{ $produk->stok }}
                            </td>

                            <td>
                                <span class="badge-soft-green">
                                    {{ $produk->total_terjual }}
                                </span>
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="3"
                                class="text-center text-muted py-4">

                                Belum ada data penjualan.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection
