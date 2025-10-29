@extends('master')

@section('title', 'Daftar Gaji')

@section('content')
    @vite('resources/css/salaries-index.css')

    <div class="container">
        <h1>Daftar Gaji</h1>

        <a href="{{ route('salaries.create') }}" class="btn">+ Tambah Gaji</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Karyawan</th>
                    <th>Jabatan</th>
                    <th>Bulan</th>
                    <th>Gaji Pokok</th>
                    <th>Tunjangan</th>
                    <th>Potongan</th>
                    <th>Total Gaji</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($salaries as $salary)
                    <tr>
                        <td>{{ $salary->id }}</td>
                        <td>{{ optional($salary->employee)->nama_lengkap ?? '-' }}</td>
                        <td>{{ optional($salary->employee->position)->nama_jabatan ?? '-' }}</td>
                        <td>{{ $salary->bulan }}</td>
                        <td>Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($salary->potongan, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</td>
                        <td class="actions">
                            <button type="button" class="btn-edit" onclick="window.location='{{ route('salaries.edit', $salary->id) }}'">
                                Edit
                            </button>
                            <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Hapus data gaji ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
