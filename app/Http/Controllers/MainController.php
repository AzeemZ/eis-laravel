<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:employee')->except('doLogout');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $this->redirectIfEmployee($credentials);

        return redirect('/')->with('message', 'Username or password is not correct');
    }

    public function redirectIfEmployee($credentials)
    {
        if ($this->employeeGuard()->attempt($credentials))
        {
            return redirect()->intended('employee');
        }
    }

    public function doLogout()
    {
        Auth::guard('employee')->logout();

        return redirect('/');
    }

    protected function employeeGuard()
    {
        return Auth::guard('employee');
    }
}
