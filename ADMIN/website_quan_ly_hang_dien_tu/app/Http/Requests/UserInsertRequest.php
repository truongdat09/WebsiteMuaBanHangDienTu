<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInsertRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => ['required', 'min:6'],
            'phone' => ['required', 'numeric', 'digits:10'],
            'email' => ['required', 'email:rfc,dns', 'unique:users,email'],
            'password' => ['required', 'min:3'],
            'password_confirmation' => ['required', 'same:password']
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Trường này không được để trống',
            'username.min' => 'Trường này phải chứa ít nhất 6 kí tự',
            'phone.required' => 'Trường này không được để trống',
            'phone.digits' => 'Số điện thoại không hợp lệ',
            'phone.numeric' => 'Số điện thoại không hợp lệ',
            'email.required' => 'Trường này không được để trống',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Trường này không được để trống',
            'password.min' => 'Trường này phải chứa ít nhất 3 kí tự',
            'password_confirmation.required' => 'Trường này không được để trống',
            'password_confirmation.same' => 'Mật khẩu không trùng khớp'
        ];
    }
}