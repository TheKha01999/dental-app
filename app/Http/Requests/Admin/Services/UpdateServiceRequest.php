<?php

namespace App\Http\Requests\Admin\Services;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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
            'title' => 'required|min:5|max:1000|unique:services,title,' . $this->service,
            "slug" => "required",
            "content" => "required",
            "description" => "required",
            'status' => 'required|boolean',
            "service_categories_id" => "required",
            'image' => 'image',
        ];
    }
}
