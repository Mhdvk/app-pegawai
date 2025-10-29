@extends('master')

@section('title', 'Edit Data Gaji')

@section('content')
    @vite('resources/css/salaries-edit.css')

    <div class="form-container">
        <h2>Edit Data Gaji</h2>

        <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Karyawan:</label>
                <select name="karyawan_id" required>
                    <option value="">-- Pilih Karyawan --</option>
                    @foreach($employees as $emp)
                        <option value="{{ $emp->id }}" {{ $salary->karyawan_id == $emp->id ? 'selected' : '' }}>
                            {{ $emp->nama_lengkap }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Bulan</label>
                <input type="text" name="bulan" value="{{ $salary->bulan }}" required>
            </div>

            <div class="form-group">
                <label>Gaji Pokok</label>
                <input type="text" name="gaji_pokok" value="{{ $salary->gaji_pokok }}" required>
            </div>

            <div class="form-group">
                <label>Tunjangan</label>
                <input type="text" name="tunjangan" value="{{ $salary->tunjangan }}" required>
            </div>

            <div class="form-group">
                <label>Potongan</label>
                <input type="text" name="potongan" value="{{ $salary->potongan }}">
            </div>

            <div class="form-actions">
                <button type="submit">Update</button>
                <a href="{{ route('salaries.index') }}">
                    <button type="button" class="cancel-btn">Kembali</button>
                </a>
            </div>
        </form>
    </div>
@endsection
