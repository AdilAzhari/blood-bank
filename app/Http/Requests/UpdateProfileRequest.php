<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clients,email,' . $this->user()->id,
            'phone' => 'string|max:15',
            'd_o_b' => 'required|date',
            'last_donation_date' => 'nullable|date',
            'is_active' => 'boolean',
            'password' => 'nullable|string|min:8|confirmed',
            'city_id' => 'required|exists:cities,id',
            'blood_type_id' => 'required|exists:blood_types,id',
        ];
    }
}
