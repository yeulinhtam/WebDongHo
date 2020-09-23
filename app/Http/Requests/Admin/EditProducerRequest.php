<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EditProducerRequest extends FormRequest
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
            'name'=>'required|unique:producer,name,'.$this->segment(3),
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Vui lòng nhập tên thương hiệu!',
            'name.unique'=>'Tên thương hiệu này đã tồn tại!',
        ];
    }
}
