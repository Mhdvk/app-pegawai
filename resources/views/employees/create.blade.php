<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Form Input Pegawai</title>
    @vite(['resources/css/employee-create.css'])
</head>

<body>
    <div class="container">
        <h1>Form Pegawai</h1>

        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <table>
                <tr>
                    <td><label for="nama_lengkap">Nama Lengkap:</label></td>
                    <td><input type="text" id="nama_lengkap" name="nama_lengkap"></td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="email" id="email" name="email"></td>
                </tr>
                <tr>
                    <td><label for="nomor_telepon">Nomor Telepon:</label></td>
                    <td><input type="text" id="nomor_telepon" name="nomor_telepon"></td>
                </tr>
                <tr>
                    <td><label for="tanggal_lahir">Tanggal Lahir:</label></td>
                    <td><input type="date" id="tanggal_lahir" name="tanggal_lahir"></td>
                </tr>
                <tr>
                    <td><label for="alamat">Alamat:</label></td>
                    <td>
                        <textarea id="alamat" name="alamat"></textarea>
                    </td>
                </tr>
                <tr>
                    <td><label for="tanggal_masuk">Tanggal Masuk:</label></td>
                    <td><input type="date" id="tanggal_masuk" name="tanggal_masuk"></td>
                </tr>
                <tr>
                    <td><label for="status">Status:</label></td>
                    <td>
                        <select id="status" name="status">
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="departemen_id">Departemen:</label></td>
                    <td>
                        <select id="departemen_id" name="departemen_id">
                            @foreach ($departments as $dept)
                                <option value="{{ $dept->id }}">{{ $dept->nama_departemen }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="jabatan_id">Posisi:</label></td>
                    <td>
                        <select id="jabatan_id" name="jabatan_id">
                            @foreach ($positions as $pos)
                                <option value="{{ $pos->id }}">{{ $pos->nama_jabatan }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="form-actions">
                        <button type="submit">Simpan</button>
                        <button type="button" class="back-btn"
                            onclick="window.location='{{ route('employees.index') }}'">
                            Batal
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
