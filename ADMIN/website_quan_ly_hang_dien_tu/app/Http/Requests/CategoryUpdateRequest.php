<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
        $id = $this->all()['id'];
        return [
            'name' => ['required', 'min:5', 'unique:categories,name,' . $id],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên chuyên mục không được để trống',
            'name.min' => 'Tên chuyên mục phải chứa ít nhất 5 kí tự',
            'name.unique' => 'Tên chuyên mục đã tồn tại'
        ];
    }
}