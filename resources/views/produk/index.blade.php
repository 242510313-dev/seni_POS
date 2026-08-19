@extends('layouts.app')

@section('title', 'Produk')

@section('content')

@include('layouts.navbar')

@extends('layouts.app')

@section('title','Produk')

@section('content')

<h1>Halaman Produk</h1>



<a href="{{ route('produk.create') }}" method="GET" class="btn btn-primary mb-3">create</a>

<form action="{{ route('produk.index') }}" method="GET" class="mb-3">
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
    @forelse ($products as $product)
    <tr>
      <th scope="row">{{ $products->firstItem() + $loop->index }}</th>
      <td>{{ $product->user->name }}</td>
      <td>
        <img src="{{ asset('storage/'.$product->foto) }}"
     width="100"
     class="img-thumbnail">
</td>
      <td>{{ $product->nama }}</td>
      <td>{{ $product->harga_beli }}</td>
      <td>{{ $product->harga_jual }}</td>
      <td>{{ $product->stok }}</td>
      <td class="d-flex gap-1">
    <a href="{{ route('produk.edit', $product) }}" class="btn btn-warning">Edit</a>
||

<form action="{{ route('produk.destroy', $product) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus user ini?')">
        Hapus
    </button>
    </form>
</td>
    </tr>
    @empty
    <tr>
      <td colspan="8"><h1>Data tidak tersedia.</h1></td>
    </tr>
    @endforelse
  </tbody>
</table>

<!-- Pagination info & links di bawah tabel -->
<div class="d-flex justify-content-between align-items-center mt-3">
  <div>
    Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} results
  </div>
  <div class="d-flex justify-content-between align-items-center mt-4">

    <div class="text-muted small">
        Menampilkan
        <strong>{{$products->firstItem() ?? 0 }}</strong>
        -
        <strong>{{ $products->lastItem() ?? 0 }}</strong>
        dari
        <strong>{{ $products->total() }}</strong>
        products
    </div>

    @if ($products->hasPages())
        <nav aria-label="Pagination">
            <ul class="pagination mb-0">

                {{-- Previous --}}
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

                {{-- Nomor halaman --}}
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

                {{-- Next --}}
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

@endsection