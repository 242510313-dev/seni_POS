@extends('layouts.app')

@section('title', 'Users')

@section('content')

@include('layouts.navbar')

<div class="card shadow-sm border-0 rounded-4">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h2 class="fw-bold text-success mb-1">
                    <i class="bi bi-people-fill"></i> Manajemen Users
                </h2>

                <small class="text-muted">
                    Kelola akun admin dan kasir
                </small>
            </div>

            <a href="{{ route('admin.users.create') }}" class="btn btn-success rounded-pill px-4">
                <i class="bi bi-plus-circle"></i>
                Tambah User
            </a>

        </div>

        <form action="{{ route('admin.users') }}" method="GET">

            <div class="input-group mb-4">

                <span class="input-group-text bg-white">
                    <i class="bi bi-search"></i>
                </span>

                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Cari nama atau email..."
                    value="{{ request('search') }}"
                >

                <button class="btn btn-success">
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

                                <span class="badge bg-success rounded-pill">
                                    Admin
                                </span>

                            @else

                                <span class="badge bg-secondary rounded-pill">
                                    Kasir
                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('admin.users.edit',$user->id) }}"
                               class="btn btn-sm btn-success">

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
                                    class="btn btn-sm btn-danger">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center py-5">

                            <i class="bi bi-inbox fs-1 text-success"></i>

                            <p class="mt-2 text-muted">
                                Tidak ada data user.
                            </p>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-4">

            {{ $users->links() }}

        </div>

    </div>

</div>

@endsection