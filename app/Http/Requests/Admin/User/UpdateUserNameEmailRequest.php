<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserNameEmailRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email,' . $this->user,
            'name'  => ['required', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/', 'min:2', 'max:100'],
            'phone' => ['required', 'regex:/(84[3|5|7|8|9])+([0-9]{8})\b/'],
            'image' => 'image'
        ];
    }
}
