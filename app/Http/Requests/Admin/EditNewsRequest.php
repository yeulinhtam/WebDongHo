<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EditNewsRequest extends FormRequest
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
            'name'=>'required|unique:news,name,'.$this->segment(3),
            'status' => 'required|integer',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Vui lòng nhập tên danh mục!',
            'name.unique'=>'Tên danh mục này đã tồn tại!',
            'status.required' => 'Vui lòng chọn trạng thái!',
            'status.integer' => 'Vui lòng chọn trạng thái!',
            'description.required' => 'Vui lòng nhập mô tả!'
        ];
    }
}
