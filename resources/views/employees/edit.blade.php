<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pegawai</title>
    @vite('resources/css/employee-edit.css')
</head>

<body>
    <div class="form-container">
        <h2>Edit Data Pegawai</h2>

        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $employee->nama_lengkap) }}">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $employee->email) }}">
            </div>

            <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="text" name="nomor_telepon" value="{{ old('nomor_telepon', $employee->nomor_telepon) }}">
            </div>

            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}">
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat">{{ old('alamat', $employee->alamat) }}</textarea>
            </div>

            <div class="form-group">
                <label>Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}">
            </div>

            <div class="form-group">
                <label>Departemen</label>
                <select name="departemen_id">
                    @foreach ($departments as $dept)
                        <option value="{{ $dept->id }}"
                            {{ $employee->departemen_id == $dept->id ? 'selected' : '' }}>
                            {{ $dept->nama_departemen }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Posisi</label>
                <select name="jabatan_id">
                    @foreach ($positions as $pos)
                        <option value="{{ $pos->id }}" {{ $employee->jabatan_id == $pos->id ? 'selected' : '' }}>
                            {{ $pos->nama_jabatan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status">
                    <option value="aktif" {{ old('status', $employee->status) == 'aktif' ? 'selected' : '' }}>Aktif
                    </option>
                    <option value="nonaktif" {{ old('status', $employee->status) == 'nonaktif' ? 'selected' : '' }}>
                        Nonaktif</option>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit">Update</button>
                <button type="button" onclick="window.location='{{ route('employees.index') }}'">Kembali</button>
            </div>

        </form>
    </div>
</body>

</html>
