<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required:users|max:255|min:5',
            'email' => 'required',
            'password' => 'required:users|min:8',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên không được bỏ trống.',

            'name.max' => 'Tên tối đa 255 ký tự.',
            'name.min' => 'Tối thiểu 5 ký tự.',
            'email.required' => ' email không được bỏ trống.',
            'password.required' => 'Mật khẩu không được bỏ trống.',
            'password.confirmed' => 'Mật khẩu phải từ 8 ký tự trở lên'
        ];
    }
}
