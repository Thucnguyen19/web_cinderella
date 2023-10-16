<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleAddRequest extends FormRequest
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
            'name' => 'required:roles|max:255|min:2',
            'display_name' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Không được bỏ trống',
            'name.max' => 'Tối đa 255 ký tự',
            'name.min' => 'Tối thiểu 2 ký tự.',
            'display_name.required' => 'Không được bỏ trống.'
        ];
    }
}
