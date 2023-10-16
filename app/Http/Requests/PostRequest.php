<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'post_title' => 'required|unique:post|max:255|min:2', //điều kiện: bắt buộc phải nhập, không trùng:tên bảng, tối đa 255 ký tự 
            'post_des' => 'required',
            'post_content' => 'required',
            'post_meta_des' => 'required',
            'post_meta_keywords' => 'required',
            'post_image_path' => 'required',
            'category_post_id' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'post_title.required' => 'Tiêu đề không được bỏ trống!',
            'post_title.unique' => 'Tiêu đề đã được đặt!',
            'post_title.max' => 'Giới hạn 255 ký tự!',
            'post_title.min' => 'Tiêu đề phải từ 2 ký tự trở lên!',
            'post_content.required' => 'Phần nội dung không được bỏ trống!',
            'post_des.required' => 'Phần mô tả không được bỏ trống!',
            'post_meta_des.required' => 'Phần mô tả meta không được bỏ trống!',
            'post_meta_keywords.required' => 'Phần keywords không được bỏ trống!',
            'post_image_path.required' => 'Chưa chọn ảnh',
            'category_post_id.required' => 'Chưa chọn danh mục!',
        ];
    }
}
