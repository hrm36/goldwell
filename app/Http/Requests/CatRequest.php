<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
  /*  public function authorize()
    {
        return false;
    }*/

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'image' => 'required',
            'des' => 'required',
            'slug' => 'required',
            'status'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'slug.required' => 'Đường dẫn không được để trống',
            'des.required' => 'Miêu tả không được để trống',
            'image.required' => 'Ảnh  không được để trống',
            'type.required' => 'Không được để trống',
            'status.required' => 'Không được để trống',
        ];
    }
}
