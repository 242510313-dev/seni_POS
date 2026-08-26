@extends('layouts.app')

@section('title', 'Penjualan')

@section('content')

@include('layouts.navbar')

<style>
    body {
        background: #f5fbf7;
    }

    .penjualan-wrapper {
        padding-top: 35px;
        padding-bottom: 50px;
    }

    .penjualan-title {
        color: #9ACF9D;
        font-size: 38px;
        font-weight: 700;
        margin-bottom: 22px;
    }

    /* ALERT */
    .alert-danger {
        border: none;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    /* CREATE */
    .btn-create {
        background: #78B77D;
        border: none;
        color: white;
        font-weight: 600;
        border-radius: 6px;
        padding: 8px 14px;
    }

    .btn-create:hover {
        background: #68A96E;
        color: white;
    }

    /* SEARCH */
    .search-box {
        background: white;
        border: 1px solid #dcebdd;
        border-radius: 10px;
        overflow: hidden;
    }

    .search-box .form-control {
        border: none;
        box-shadow: none;
        padding: 10px 12px;
    }

    .search-box .form-control:focus {
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

    /* TABLE CARD */
    .penjualan-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        border: none;
        box-shadow: 0 4px 15px rgba(45, 106, 79, 0.06);
    }

    .penjualan-table {
        margin: 0;
    }

    .penjualan-table thead {
        background: #ffffff;
    }

    .penjualan-table thead th {
        color: #86BD8B;
        font-weight: 600;
        font-size: 14px;
        border-bottom: 1px solid #e1e8e2;
        padding: 13px 10px;
        white-space: nowrap;
    }

    .penjualan-table tbody td,
    .penjualan-table tbody th {
        padding: 14px 10px;
        vertical-align: middle;
        border-bottom: 1px solid #e1e5e8;
        font-size: 14px;
    }

    .penjualan-table tbody tr:last-child td,
    .penjualan-table tbody tr:last-child th {
        border-bottom: none;
    }

    .penjualan-table tbody tr:hover {
        background: #f8fcf8;
    }

    /* TOTAL */
    .total-pembayaran {
        white-space: nowrap;
        color: #111111;
    }

    /* STATUS */
    .status-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .status-completed {
        background: #d9f2dc;
        color: #4f8755;
    }

    .status-open {
        background: #fff0d5;
        color: #a87520;
    }

    .status-cancelled {
        background: #fde0e0;
        color: #c44545;
    }

    .status-default {
        background: #edf1ee;
        color: #68736c;
    }

    /* METODE PEMBAYARAN */
    .payment-method {
        font-weight: 500;
        color: #111111;
    }

    /* BUTTON */
    .btn-detail {
        background: #78B77D;
        border: none;
        color: white;
        font-weight: 600;
        border-radius: 6px;
        padding: 8px 13px;
    }

    .btn-detail:hover {
        background: #68A96E;
        color: white;
    }

    .btn-edit {
        background: #69B96F;
        border: none;
        color: white;
        font-weight: 600;
        border-radius: 6px;
        padding: 8px 13px;
    }

    .btn-edit:hover {
        background: #5EAA64;
        color: white;
    }

    .btn-hapus {
        background: #F05252;
        border: none;
        color: white;
        font-weight: 600;
        border-radius: 6px;
        padding: 8px 13px;
    }

    .btn-hapus:hover {
        background: #dc4444;
        color: white;
    }

    .aksi {
        white-space: nowrap;
    }

    .aksi-separator {
        color: #777;
        margin: 0 3px;
    }

    /* PAGINATION */
    .pagination-wrapper {
        padding: 18px 20px;
        background: white;
        border-top: 1px solid #e5e9e6;
    }

    .pagination .page-link {
        color: #6e7b83;
        border-color: #dce3e0;
    }

    .pagination .page-item.active .page-link {
        background: #83C987;
        border-color: #83C987;
        color: white;
    }

    .pagination .page-link:hover {
        background: #eef8ef;
        color: #4f8755;
    }

    .pagination .page-item.disabled .page-link {
        color: #b5bdb8;
        background: #f5f7f6;
    }

    /* EMPTY */
    .empty-data {
        padding: 40px !important;
        color: #8b9690;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {

        .penjualan-title {
            font-size: 30px;
        }

        .penjualan-card {
            overflow-x: auto;
        }

        .penjualan-table {
            min-width: 1050px;
        }

        .pagination-wrapper {
            min-width: 1050px;
        }
    }
</style>


<div class="container penjualan-wrapper">

    {{-- ALERT ERROR --}}
    @if(session('errors'))

        <div class="alert alert-danger">
            {{ session('errors') }}
        </div>

    @endif


    {{-- JUDUL --}}
    <h1 class="penjualan-title">
        Halaman Penjualan
    </h1>


    {{-- CREATE --}}
    <div class="mb-3">

        <a href="{{ route('penjualan.create') }}"
           class="btn btn-create">

            Create

        </a>

    </div>


    {{-- SEARCH --}}
    <form action="{{ route('penjualan.index') }}"
          method="GET"
          class="mb-3">

        <div class="input-group search-box">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                class="form-control"
                placeholder="Search penjualan"
            >

            <button class="btn btn-search"
                    type="submit">

                Search

            </button>

        </div>

    </form>


    {{-- TABLE --}}
    <div class="penjualan-card">

        <table class="table penjualan-table align-middle">

            <thead>

                <tr>

                    <th width="50">
                        #
                    </th>

                    <th>
                        Tanggal Transaksi
                    </th>

                    <th>
                        Kasir
                    </th>

                    <th>
                        Total Pembayaran
                    </th>

                    <th>
                        Metode Pembayaran
                    </th>

                    <th>
                        Status
                    </th>

                    <th width="250">
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($sales as $sale)

                    <tr>

                        {{-- NOMOR --}}
                        <th scope="row">

                            {{ $sales->firstItem() + $loop->index }}

                        </th>


                        {{-- TANGGAL --}}
                        <td>

                            {{ $sale->created_at->translatedFormat('d-m-Y H:i:s') }}

                        </td>


                        {{-- KASIR --}}
                        <td>

                            {{ $sale->user->name ?? '-' }}

                        </td>


                        {{-- TOTAL --}}
                        <td class="total-pembayaran">

                            Rp.{{ number_format($sale->total_pembayaran, 0, ',', '.') }}

                        </td>


                        {{-- METODE --}}
                        <td class="payment-method">

                            {{ $sale->metode_pembayaran }}

                        </td>


                        {{-- STATUS --}}
                        <td>

                            @php
                                $status = strtoupper($sale->status);
                            @endphp

                            @if($status === 'COMPLETED')

                                <span class="status-badge status-completed">
                                    COMPLETED
                                </span>

                            @elseif($status === 'OPEN')

                                <span class="status-badge status-open">
                                    OPEN
                                </span>

                            @elseif($status === 'CANCELLED')

                                <span class="status-badge status-cancelled">
                                    CANCELLED
                                </span>

                            @else

                                <span class="status-badge status-default">
                                    {{ $sale->status }}
                                </span>

                            @endif

                        </td>


                        {{-- AKSI --}}
                        <td class="aksi">

                            {{-- DETAIL --}}
                            <a href="{{ route('penjualan.show', $sale) }}"
                               class="btn btn-detail btn-sm">

                                Detail

                            </a>


                            {{-- EDIT --}}
                            @can('view', $sale)

                                <span class="aksi-separator">
                                    ||
                                </span>

                                <a href="{{ route('penjualan.edit', $sale) }}"
                                   class="btn btn-edit btn-sm">

                                    Edit

                                </a>

                            @endcan


                            {{-- HAPUS --}}
                            @can('delete', $sale)

                                <span class="aksi-separator">
                                    ||
                                </span>

                                <form action="{{ route('penjualan.destroy', $sale) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-hapus btn-sm"
                                            onclick="return confirm('Apakah anda yakin akan menghapus penjualan ini?')">

                                        Hapus

                                    </button>

                                </form>

                            @endcan

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7"
                            class="text-center empty-data">

                            <i class="bi bi-receipt"
                               style="font-size: 32px;"></i>

                            <div class="mt-2">
                                Data penjualan tidak ditemukan.
                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>


        {{-- PAGINATION --}}
        @if($sales->total() > 0)

            <div class="pagination-wrapper">

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                    {{-- INFO --}}
                    <div class="text-muted small">

                        Menampilkan

                        <strong>
                            {{ $sales->firstItem() ?? 0 }}
                        </strong>

                        -

                        <strong>
                            {{ $sales->lastItem() ?? 0 }}
                        </strong>

                        dari

                        <strong>
                            {{ $sales->total() }}
                        </strong>

                        penjualan

                    </div>


                    {{-- PAGINATION --}}
                    @if ($sales->hasPages())

                        <nav aria-label="Pagination">

                            <ul class="pagination mb-0">

                                {{-- PREVIOUS --}}
                                @if ($sales->onFirstPage())

                                    <li class="page-item disabled">

                                        <span class="page-link">

                                            <i class="bi bi-chevron-left"></i>

                                        </span>

                                    </li>

                                @else

                                    <li class="page-item">

                                        <a class="page-link"
                                           href="{{ $sales->previousPageUrl() }}">

                                            <i class="bi bi-chevron-left"></i>

                                        </a>

                                    </li>

                                @endif


                                {{-- NOMOR HALAMAN --}}
                                @foreach ($sales->getUrlRange(1, $sales->lastPage()) as $page => $url)

                                    @if ($page == $sales->currentPage())

                                        <li class="page-item active">

                                            <span class="page-link">

                                                {{ $page }}

                                            </span>

                                        </li>

                                    @else

                                        <li class="page-item">

                                            <a class="page-link"
                                               href="{{ $url }}">

                                                {{ $page }}

                                            </a>

                                        </li>

                                    @endif

                                @endforeach


                                {{-- NEXT --}}
                                @if ($sales->hasMorePages())

                                    <li class="page-item">

                                        <a class="page-link"
                                           href="{{ $sales->nextPageUrl() }}">

                                            <i class="bi bi-chevron-right"></i>

                                        </a>

                                    </li>

                                @else

                                    <li class="page-item disabled">

                                        <span class="page-link">

                                            <i class="bi bi-chevron-right"></i>

                                        </span>

                                    </li>

                                @endif

                            </ul>

                        </nav>

                    @endif

                </div>

            </div>

        @endif

    </div>

</div>

@endsection
