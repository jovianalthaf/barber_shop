@extends('layouts.dashboard')

@section('title', 'Daftar Capster')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-3">Daftar Capster</h2>

        <a href="{{ route('capsters.create') }}" class="btn btn-primary mb-3">+ Tambah Capster</a>

        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Tempat Tinggal</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($capsters as $capster)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $capster->name }}</td>
                        <td>{{ $capster->tempat_tinggal }}</td>
                        <td>{{ $capster->phone }}</td>
                        <td>{{ $capster->email }}</td>
                        <td>
                            <a href="{{ route('capsters.edit', $capster->id) }}" class="btn btn-warning btn-sm">✏ Edit</a>
                            <form action="{{ route('capsters.destroy', $capster->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus?')">🗑 Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
