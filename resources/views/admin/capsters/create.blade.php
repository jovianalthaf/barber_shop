@extends('layouts.dashboard')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Capster</h4>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('capsters.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Capster</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}" placeholder="Masukkan nama capster" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tempat_tinggal" class="form-label">Tempat Tinggal</label>
                        <input type="text" class="form-control @error('tempat_tinggal') is-invalid @enderror"
                            id="tempat_tinggal" name="tempat_tinggal" value="{{ old('tempat_tinggal') }}"
                            placeholder="Masukkan Tempat Tinggal" required>
                        @error('tempat_tinggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                            name="phone" value="{{ old('phone') }}" placeholder="Masukkan nomor telepon" required>
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email') }}" placeholder="Masukkan Email" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="experience" class="form-label">Pengalaman (Tahun)</label>
                        <input type="number" class="form-control @error('experience') is-invalid @enderror" id="experience"
                            name="experience" min="0" value="{{ old('experience') }}"
                            placeholder="Masukkan tahun pengalaman" required>
                        @error('experience')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="specialization" class="form-label">Spesialis</label>
                        <input type="text" class="form-control @error('specialization') is-invalid @enderror"
                            id="specialization" name="specialization" value="{{ old('specialization') }}"
                            placeholder="Masukkan Spesialis Capster" required>
                        @error('specialization')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="available" class="form-label">Available</label>
                        <select class="form-control @error('available') is-invalid @enderror" id="available"
                            name="available" required>
                            <option value="1" {{ old('available') == '1' ? 'selected' : '' }}>Tersedia</option>
                            <option value="0" {{ old('available') == '0' ? 'selected' : '' }}>Tidak Tersedia</option>
                        </select>
                        @error('available')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto"
                            name="foto" accept="image/*">
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('capsters.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
