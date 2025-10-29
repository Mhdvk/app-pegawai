@extends('master')

@section('title', 'Tambah Departemen')

@section('content')
    @vite('resources/css/departments-create.css')

    <div class="form-container">
        <h2>Tambah Departemen Baru</h2>
        <form action="{{ route('departments.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_departemen">Nama Departemen</label>
                <input type="text" name="nama_departemen" id="nama_departemen" required>
            </div>
            <div class="form-actions">
                <button type="submit">Simpan</button>
                <a href="{{ route('departments.index') }}">Batal</a>
            </div>
        </form>
    </div>
@endsection
