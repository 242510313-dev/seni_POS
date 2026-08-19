@extends('layouts.app')

@section('title', 'Penjualan')

@section('content')

@include('layouts.navbar')

@if(session('errors'))


    <div class="alert alert-danger">
        {{ session('errors') }}
    </div>
@endif

<h1>Halaman Penjualan</h1>

<a href="{{ route('penjualan.create') }}" class="btn btn-primary mb-3">Create</a>

<form action="{{ route('penjualan.index') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input
            type="text"
            name="search"
            value="{{ request()->search }}"
            class="form-control"
            placeholder="Search penjualan"
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
            <th scope="col">Tanggal Transaksi</th>
            <th scope="col">Kasir</th>
            <th scope="col">Total Pembayaran</th>
            <th scope="col">Metode Pembayaran</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($sales as $sale)
        <tr>
            <th scope="row">{{$sales->firstItem() + $loop->index}}</th>
            <td>{{$sale->created_at->translatedFormat('d-m-Y H:i:s')}}</td>
            <td>{{$sale->user->name}}</td>
            <td>Rp.{{number_format($sale->total_pembayaran)}}</td>
            <td>{{$sale->metode_pembayaran}}</td>
            <td>{{$sale->status}}</td>
            <td class="d-flex gap-1">

            <a href="{{ route('penjualan.show', $sale) }}" class="btn btn-primary">
    Detail
</a>
                
                @can('view', $sale)
                ||
                <a href="{{ route('penjualan.edit', $sale) }}" class="btn btn-warning">Edit</a>
                ||
                @endcan
                @can('delete', $sale)
                <form action="{{ route('penjualan.destroy', $sale) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus penjualan ini?')">
                        Hapus
                    </button>
                </form>
                @endcan
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center">Data Tidak Ditemukan</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex justify-content-between align-items-center mt-4">

    <div class="text-muted small">
        Menampilkan
        <strong>{{ $sales->firstItem() ?? 0 }}</strong>
        -
        <strong>{{ $sales->lastItem() ?? 0 }}</strong>
        dari
        <strong>{{ $sales->total() }}</strong>
        user
    </div>

    @if ($sales->hasPages())
        <nav aria-label="Pagination">
            <ul class="pagination mb-0">

                {{-- Previous --}}
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

                {{-- Nomor halaman --}}
                @foreach ($sales->getUrlRange(1,$sales->lastPage()) as $page => $url)

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

                {{-- Next --}}
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

@endsection