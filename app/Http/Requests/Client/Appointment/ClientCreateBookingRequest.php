<?php

namespace App\Http\Requests\Client\Appointment;

use Illuminate\Foundation\Http\FormRequest;

class ClientCreateBookingRequest extends FormRequest
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
            'user' => 'required',
            'branch' => 'required',
            'service' => 'required',
            'day' => 'required',
            'doctor' => 'required',
            'time' => 'required',
        ];
    }
}
