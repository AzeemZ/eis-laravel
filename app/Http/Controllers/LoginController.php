<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:employee')->except('employeeLogout');
        $this->middleware('guest:admin')->except('adminLogout');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $this->redirectIfEmployee($credentials);

        $this->redirectIfAdmin($credentials);

        return redirect('/')->with('message', 'Username or password is not correct');
    }

    public function redirectIfEmployee($credentials)
    {
        if ($this->employeeGuard()->attempt($credentials))
        {
            return redirect()->intended('employee.home');
        }
    }

    public function redirectIfAdmin($credentials)
    {
        if ($this->adminGuard()->attempt($credentials))
        {
            return redirect()->intended('admin.dashboard');
        }
    }

    public function employeeLogout()
    {
        $this->employeeGuard()->logout();

        return redirect('/');
    }

    public function adminLogout()
    {
        $this->adminGuard()->logout();

        return redirect('/');
    }

    protected function employeeGuard()
    {
        return Auth::guard('employee');
    }

    protected function adminGuard()
    {
        return Auth::guard('admin');
    }
}
