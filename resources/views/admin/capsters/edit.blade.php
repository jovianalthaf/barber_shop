@extends('layouts.dashboard')
@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h4>Edit Capster</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('capsters.update', $capster->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Untuk HTTP method PUT -->

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Capster</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $capster->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="tempat_tinggal" class="form-label">Tempat Tinggal</label>
                        <input type="text" class="form-control" id="tempatt_inggal" name="tempat_tinggal"
                            value="{{ $capster->tempat_tinggal }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            value="{{ $capster->phone }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $capster->email }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="experience" class="form-label">Pengalaman (Tahun)</label>
                        <input type="number" class="form-control" id="experience" name="experience"
                            value="{{ $capster->experience }}" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label for="specialization" class="form-label">Spesialis</label>
                        <input type="text" class="form-control" id="specialization" name="specialization"
                            value="{{ $capster->specialization }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="available" class="form-label">Available</label>
                        <select class="form-control" id="available" name="available" required>
                            <option value="1" {{ $capster->available == 1 ? 'selected' : '' }}>Tersedia</option>
                            <option value="0" {{ $capster->available == 0 ? 'selected' : '' }}>Tidak Tersedia</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                        @if ($capster->foto)
                            <p class="mt-2">Foto saat ini:</p>
                            <img src="{{ asset('storage/' . $capster->foto) }}" alt="Foto Capster" width="150">
                        @endif
                    </div>


                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('capsters.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
