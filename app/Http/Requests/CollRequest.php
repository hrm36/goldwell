<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollRequest extends FormRequest
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
            'image' => 'required',
            'name' => 'required',
            'slug' => 'required',
            'status'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Ảnh không được để trống',
            'name.required' => 'Tên không được để trống',
            'slug.required' => 'Đường dẫn không được để trống',
            'status.required' => 'Không được để trống',
        ];
    }
}
