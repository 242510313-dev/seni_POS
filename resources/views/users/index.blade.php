
@extends('layouts.app')

@section('title', 'Users')

@section('content')

@include('layouts.navbar')

<div class="card shadow-sm border-0 rounded-4">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h2 class="fw-bold users-title mb-1">
                    <i class="bi bi-people-fill"></i> Users
                </h2>

                <small class="text-muted">
                    Kelola akun admin dan kasir
                </small>
            </div>

            <a href="{{ route('admin.users.create') }}"
               class="btn btn-soft-green rounded-pill px-4">
                <i class="bi bi-plus-circle"></i>
                Tambah User
            </a>

        </div>


        <form action="{{ route('admin.users') }}" method="GET">

            <div class="input-group mb-4">

                <span class="input-group-text bg-white">
                    <i class="bi bi-search search-icon"></i>
                </span>

                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Cari nama atau email..."
                    value="{{ request('search') }}"
                >

                <button class="btn btn-soft-green">
                    Cari
                </button>

            </div>

        </form>


        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>

                        <th>No</th>

                        <th>Nama</th>

                        <th>Email</th>

                        <th>Role</th>

                        <th width="180">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($users as $user)

                    <tr>

                        <td>{{ $users->firstItem() + $loop->index }}</td>

                        <td class="fw-semibold">
                            {{ $user->name }}
                        </td>

                        <td>{{ $user->email }}</td>

                        <td>

                            @if($user->role->name == 'admin')

                                <span class="badge badge-soft-green rounded-pill">
                                    Admin
                                </span>

                            @else

                                <span class="badge badge-soft-gray rounded-pill">
                                    Kasir
                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('admin.users.edit',$user->id) }}"
                               class="btn btn-sm btn-soft-green">

                                <i class="bi bi-pencil-square"></i>

                            </a>


                            <form
                                action="{{ route('admin.users.destroy',$user) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Yakin ingin menghapus user ini?')"
                                    class="btn btn-sm btn-soft-danger">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center py-5">

                            <i class="bi bi-inbox fs-1 empty-icon"></i>

                            <p class="mt-2 text-muted">
                                Tidak ada data user.
                            </p>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>


        <div class="d-flex justify-content-between align-items-center mt-4">

            <div class="text-muted small">

                Menampilkan
                <strong>{{ $users->firstItem() ?? 0 }}</strong>
                -
                <strong>{{ $users->lastItem() ?? 0 }}</strong>
                dari
                <strong>{{ $users->total() }}</strong>
                user

            </div>


            @if ($users->hasPages())

                <nav aria-label="Pagination">

                    <ul class="pagination mb-0">

                        {{-- Previous --}}

                        @if ($users->onFirstPage())

                            <li class="page-item disabled">

                                <span class="page-link">
                                    <i class="bi bi-chevron-left"></i>
                                </span>

                            </li>

                        @else

                            <li class="page-item">

                                <a class="page-link"
                                   href="{{ $users->previousPageUrl() }}">

                                    <i class="bi bi-chevron-left"></i>

                                </a>

                            </li>

                        @endif


                        {{-- Nomor halaman --}}

                        @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)

                            @if ($page == $users->currentPage())

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

                        @if ($users->hasMorePages())

                            <li class="page-item">

                                <a class="page-link"
                                   href="{{ $users->nextPageUrl() }}">

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

</div>

@endsection

