@extends('layouts.app')

@section('title', 'Produk')

@section('content')

@include('layouts.navbar')

<style>
    body {
        background: #f5fbf7;
    }

    .produk-wrapper {
        padding-top: 35px;
        padding-bottom: 50px;
    }

    .produk-title {
        color: #9ACF9D;
        font-size: 38px;
        font-weight: 700;
        margin-bottom: 22px;
    }

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

    .produk-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        border: none;
        box-shadow: 0 4px 15px rgba(45, 106, 79, 0.06);
    }

    .produk-table {
        margin: 0;
    }

    .produk-table thead {
        background: #ffffff;
    }

    .produk-table thead th {
        color: #86BD8B;
        font-weight: 600;
        font-size: 14px;
        border-bottom: 1px solid #e1e8e2;
        padding: 13px 10px;
        white-space: nowrap;
    }

    .produk-table tbody td,
    .produk-table tbody th {
        padding: 15px 10px;
        vertical-align: middle;
        border-bottom: 1px solid #e1e5e8;
        font-size: 14px;
    }

    .produk-table tbody tr:last-child td,
    .produk-table tbody tr:last-child th {
        border-bottom: none;
    }

    .produk-table tbody tr:hover {
        background: #f8fcf8;
    }

    .produk-foto {
        width: 92px;
        height: 92px;
        object-fit: cover;
        border-radius: 7px;
        border: 1px solid #d9e1dc;
        padding: 3px;
        background: white;
    }

    .produk-foto-empty {
        width: 92px;
        height: 92px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f0f5f1;
        border: 1px solid #d9e1dc;
        border-radius: 7px;
        color: #91a096;
        font-size: 12px;
    }

    .nama-produk {
        font-weight: 500;
        color: #111111;
    }

    .harga {
        color: #111111;
        white-space: nowrap;
    }

    .stok {
        color: #111111;
    }

    .btn-edit {
        background: #69B96F;
        border: none;
        color: white;
        font-weight: 600;
        border-radius: 6px;
        padding: 8px 14px;
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
        padding: 8px 14px;
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
        margin: 0 4px;
    }

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

    .empty-data {
        padding: 35px !important;
        color: #8b9690;
    }

    @media (max-width: 768px) {

        .produk-title {
            font-size: 30px;
        }

        .produk-card {
            overflow-x: auto;
        }

        .produk-table {
            min-width: 950px;
        }

        .pagination-wrapper {
            min-width: 950px;
        }
    }
</style>


<div class="container produk-wrapper">

    {{-- JUDUL --}}
    <h1 class="produk-title">
        Halaman Produk
    </h1>


    {{-- TOMBOL CREATE --}}
    <div class="mb-3">

        <a href="{{ route('produk.create') }}"
           class="btn btn-create">

            Create

        </a>

    </div>


    {{-- SEARCH --}}
    <form action="{{ route('produk.index') }}"
          method="GET"
          class="mb-3">

        <div class="input-group search-box">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                class="form-control"
                placeholder="Search nama produk"
            >

            <button class="btn btn-search"
                    type="submit">

                Search

            </button>

        </div>

    </form>


    {{-- TABLE --}}
    <div class="produk-card">

        <table class="table produk-table align-middle">

            <thead>

                <tr>

                    <th width="50">
                        #
                    </th>

                    <th>
                        User
                    </th>

                    <th width="130">
                        Foto
                    </th>

                    <th>
                        Nama
                    </th>

                    <th>
                        Jenis
                    </th>

                    <th>
                        Harga Beli
                    </th>

                    <th>
                        Harga Jual
                    </th>

                    <th>
                        Stok
                    </th>

                    <th width="190">
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse ($products as $product)

                    <tr>

                        {{-- NOMOR --}}
                        <th scope="row">

                            {{ $products->firstItem() + $loop->index }}

                        </th>


                        {{-- USER --}}
                        <td>

                            {{ $product->user->name ?? '-' }}

                        </td>


                        {{-- FOTO --}}
                        <td>

                            @if($product->foto)

                                <img
                                    src="{{ asset('storage/' . $product->foto) }}"
                                    class="produk-foto"
                                    alt="{{ $product->nama }}"
                                >

                            @else

                                <div class="produk-foto-empty">

                                    Tidak ada foto

                                </div>

                            @endif

                        </td>


                        {{-- NAMA --}}
                        <td class="nama-produk">

                            {{ $product->nama }}

                        </td>


                        {{-- JENIS --}}
                        <td>

                            {{ $product->jenis->nama_jenis ?? '-' }}

                        </td>

                        {{-- HARGA BELI --}}
                        <td class="harga">

                            {{ number_format($product->harga_beli, 0, ',', '.') }}

                        </td>


                        {{-- HARGA JUAL --}}
                        <td class="harga">

                            {{ number_format($product->harga_jual, 0, ',', '.') }}

                        </td>


                        {{-- STOK --}}
                        <td class="stok">

                            {{ $product->stok }}

                        </td>


                        {{-- AKSI --}}
                        <td class="aksi">

                            <a href="{{ route('produk.edit', $product) }}"
                               class="btn btn-edit btn-sm">

                                Edit

                            </a>

                            <span class="aksi-separator">
                                ||
                            </span>


                            <form action="{{ route('produk.destroy', $product) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf

                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-hapus btn-sm"
                                        onclick="return confirm('Apakah anda yakin akan menghapus produk ini?')">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="9"
                            class="text-center empty-data">

                            <i class="bi bi-box-seam"
                               style="font-size: 30px;"></i>

                            <div class="mt-2">
                                Data produk tidak tersedia.
                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>


        {{-- PAGINATION --}}
        @if($products->total() > 0)

            <div class="pagination-wrapper">

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                    {{-- INFO --}}
                    <div class="text-muted small">

                        Menampilkan

                        <strong>
                            {{ $products->firstItem() ?? 0 }}
                        </strong>

                        -

                        <strong>
                            {{ $products->lastItem() ?? 0 }}
                        </strong>

                        dari

                        <strong>
                            {{ $products->total() }}
                        </strong>

                        products

                    </div>


                    {{-- PAGINATION --}}
                    @if ($products->hasPages())

                        <nav aria-label="Pagination">

                            <ul class="pagination mb-0">

                                {{-- PREVIOUS --}}
                                @if ($products->onFirstPage())

                                    <li class="page-item disabled">

                                        <span class="page-link">

                                            <i class="bi bi-chevron-left"></i>

                                        </span>

                                    </li>

                                @else

                                    <li class="page-item">

                                        <a class="page-link"
                                           href="{{ $products->previousPageUrl() }}">

                                            <i class="bi bi-chevron-left"></i>

                                        </a>

                                    </li>

                                @endif


                                {{-- NOMOR HALAMAN --}}
                                @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)

                                    @if ($page == $products->currentPage())

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
                                @if ($products->hasMorePages())

                                    <li class="page-item">

                                        <a class="page-link"
                                           href="{{ $products->nextPageUrl() }}">

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
