<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' =>'required|min:6',
            'description'=>'required',
            'content'=>'required|min:10',
            'thumbnail'=>'required',
        ];
    }
    public function messages(){
        return[
            'title.required'=>'Nhập tiêu đề',
            'title.min'=>'Nhập tiêu đề quá ngắn',
            'description.required'=>'Nhập miêu tả',
            'content.required'=>'Nhập nội dung bài viết',
            'content.min'=>'Nhập nội dung quá ngắn',
            'thumbnail.required'=>'Thêm ảnh',
        ];
    }
}
