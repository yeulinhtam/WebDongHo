<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=>'required|unique:product,name',
            'image'=>'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'promotion' => 'required|numeric|min:0|max:100',
            'quantity' => 'required|numeric|min:0',
        ];
    }

    public function messages()
    {
          return [
            'name.required'=>'Vui lòng nhập tên sản phẩm!',
            'name.unique'=>'Sản phẩm này đã tồn tại!',
            'image.required'=>'Vui lòng chọn hình ảnh sản phẩm!',
            'description.required' => 'Vui lòng nhập mô tả sản phẩm',
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'price.numeric' => 'Giá sản phẩm không đúng định dạng',
            'price.min' => 'Giá sản phẩm phải lớn hơn hoặc bằng 0',
            'promotion.required' => 'Vui lòng nhập % giảm giá',
            'promotion.numeric' => '% giảm giá không đúng định dạng',
            'promotion.min' => '% giảm giá phải lớn hơn hoặc bằng 0',
            'promotion.max' => '% giảm giá phải nhỏ hơn hoặc bằng 100',
            'quantity.min' => 'Số lượng sản phẩm phải lớn hơn 0',
            'quantity.numeric' => 'Số lượng sản phẩm không đúng định dạng',
            'quantity.required' => 'Vui lòng nhập số lượng sản phẩm',
          ];
 

    }
}
