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
            'name'         => 'bail|required|max:100',
            'email'        => 'bail|required|email|unique:users,email',
            'phone'        => 'bail|required|numeric|phone',
            'address'      => 'bail|required',
            'password'     => 'bail|required|min:8|confirmed',
            'password_confirmation'=> 'bail|required|min:8',
            'school'        => 'bail|required',
            'major'         => 'bail|required',
            'cv'            => 'bail|required|max:10240|mimes:pdf,doc,docx,txt'
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
            'phone.required'    => 'Nhập số điện thoại của bạn',
            'phone.numeric'     => 'Số điện thoại không đúng',
            'address.required'  => 'Nhập địa chỉ của bạn',
            'password.required'  => 'Nhập mật khẩu của bạn',
            'password.min'       => 'Mật khẩu không được nhỏ hơn :min ký tự',
            'password_confirmation.required'  => 'Chưa xác nhận mật khẩu',
            'password_confirmation.same'  => 'Mật khẩu xác nhận không chính xác',
            'school.required'   => 'Nhập trường học của bạn',
            'major.required'    => 'Nhập ngành học của bạn',
            'cv.required'       => 'Vui lòng CV của bạn',
            //'cv.mimes'          => 'Định dạng CV không chính xác(.doc, docx)',
            'cv.mimetypes'      => 'Định dạng CV không chính xác(.doc, docx)',
            'cv.max'           => 'CV của bạn vượt quá dung lượng cho phép'
        ];
    }
}
