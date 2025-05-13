@extends('layouts.dashboard')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Capster</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('capsters.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Capster</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Masukkan nama capster" required>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Tempat test</label>
                        <input type="text" class="form-control" id="tempattinggal" name="tempattinggal"
                            placeholder="Masukkan  Tempat Tinggal" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            placeholder="Masukkan nomor telepon" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email"
                            placeholder="Masukkan Email" required>
                    </div>

                    <div class="mb-3">
                        <label for="experience" class="form-label">Pengalaman (Tahun)</label>
                        <input type="number" class="form-control" id="experience" name="experience" min="0"
                            placeholder="Masukkan tahun pengalaman" required>
                    </div>


                    <div class="mb-3">
                        <label for="specialization" class="form-label">Spesialis</label>
                        <input type="text" class="form-control" id="specialization" name="specialization" min="0"
                            placeholder="Masukkan Spesialis Capster" required>
                    </div>

                    <div class="mb-3">
                        <label for="available" class="form-label">Available</label>
                        <select class="form-control" id="available" name="available" required>
                            <option value="1">Tersedia</option>
                            <option value="0">Tidak Tersedia</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="photo" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('capsters.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
