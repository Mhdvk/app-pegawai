@extends('master')
@section('title', 'Tambah Jabatan')
@section('content')
@vite('resources/css/positions-create.css')

<div class="form-container">
    <h2>Tambah Jabatan</h2>

    <form action="{{ route('positions.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama_jabatan">Nama Jabatan:</label>
            <input type="text" id="nama_jabatan" name="nama_jabatan" required>
        </div>

        <div class="form-group">
            <label for="gaji_pokok">Gaji Pokok:</label>
            <input type="number" step="0.01" id="gaji_pokok" name="gaji_pokok" required>
        </div>

        <div class="form-actions">
            <button type="submit">Simpan</button>
            <button type="button" class="btn-cancel" onclick="window.location='{{ route('positions.index') }}'">Batal</button>
        </div>
    </form>
</div>
@endsection
