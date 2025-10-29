@extends('master')
@section('title', 'Daftar Jabatan')
@section('content')
@vite('resources/css/positions-index.css')

<div class="table-container">
    <h1>Daftar Jabatan</h1>
    <a href="{{ route('positions.create') }}" class="btn-add">+ Tambah Jabatan</a>

    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Jabatan</th>
                <th>Gaji Pokok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($positions as $pos)
                <tr>
                    <td style="text-align: center;">{{ $pos->id }}</td>
                    <td>{{ $pos->nama_jabatan }}</td>
                    <td>Rp {{ number_format($pos->gaji_pokok, 2, ',', '.') }}</td>
                    <td class="actions">
                        <a href="{{ route('positions.edit', $pos->id) }}" class="btn-edit">Edit</a>
                        <form action="{{ route('positions.destroy', $pos->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Hapus jabatan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
