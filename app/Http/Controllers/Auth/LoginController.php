<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
     protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('guest')->except('logout');
    }


    public function getLogin() {
        //return view('backend/login');
    }

    public function postLogin(Request $request)
    {
      //  $username = $request->username;
     //   $password = $request->password;
 //
    //    if( Auth::attempt(['username' => $username, 'password' =>$password])) {
              
       //      return redirect()->intended('backend/banner');      
      //  } else {
     //        Session::flash('error', 'Email hoặc mật khẩu không đúng!');
      //       return redirect()->back()->with('error', 'Sai tài khoản hoặc mật khẩu!');
     //   }
    }

    public function logout()
    {
        dd("aasd");
     //   Auth::logout();
     //   return redirect()->intended('login');
    }

    public function username()
    {
        return 'username';
    }
}
