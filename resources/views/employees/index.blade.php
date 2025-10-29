@extends('master')
@section('title', 'Daftar Pegawai')
@section('content')
    @vite('resources/css/employee-index.css')


    <div class="container mt-5">
        <h1 class="mb-4">Daftar Pegawai</h1>
        <a href="{{ route('employees.create') }}" class="btn-add">+ Tambah Pegawai</a>

        <table border="1" cellpadding="5" cellspacing="0" width="100%">
            <thead style="background-color: #f2f2f2;">
                <tr style="text-align: center;">
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Tanggal Masuk</th>
                    <th>Departemen</th>
                    <th>Posisi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->nama_lengkap }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->nomor_telepon }}</td>
                        <td>{{ $employee->tanggal_lahir }}</td>
                        <td>{{ $employee->alamat }}</td>
                        <td>{{ $employee->tanggal_masuk }}</td>
                        <td>{{ $employee->department->nama_departemen ?? '-' }}</td>
                        <td>{{ $employee->position->nama_jabatan ?? '-' }}</td>

                        <td>{{ $employee->status }}</td>
                        <td>
                            <div class="td-actions">
                                <a href="{{ route('employees.show', $employee->id) }}"
                                    class="btn-action btn-detail">Detail</a>
                                <a href="{{ route('employees.edit', $employee->id) }}" class="btn-action btn-edit">Edit</a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete"
                                        onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                                </form>
                            </div>
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
