<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExtraRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
     public function rules()
    {
        return [
            'type' => 'required',
            'product_id' => 'required',
            'image' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'Loại tin không được để trống',
            'product_id.required' => 'Sản phẩm không được để trống',
            'content.required' => 'Nội dung không được để trống',
            'image.required' => 'Ảnh không được để trống',
        ];
    }
}
