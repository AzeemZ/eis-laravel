<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function dashboard()
    {
        return view('admin.home');
    }

    public function create()
    {
        return view('admin.add-employee');
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateEmployee($request);

        extract(
            $request->validate(['password' => 'required'])
        );

        $validatedData['password'] = bcrypt($password);

        Employee::create($validatedData);

        return redirect('/admin/create-employee')->with('success', 'Employee record added successfully');
    }

    public function validateEmployee($request, $employee = null)
    {
        return $request->validate([
            'name' => ['required'],
            'email' => ['required', Rule::unique('employees')->ignore($employee)],
            'designation' => ['required'],
            'contact' => ['required'],
        ]);
    }

    public function edit()
    {
        $employees = Employee::all();

        return view('admin.update-employee', compact('employees'));
    }

    public function update(Request $request)
    {
        $id = $request->input('id');

        DB::table('employees')
            ->where('id', $id)
            ->update($this->validateEmployee($request, $id));

        return redirect('/admin/update-employee')->with('message', 'Employee record has been updated');
    }

    public function fetchEmployee($id)
    {
        $employee = Employee::find($id);

        return response()->json(['success' => true, 'employee' => $employee]);
    }

    public function delete()
    {
        $employees = Employee::all();

        return view('admin.delete-employee', compact('employees'));
    }

    public function destroyEmployee(Request $request)
    {
        $id = $request->input('id');

        Employee::destroy($id);

        return redirect('/admin/delete-employee')->with('message', 'Employee profile has been deleted');
    }
}
