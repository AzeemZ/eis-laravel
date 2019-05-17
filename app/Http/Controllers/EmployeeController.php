<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:employee');
    }

    public function home()
    {
        $employee = Auth::user();

        return view('employee.home', compact('employee'));
    }
}
