@extends('master')
@section('title', 'Edit Jabatan')
@section('content')
@vite('resources/css/positions-edit.css')

<div class="form-container">
    <h2>Edit Jabatan</h2>

    <form action="{{ route('positions.update', $position->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_jabatan">Nama Jabatan:</label>
            <input type="text" id="nama_jabatan" name="nama_jabatan" value="{{ $position->nama_jabatan }}" required>
        </div>

        <div class="form-group">
            <label for="gaji_pokok">Gaji Pokok:</label>
            <input type="number" step="0.01" id="gaji_pokok" name="gaji_pokok" value="{{ $position->gaji_pokok }}" required>
        </div>

        <div class="form-actions">
            <button type="submit">Update</button>
            <button type="button" class="btn-cancel" onclick="window.location='{{ route('positions.index') }}'">Batal</button>
        </div>
    </form>
</div>
@endsection
