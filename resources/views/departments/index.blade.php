@extends('master')

@section('title', 'Daftar Departemen')

@section('content')
    @vite('resources/css/departments-index.css')

    <div class="table-container">
        <h1>Daftar Departemen</h1>
        <a href="{{ route('departments.create') }}" class="btn-add">+ Tambah Departemen</a>

        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Departemen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($departments as $dept)
                    <tr>
                        <td>{{ $dept->id }}</td>
                        <td>{{ $dept->nama_departemen }}</td>
                        <td class="actions">
                            <a href="{{ route('departments.edit', $dept->id) }}" class="btn-edit">Edit</a>
                            <form action="{{ route('departments.destroy', $dept->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Hapus departemen ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
