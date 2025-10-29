<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with(['department', 'position'])->latest()->paginate(5);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();
        $positions = Position::all();

        return view('employees.create', compact('departments', 'positions'));
    }

    public function store(Request $request)
    {
        Employee::create([
            'nama_lengkap'   => $request->nama_lengkap,
            'email'          => $request->email,
            'nomor_telepon'  => $request->nomor_telepon,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'alamat'         => $request->alamat,
            'tanggal_masuk'  => $request->tanggal_masuk,
            'status'         => $request->status,
            'departemen_id'  => $request->departemen_id,
            'jabatan_id'     => $request->jabatan_id,
        ]);

        return redirect()->route('employees.index')->with('success', 'Data karyawan berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $employee = Employee::with(['department', 'position', 'latestSalary'])
            ->findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();
        $positions = Position::all();

        return view('employees.edit', compact('employee', 'departments', 'positions'));
    }

    public function update(Request $request, string $id)
    {
        $employee = Employee::findOrFail($id);

        $employee->update([
            'nama_lengkap'   => $request->nama_lengkap,
            'email'          => $request->email,
            'nomor_telepon'  => $request->nomor_telepon,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'alamat'         => $request->alamat,
            'tanggal_masuk'  => $request->tanggal_masuk,
            'status'         => $request->status,
            'departemen_id'  => $request->departemen_id,
            'jabatan_id'     => $request->jabatan_id,
        ]);

        return redirect()->route('employees.index')->with('success', 'Data karyawan berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil dihapus!');
    }
}
