<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Session;




class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = User::paginate(10);
      return view('backend.user_list',compact('data')); 
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User();
        $user->username = $request->userName;
        $user->email = $request->userEmail;
        $user->password = Hash::make($request->userPassword);
        $user->fullname = $request->userFullName;
        $user->address = $request->userAddress;
        $user->phone = $request->userPhone;
        $user->blocked = 0;
        $user->save();

        return redirect()->route('user.index')->with('success','Thêm mới tài khoản thành công'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $user = User::findOrFail($id);
       return view('backend.user_edit',compact('user'));
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->fullname = $request->userFullName;
        $user->phone = $request->userPhone;
        $user->address = $request->userAddress;
        $user->save();

        return redirect()->route('user.index')->with('success','Chỉnh sửa tài khoản thành công'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success','Xóa tài khoản người dùng thành công!');      
    }

    public function active($id){

        $user = User::findOrFail($id);
        $user->blocked = ! $user->blocked;
        $user->save();
        return redirect()->back();
    }


    

}
