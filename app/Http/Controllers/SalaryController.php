<?php
namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
public function index() {
    $salaries = Salary::with(['employee.position'])->get();
    return view('salaries.index', compact('salaries'));
}


public function create() {
    $employees = Employee::with('position')->get(); 
    return view('salaries.create', compact('employees'));
}


   public function store(Request $request) {
    $request->validate([
        'karyawan_id' => 'required|exists:employees,id',
        'bulan' => 'required|max:10',
        'tunjangan' => 'required|numeric',
        'potongan' => 'required|numeric',
    ]);

    $employee = Employee::with('position')->findOrFail($request->karyawan_id);
    $gaji_pokok = $employee->position->gaji_pokok ?? 0;

    $data = $request->all();
    $data['gaji_pokok'] = $gaji_pokok;
    $data['total_gaji'] = $gaji_pokok + $data['tunjangan'] - $data['potongan'];

    Salary::create($data);
    return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil ditambahkan!');
}

    public function edit(Salary $salary) {
        $employees = Employee::all();
        return view('salaries.edit', compact('salary', 'employees'));
    }

   public function update(Request $request, Salary $salary) {
    $request->validate([
        'karyawan_id' => 'required|exists:employees,id',
        'bulan' => 'required|max:10',
        'tunjangan' => 'required|numeric',
        'potongan' => 'required|numeric',
    ]);

    $employee = Employee::with('position')->findOrFail($request->karyawan_id);
    $gaji_pokok = $employee->position->gaji_pokok ?? 0;

    $data = $request->all();
    $data['gaji_pokok'] = $gaji_pokok;
    $data['total_gaji'] = $gaji_pokok + $data['tunjangan'] - $data['potongan'];

    $salary->update($data);
    return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil diperbarui!');
}

    public function destroy(Salary $salary) {
        $salary->delete();
        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil dihapus!');
    }
}
