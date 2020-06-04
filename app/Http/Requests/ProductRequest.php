<?php

namespace App\Http\Requests;

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
            'product_name' => 'required|max:255|unique:products,product_name,'. $this->id,
            'category_id' => 'required',
            'price' => 'required',
            'ordering' => 'required',
            'quantity' => 'required',
            //'product_image_intro' => 'required',
            'description' => 'required',
            'full_description' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'product_name.required' => 'Vui lòng nhập tên sản phẩm',
            'category_id.required' => 'Vui lòng chọn danh mục',
            'quantity.required' => 'Vui lòng nhập số lượng sản phẩm',
            'ordering.required' => 'Vui lòng nhập ưu tiên sản phẩm',
            'description.required' => 'Vui lòng nhập mô tả sản phẩm',
            'price.required' => 'Vui lòng nhập mô tả sản phẩm',
            'full_description.required' => 'Vui lòng nhập mô tả đầy đủ sản phẩm',

        ];
    }
}
