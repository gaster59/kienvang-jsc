<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'name' => 'required|max:50',
            'description' => 'max:255',
            'summary',
            'avatar' => 'image',
            'type',
            'meta_keyword',
            'meta_description'
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
            'name.required' => 'Bạn chưa nhập tên tin tức',
            'name.max' => 'Bạn chỉ nhập tối đa :max ký tự',

            'description.max' => 'Bạn chỉ nhập tối đa :max ký tự',

            'avatar.image' => 'Bạn chỉ được upload hình ảnh',
        ];
    }
}
