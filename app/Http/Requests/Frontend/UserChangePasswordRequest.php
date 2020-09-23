<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\MatchOldPassword;

class UserChangePasswordRequest extends FormRequest{
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
            'password' => ['required', new MatchOldPassword],
            'newPassword' => 'required|min:6',
            'confirmNewPassword' => 'required|same:newPassword',
        ];
    }

    public function messages()
    {
      return [
          'password.required' => 'Vui lòng nhập mật khẩu hiện tại!',
          'newPassword.required' => 'Vui lòng nhập mật khẩu mới!',
          'newPassword.min' => 'Mật khẩu phải có ít nhất 6 ký tự!',
          'confirmNewPassword.required' => 'Vui lòng xác nhận mật khẩu mới!',
          'confirmNewPassword.same' => 'Xác nhận mật khẩu không đúng!'
    ];


}
}
