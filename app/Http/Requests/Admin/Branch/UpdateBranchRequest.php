<?php

namespace App\Http\Requests\Admin\Branch;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBranchRequest extends FormRequest
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
            'name' => 'required|min:5|max:100|unique:branchs,name,' . $this->branch,
            'email' => 'required|email|unique:branchs,email,' . $this->branch,
            'phone' => ['required', 'regex:/(84[3|5|7|8|9])+([0-9]{8})\b/'],
            'address' => 'required',
            'status' => 'required',
            'image' => 'image',
        ];
    }
}
