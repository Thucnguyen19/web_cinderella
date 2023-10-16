<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderAddRequest extends FormRequest
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

            'name' => 'required:sliders|max:255|min:2',
            'description' => 'required',
            'image_path' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên slider không được bỏ trống!',
            'name.max' => 'Giới hạn ký tự 255.',
            'name.min' => 'Tối thiểu 2 ký tự.',
            'description.required' => 'Nội dung không được bỏ trống.',
            'image_path.required' => 'Bạn chưa chọn ảnh.',
        ];
    }
}
