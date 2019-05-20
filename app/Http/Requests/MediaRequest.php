<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaRequest extends FormRequest
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
            'collection_id' => 'required',
            'image' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'Loại media không được để trống',
            'collection_id.required' => 'Bộ sưu tập không được để trống',
            'image.required' => 'Ảnh không được để trống',
            'status.required' => 'Trạng thái không được để trống',
        ];
    }
}
