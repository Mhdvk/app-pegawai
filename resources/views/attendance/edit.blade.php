@extends('master')

@section('title', 'Edit Absensi')

@section('content')
    @vite('resources/css/attendance-edit.css')
    <link rel="stylesheet" href="{{ asset('resources/css/attendance.css') }}">
    <div class="form-container">
        <h2>Edit Data Absensi</h2>

        <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Karyawan</label>
                <select name="karyawan_id">
                    @foreach ($employees as $emp)
                        <option value="{{ $emp->id }}" {{ $attendance->karyawan_id == $emp->id ? 'selected' : '' }}>
                            {{ $emp->nama_lengkap }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" value="{{ $attendance->tanggal }}">
            </div>

            <div class="form-group">
                <label>Waktu Masuk</label>
                <input type="time" name="waktu_masuk" value="{{ $attendance->waktu_masuk }}">
            </div>

            <div class="form-group">
                <label>Waktu Keluar</label>
                <input type="time" name="waktu_keluar" value="{{ $attendance->waktu_keluar }}">
            </div>

            <div class="form-group">
                <label>Status Absensi</label>
                <select name="status_absensi">
                    @foreach (['hadir', 'izin', 'sakit', 'alpha'] as $status)
                        <option value="{{ $status }}" {{ $attendance->status_absensi == $status ? 'selected' : '' }}>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-actions">
                <button type="submit">Update</button>
                <button type="button" onclick="window.location='{{ route('attendance.index') }}'">
                    Batal
                </button>
            </div>
        </form>
    </div>
@endsection
