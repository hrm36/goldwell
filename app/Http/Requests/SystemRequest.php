<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SystemRequest extends FormRequest
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
            'logo' => 'required',
            'facebook' => 'required',
            'phone' => 'required',
            'open_time' => 'required',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'logo.required' => 'Logo không được để trống',
            'facebook.required' => 'Facebook không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'open_time.required' => 'Thời gian mở cửa không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
        ];
    }
}
