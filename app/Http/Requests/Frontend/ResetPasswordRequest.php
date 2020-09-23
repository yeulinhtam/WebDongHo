<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'userEmail' => 'required|email|exists:user,email'
        ];
    }

    public function messages(){

        return [
            'userEmail.required' => 'Vui lòng nhập địa chỉ email!',
            'userEmail.email' => 'Địa chỉ email không hợp lệ!',
            'userEmail.exists' => 'Địa chỉ email không tồn tại'
        ];
    }
}
