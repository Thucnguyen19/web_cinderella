<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingAddRequest extends FormRequest
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
            'config_key' => 'required|unique:settings|max:255',
            'config_value' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'config_key.required' => 'Config_key không được bỏ trống',
            'config_key.unique' => 'Config_key đã tồn tại',
            'config_key.max' => 'Giới hạn ký tự 255',
            'config_value.required' => 'A message is required',
        ];
    }
}
