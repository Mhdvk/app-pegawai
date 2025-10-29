<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\Position;
use App\Models\Salary;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'email',
        'nomor_telepon',
        'tanggal_lahir',
        'alamat',
        'tanggal_masuk',
        'status',
        'departemen_id',
        'jabatan_id',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'departemen_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'jabatan_id')
            ->withDefault([
                'nama_jabatan' => '-',
                'gaji_pokok' => 0,
            ]);
    }



    public function salaries()
    {
        return $this->hasMany(Salary::class, 'karyawan_id');
    }

    public function latestSalary()
    {
        return $this->hasOne(Salary::class, 'karyawan_id')
            ->orderByDesc('created_at')
            ->withDefault([
                'bulan' => '-',
                'tunjangan' => 0,
                'potongan' => 0,
            ]);
    }


    public function getTotalGajiAttribute()
    {
        $gajiPokok = $this->position ? $this->position->gaji_pokok : 0;
        $latestSalary = $this->latestSalary ?? null;
        $tunjangan = $latestSalary ? $latestSalary->tunjangan : 0;
        $potongan = $latestSalary ? $latestSalary->potongan : 0;

        return $gajiPokok + $tunjangan - $potongan;
    }
}
