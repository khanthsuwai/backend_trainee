<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('admin.employees.index',compact('employees'));
    }

    public function create()
    {
        return view('admin.employees.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $employees = Employee::create($request->all());
        $employees->save();

        return redirect()->route('backend.employees.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        // echo $id;
        $employee = Employee::find($id);
        return view('admin.employees.edit',compact('employee'));
    }

    public function update(Request $request, string $id)
    {
        // dd($request);
        // echo ($id);

        $employee = Employee::find($id);
        $employee->update($request->all());

        return redirect()->route('backend.employees.index');
    }

    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('backend.employees.index');
    }
}
