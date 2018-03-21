<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        /*if(!empty($this->post('method')) && $this->post('method') == "add"){
            return [
                'id',
                'title'         => 'max:100',
                'type',
                'description'   => 'max:100',
                'avatar'        => 'required|image',
                'method'
            ];
        }else{
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
            
        }*/
        return [
            'id',
            'name'         => 'required|max:100',
            'email'        => 'required|email|unique:users,email'
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
            'name.required'     => 'Vui lòng nhập họ và tên',
            'name.max'          => 'Bạn chỉ nhập tên tối đa :max ký tự',
            'email.required'    => 'Vui lòng nhập email',
            'email.email'       => 'Email không đúng định dạng',
            'email.unique'      => 'Email này đã tồn tại',
        ];
    }
}
