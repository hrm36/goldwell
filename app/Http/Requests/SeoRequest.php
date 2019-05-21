<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeoRequest extends FormRequest
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
            'meta' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'meta.required' => 'Thẻ meta không được để trống',
        ];
    }
}
