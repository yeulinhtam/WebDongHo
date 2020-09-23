<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'name'=>'required|unique:banner,name',
            'image'=>'required',
            'status' => 'required|integer',
            'description' => 'required'
        ];
    }


    public function messages(){
        return [
            'name.required' => 'Vui lòng nhập tên title tin tức!',
            'name.unique' => 'Title này đã tồn tại!',
            'image.required' => 'Vui lòng chọn hình ảnh!',
            'status.required' => 'Vui lòng chọn trạng thái!',
            'status.integer' => 'Vui lòng chọn trạng thái!',
            'description.required' => 'Vui lòng nhập mô tả!'
        ];
    }
}
