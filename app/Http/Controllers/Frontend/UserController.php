<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Frontend\SignUpRequest;
use App\Http\Requests\Frontend\ResetPasswordRequest;
use App\Http\Requests\Frontend\UserChangePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\Bill;
use Mail;
use Carbon\Carbon;

class UserController extends Controller{


  public function logIn(){
    return view('frontend.login');
  }


  public function postLogIn(Request $request){
    $credentials = ['username'=>$request->userName,'password'=>$request->userPassword];
    if (Auth::attempt($credentials)){  
          $user = Auth::user();
          if($user->blocked == 1){
              Auth::logout();
              return redirect()->back()->with('error',"Tài khoản của bạn đã bị khóa!");
          }
          return redirect()->intended('trang-chu');
    }else{
        return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không đúng!');
    }
  }

  public function logOut(){
    if(Auth::check()){
      Auth::logout();
    }else{
      return redirect()->intended('dang-nhap');
    }
    return redirect()->back();
  }

  public function signUp(){
    return view('frontend.signup');
  }

  public function postSignUp(SignUpRequest $request){
    $user = new User();
    $user->username = $request->userName;
    $user->email = $request->userEmail;
    $user->password = Hash::make($request->userPassword);
    $user->fullname = $request->userFullName;
    $user->address = $request->userAddress;
    $user->blocked = 0;
    $user->phone = $request->userPhone;
    $user->save();
    Auth::login($user);
    return redirect()->to("thong-bao")->with("success","Đăng ký tài khoản thành công!");
    
  }

  public function resetPassword(){
    return view('frontend.reset-password');
  }

  public function postResetPassword(ResetPasswordRequest $request){

    $email = $request->userEmail;
    $user = User::where('email',$email)->get()->first();
    $token = Str::random(50);


    if(!$user){
      return redirect()->back()->with('error','Địa chỉ email không hợp lệ!');
    }else{
      $user->reset_token = $token;
      $user->save();
      $this->sendRestToken($user->fullname,$email,$token);
    }

    return redirect()->back()->with('success','Kiểm tra email để thay đổi mật khẩu của bạn!');
  }

  public function updatePassword(Request $request){
    $token = $request->token;
    $user = User::where('reset_token',$token)->get()->first();
    $error = "";

    if(!$user){
      $error = "Token không hợp lệ!";
      return view("frontend.update-password",compact('error'));
    }

    $time = Carbon::now();
    $dt = Carbon::create($user->reset_token_date);

    if($time->diffInSeconds($dt) < 600){
      return view('frontend.update-password',compact('token'));
    }else{
      $error = "Token đã hết hạn sử dụng!";
      return view("frontend.update-password",compact('error'));
    }
    
  }

  public function postUpdatePassword(Request $request){
    $password = $request->password;
    $token = $request->token;
    $user = User::where('reset_token',$token)->get()->first();
    if($user){
      $user->password = Hash::make($password);
      $user->reset_token = null;
      $user->save();
      return redirect()->to('thong-bao')->with("success","Thay đổi mật khẩu thành công!");
    }
    return redirect()->to('thong-bao')->with("error","Đã có lỗi xảy ra!");
  }

  public function sendRestToken($name,$email,$token){

    $data = array('name'=>$name,'email'=>$email,'token'=>$token);
    
    Mail::send('mail-password',$data, function($m) use ($data){
      $m->to($data['email'],$data['name'])->subject('Đổi Mật Khẩu!');
      $m->from('yeulinhtam171@gmail.com','Vu Minh Watch');
    });

  }

  public function getUserProfile(){
    if(Auth::check()){
        $user = Auth::user();
    }else{
      return redirect("dang-nhap");
    }
    return view("frontend.user-profile",compact('user'));
  }

  public function postUserProfile(Request $request){
     if(Auth::check()){
        $user = Auth::user();
        $user->fullname = $request->fullname;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect()->back()->with("success","Cập nhập thông tin cá nhân thành công!");
     }else{
      return redirect('dang-nhap');
     }
  }


  public function postUserChangePassword(UserChangePasswordRequest $request){
    if(Auth::check()){
      $user = Auth::user();
      $user->password = Hash::make($request->newPassword);
      $user->save();
      return redirect()->back()->with("success","Cập nhập mật khẩu thành công!");
    }else{
      return redirect('dang-nhap');
    }
  }

  public function getUserBill(){
    if(Auth::check()){
      $user = Auth::user();
      $bill = Bill::where('id_customer',$user->id)->get();
      return view("frontend.user-bill",compact('bill'));
    }else{
      return redirect('dang-nhap');
    }
  }




   

}
