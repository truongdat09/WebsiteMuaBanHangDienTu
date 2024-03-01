<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
            'title' => ['required', 'unique:posts,title,' . $id],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Trường này không được bỏ trống.',
            'title.unique' => 'Tiêu đề đã tồn tại'
        ];
    }
}