@extends('master')

@section('title', 'Edit Departemen')

@section('content')
    @vite('resources/css/departments-edit.css')

    <div class="form-container">
        <h2>Edit Departemen</h2>
        <form action="{{ route('departments.update', $department->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_departemen">Nama Departemen</label>
                <input type="text" name="nama_departemen" id="nama_departemen" 
                       value="{{ old('nama_departemen', $department->nama_departemen) }}" required>
            </div>

            <div class="form-actions">
                <button type="submit">Update</button>
                <button type="button" class="btn-cancel" onclick="window.location='{{ route('departments.index') }}'">Kembali</button>
            </div>
        </form>
    </div>
@endsection
