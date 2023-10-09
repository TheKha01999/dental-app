<?php

namespace App\Http\Requests\Admin\Blog;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'title' => 'required|min:5|max:1000|unique:blogs,title,' . $this->blog,
            'blog_image' => 'image',
            'author' => 'required',
            'author_image' => 'image',
            "slug" => "required",
            "content" => "required",
            "short_description" => "required",
            "author_description" => "required",
            'status' => 'required',
            "blog_categories_id" => "required",
        ];
    }
}