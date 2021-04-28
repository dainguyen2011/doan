<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RatingRequest extends FormRequest
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
            'rating' => 'required',
            'content' => 'required',
            'contented' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'rating.required' => 'Vui lòng chọn sao',
            'content.required' => 'Vui lòng nhập nội dung đánh giá',
            'contented.required' => 'Cảm ơn bạn đã đánh giá sản phẩm !',

        ];
    }
}
