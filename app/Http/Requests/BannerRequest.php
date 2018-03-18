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
        if(!empty($this->post('method')) && $this->post('method') == "add"){
            return [
                'id',
                'title'         => 'max:100',
                'type',
                'description'   => 'max:100',
                'avatar'        => 'required|image',
                'method'
            ];
        }else
        {
            if(!empty($this->file('avatar'))){
                return [
                    'id',
                    'title'         => 'max:100',
                    'type',
                    'description'   => 'max:100',
                    'avatar'        => 'required|image',
                    'method'
                ];
            }else{
                return [
                    'id',
                    'title'         => 'max:100',
                    'type',
                    'description'   => 'max:100',
                    //'avatar' => 'required|image',
                    'method'
                ];
            }
            
        }
        
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.max'         => 'Bạn chỉ nhập tối đa :max ký tự',
            'description.max'   => 'Bạn chỉ nhập tối đa :max ký tự',
            'avatar.image'      => 'Bạn chỉ được upload hình ảnh',
            'avatar.required'   => 'Bạn chưa chọn file',
        ];
    }
}
