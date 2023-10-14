<?php

namespace App\Http\Requests\Admin\Branch;

use Illuminate\Foundation\Http\FormRequest;

class CreateBranchRequest extends FormRequest
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
            'name' => 'required|min:5|max:100|unique:branchs,name',
            'email' => 'required|email|unique:branchs,email',
            'phone' => ['required', 'regex:/(84[3|5|7|8|9])+([0-9]{8})\b/'],
            'address' => 'required',
            'status' => 'required|boolean',
            'image' => 'image|required',
        ];
    }
}
