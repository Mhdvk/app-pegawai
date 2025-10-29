@extends('master')

@section('title', 'Tambah Absensi')

@section('content')
    @vite('resources/css/attendance-create.css')
    <div class="form-container">
        <h2>Tambah Data Absensi</h2>

        <form action="{{ route('attendance.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Karyawan</label>
                <select name="karyawan_id" required>
                    @foreach ($employees as $emp)
                        <option value="{{ $emp->id }}">{{ $emp->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" required>
            </div>

            <div class="form-group">
                <label>Waktu Masuk</label>
                <input type="time" name="waktu_masuk">
            </div>

            <div class="form-group">
                <label>Waktu Keluar</label>
                <input type="time" name="waktu_keluar">
            </div>

            <div class="form-group">
                <label>Status Absensi</label>
                <select name="status_absensi" required>
                    <option value="hadir">Hadir</option>
                    <option value="izin">Izin</option>
                    <option value="sakit">Sakit</option>
                    <option value="alpha">Alpha</option>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit">Simpan</button>
                <button type="button" class="cancel-btn"
                    onclick="window.location='{{ route('attendance.index') }}'">Batal</button>
            </div>

        </form>
    </div>
@endsection
