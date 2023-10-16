<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name' => 'required|unique:products|max:255|min:2', //điều kiện: bắt buộc phải nhập, không trùng:tên bảng, tối đa 255 ký tự 
            'price' => 'required',
            'category_id' => 'required',
            'contents' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên không được bỏ trống!',
            'name.unique' => 'Tên sản phẩm đã được đặt!',
            'name.max' => 'Giới hạn 255 ký tự!',
            'name.min' => 'Tên phải từ 2 ký tự trở lên!',
            'price.required' => 'Giá sản phẩm không được bỏ trống!',
            'category_id' => 'Chưa chọn danh mục!',
            'content' => 'Nội dung không được bỏ trống!'

        ];
    }
}
