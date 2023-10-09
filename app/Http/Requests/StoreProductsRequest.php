<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductsRequest extends FormRequest
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
            'name' => 'required|min:5|max:1000|unique:products,name',
            "slug" => "required",
            "price" => "required",
            "qty" => "required",
            "short_description" => "required",
            "description" => "required",
            "information" => "required",
            "image" => 'image',
            'status' => 'required',
            "product_categories_id" => "required",
        ];
    }
}
