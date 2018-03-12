<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'description' => 'max:100',
            'avatar' => 'required|image',
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

            'description.max' => 'Bạn chỉ nhập tối đa :max ký tự',

            'avatar.image' => 'Bạn chỉ được upload hình ảnh',
            'avatar.required' => 'Bạn chưa chọn file',
        ];
    }
}
