<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name'=>'required|unique:category,categoryName',
            'logo'=>'required',
            'status' => 'required|integer',

        ];
    }

    public function messages()
    {
          return [
            'name.required' => 'Vui lòng nhập tên danh mục!',
            'name.unique' => 'Danh mục này đã tồn tại!',
            'logo.required' => 'Vui lòng chọn logo danh mục!',
            'status.required' => 'Vui lòng chọn trạng thái danh mục!',
            'status.integer' => 'Vui lòng chọn trạng thái danh mục!',
          ];
    }
}
