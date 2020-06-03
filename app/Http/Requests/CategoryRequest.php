<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_name' => 'required|max:255|unique:categories,category_name,'. $this->id,
            'ordering' => 'required',
            'description' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'category_name.required' => 'Vui lòng nhập tên danh mục',
            'ordering.required' => 'Vui lòng nhập thứ tự',
            'description.required' => 'Vui lòng nhập mô tả',

        ];
    }
}
