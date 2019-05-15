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
            'slug' => 'required',
            'des_s' => 'required',
            'des_f' => 'required',
            'cat_id' =>'required',
            'dis_type'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống',
            'image.required' => 'Ảnh không được để trống',
            'slug.required' => 'Đường dẫn không được để trống',
            'des_s.required' => 'Nội dung miêu tả ngắn không được để trống',
            'des_f.required' => 'Nội dung miêu tả chi tiết không được để trống',
            'cat_id.required' => 'Danh mục sản phẩm không được để trống',
            'dis_type.required' => 'Giao diện sản phẩm không được để trống',
        ];
    }
}
