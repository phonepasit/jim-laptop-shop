<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }

    public function showLoginForm()
    {
        return view('layouts.web');
    }

    protected function guard()
    {
        return Auth::guard('web');
    }

    protected function attemptLogin(Request $request)
    {
        try {
            return $this->guard()->attempt(
                $this->credentials($request), $request->filled('remember')
            );
        } catch (\Exception $e) {
            $error = $e->getMessage();
            return redirect('/login')->with('error', $error);
        }
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}
