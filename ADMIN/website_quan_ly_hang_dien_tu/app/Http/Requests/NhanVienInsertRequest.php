<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhanVienInsertRequest extends FormRequest
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
            'TENNV' => ['required', 'min:7'],
            'TAIKHOAN' => ['required', 'min:6', 'unique:TAIKHOAN'],
            'GIOITINH' => ['required', 'max:4',],
            'SDT' => ['required', 'numeric', 'digits:11'],
            'MATKHAU' => ['required', 'min:10'],
            'password_confirmation' => ['required', 'same:MATKHAU']
        ];
    }

    public function messages()
    {
        return [
            'TENNV.required' => 'Trường này không được để trống',
            'TENNV.min' => 'Trường này phải chứa ít nhất 7 kí tự',
            'TAIKHOAN.required' => 'Trường này không được để trống',
            'TAIKHOAN.min' => 'Trường này phải chứa ít nhất 6 kí tự',
            'TAIKHOAN.unique' => 'tài khoản đã tồn tại',
            'SDT.required' => 'Trường này không được để trống',
            'SDT.digits' => 'Số điện thoại không hợp lệ',
            'SDT.numeric' => 'Số điện thoại không hợp lệ',
            'GIOITINH.required' => 'Trường này không được để trống',
            'GIOITINH.max' => 'giới tính không hợp lệ',
            'MATKHAU.required' => 'Trường này không được để trống',
            'MATKHAU.min' => 'Trường này phải chứa ít nhất 10 kí tự',
            'password_confirmation.required' => 'Trường này không được để trống',
            'password_confirmation.same' => 'Mật khẩu không trùng khớp'
        ];
    }
}