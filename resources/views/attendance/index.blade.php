@extends('master')

@section('title', 'Data Absensi')

@section('content')
    @vite('resources/css/attendance-index.css')

    <link rel="stylesheet" href="{{ asset('resources/css/attendance.css') }}">
    <div class="container">
        <h1>Data Absensi</h1>
        <a href="{{ route('attendance.create') }}" class="btn">+ Tambah Absensi</a>

        <table>
            <thead>
                <tr>
                    <th>Karyawan</th>
                    <th>Tanggal</th>
                    <th>Waktu Masuk</th>
                    <th>Waktu Keluar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendance as $att)
                    <tr>
                        <td>{{ $att->employee->nama_lengkap }}</td>
                        <td>{{ $att->tanggal }}</td>
                        <td>{{ $att->waktu_masuk }}</td>
                        <td>{{ $att->waktu_keluar }}</td>
                        <td>{{ ucfirst($att->status_absensi) }}</td>
                        <td>
                            <button type="button" onclick="window.location='{{ route('attendance.edit', $att->id) }}'">
                                Edit
                            </button>

                            <form action="{{ route('attendance.destroy', $att->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
