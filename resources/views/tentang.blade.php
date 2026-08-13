@extends('layouts.app') 

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 rounded-4 shadow-sm mb-4" style="background: linear-gradient(135deg, #e8f5e9 0%, #f1f8e9 100%);">
                <div class="card-body p-4 p-md-5 text-center">
                    <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm mb-3" style="width: 70px; height: 70px;">
                        <span style="font-size: 2rem;">🌿</span>
                    </div>
                    <h2 class="fw-bold mb-2" style="color: #388e3c;">Tentang Aplikasi POS</h2>
                    <p class="mb-0" style="color: #66bb6a; font-weight: 500;">Solusi Manajemen Kasir & Stok Ringan</p>
                </div>
            </div>

            <div class="card border-0 rounded-4 shadow-sm" style="background-color: #ffffff;">
                <div class="card-body p-4 p-md-5">
                    <h5 class="fw-semibold mb-3" style="color: #4caf50;">Deskripsi Sistem</h5>
                    <p class="lh-lg mb-4" style="color: #5a6e5f; font-size: 0.95rem;">
                        Aplikasi Point of Sale (POS) ini dirancang khusus untuk mempermudah operasional harian usaha Anda. Mulai dari pencatatan data produk, pemantauan status inventaris, hingga pembuatan laporan transaksi penjualan—semuanya dikelola dalam satu platform yang responsif dan efisien.
                    </p>

                    <div class="p-3 rounded-3 mb-4" style="background-color: #f4fbf7; border-left: 4px solid #a5d6a7;">
                        <span class="d-block text-muted small">Catatan Sistem</span>
                        <span class="small" style="color: #43a047;">Semua data tersinkronisasi secara langsung untuk meminimalkan selisih stok.</span>
                    </div>

                    <hr class="my-4" style="border-color: #e8f5e9;">

                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="p-3 rounded-3" style="background-color: #fafafa; border: 1px solid #e8f5e9;">
                                <div class="text-muted small mb-1">Versi Sistem</div>
                                <div class="fw-bold" style="color: #2e7d32;">v1.0.0 (Stable)</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 rounded-3" style="background-color: #fafafa; border: 1px solid #e8f5e9;">
                                <div class="text-muted small mb-1">Pengembang</div>
                                <div class="fw-bold" style="color: #2e7d32;">Tim Pengembang POS</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="text-center mt-4">
                <small style="color: #a5d6a7;">&copy; {{ date('Y') }} POS System. All rights reserved.</small>
            </div>
        </div>
    </div>
</div>
@endsection