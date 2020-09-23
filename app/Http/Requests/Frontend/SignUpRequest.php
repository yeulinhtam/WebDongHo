<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'userName' => 'required|unique:user,username',
            'userEmail' => 'required|unique:user,email',
            'userPassword' => 'required|min:6',
            'userRePassword' =>'required|same:userPassword',
            'userPhone' => 'required|regex:/(0)[0-9]{9}/|size:10',
            'userAddress' => 'required',
            'userFullName' => 'required'
        ];
    }

    public function messages()
    {
      return [
          'userName.required' => 'Vui lòng nhập tên sản phẩm!',
          'userName.unique' => 'Tài khoản này đã tồn tại!',
          'userEmail.required' => 'Vui lòng nhập email!',
          'userEmail.unique' => 'Địa chỉ email này đã được sử dụng!',
          'userPassword.required' => 'Vui lòng nhập mật khẩu',
          'userPassword.min' => 'Mật khẩu phải có ít nhất 6 ký tự!',
          'userRePassword.required' => 'Vui lòng xác nhận mật khẩu',
          'userRePassword.same' => 'Xác nhận mật khẩu không hợp lệ!',
          'userPhone.required' => "Vui lòng nhập số điện thoại",
          'userPhone.size' => "Số điện thoại không đúng định dạng",
          'userPhone.regex' => 'Số điện thoại không đúng định dạng',
          'userAddress.required' => 'Vui lòng nhập địa chỉ',
          'userFullName.required' => 'Vui lòng nhập họ tên',
    ];


}
}
