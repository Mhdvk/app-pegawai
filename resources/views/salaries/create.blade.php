@extends('master')

@section('title', 'Tambah Data Gaji')

@section('content')
    @vite('resources/css/salaries-create.css')

    <div class="form-container">
        <h2>Tambah Data Gaji</h2>
        <form action="{{ route('salaries.store') }}" method="POST">
            @csrf

            <div class="form-row">
                <div class="form-group">
                    <label>Karyawan</label>
                    <select name="karyawan_id" required>
                        <option value="">-- Pilih Karyawan --</option>
                        @foreach($employees as $emp)
                            <option value="{{ $emp->id }}">{{ $emp->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Bulan</label>
                    <input type="text" name="bulan" placeholder="Contoh: Oktober 2025" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Gaji Pokok</label>
                    <input type="text" name="gaji_pokok" id="gaji_pokok" placeholder="Gaji pokok otomatis" readonly>
                </div>

                <div class="form-group">
                    <label>Tunjangan</label>
                    <input type="text" name="tunjangan" placeholder="Masukkan total tunjangan" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group full">
                    <label>Potongan</label>
                    <input type="text" name="potongan" placeholder="Masukkan potongan (jika ada)" value="0">
                </div>
            </div>

            <div class="form-actions">
                <button type="submit">Simpan</button>
                <button type="button" class="cancel-btn" onclick="window.location='{{ route('salaries.index') }}'">Kembali</button>
            </div>
        </form>
    </div>

    <script>
        const employees = @json($employees);
        const gajiInput = document.getElementById('gaji_pokok');
        const selectKaryawan = document.querySelector('select[name="karyawan_id"]');

        selectKaryawan.addEventListener('change', function() {
            const empId = parseInt(this.value);
            const emp = employees.find(e => e.id === empId);
            if (emp && emp.position) {
                gajiInput.value = emp.position.gaji_pokok;
            } else {
                gajiInput.value = '';
            }
        });
    </script>
@endsection
