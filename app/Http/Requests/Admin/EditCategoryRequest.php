<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EditCategoryRequest extends FormRequest
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
            'name'=>'required|unique:category,categoryName,'.$this->segment(3),
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Vui lòng nhập tên danh mục!',
            'name.unique'=>'Tên danh mục này đã tồn tại!',
        ];
    }
}
