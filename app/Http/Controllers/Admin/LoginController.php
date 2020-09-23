<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Session;

class LoginController extends Controller
{
    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = '/backend/bill';
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }

    public function guard()
    {
        return Auth::guard('admin');
    }

    public function showLoginForm()
    {
        return view('backend.login');
    }

    public function login(Request $request)
    {
    	$username = $request->username;
    	$password = $request->password;

        if (Auth::guard('admin')->attempt(['username' => $username, 'password' => $password])){
            return redirect()->intended('/backend/product');
        }
        Session::flash('error', 'Email hoặc mật khẩu không đúng!');
        return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không đúng!');
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect()->intended('backend/login');
    }
}