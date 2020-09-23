<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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

        ];
    }

    public function messages()
    {
          return [
            'name.required' => 'Vui lòng nhập tên banner!',
            'name.unique' => 'Banner này đã tồn tại!',
            'image.required' => 'Vui lòng chọn  hình ảnh banner!',
            'status.required' => 'Vui lòng chọn trạng thái banner!',
            'status.integer' => 'Vui lòng chọn trạng thái banner!',
          ];
 

    }
}
