<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'id',
            'name' => 'required|max:100',
            'scale' => 'max:100',
            'founding',
            'summary',
            'avatar' => 'image',
            'meta_keyword',
            'meta_description',
            'method'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên công ty',
            'name.max' => 'Bạn chỉ nhập tối đa :max ký tự',

            'scale.max' => 'Bạn chỉ nhập tối đa :max ký tự',

            'avatar.image' => 'Bạn chỉ được upload hình ảnh'
        ];
    }
}
