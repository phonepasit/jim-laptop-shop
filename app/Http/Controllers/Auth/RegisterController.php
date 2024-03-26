<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('layouts.web');
    }

    protected function store(Request $request)
    {
        $userController = new UserController();

        $userController->store($request);

        // Redirect back with success message
        return redirect()->route('login')->with('success', 'Register successfully!');
    }

    public function edit()
    {
        return view('layouts.web')->with('user', auth()->user());
    }

    public function update(Request $request, int $id)
    {
        $userController = new UserController();

        $userController->update($request, $id);

        return redirect('/')->with('success', 'Update successfully!');
    }
}
