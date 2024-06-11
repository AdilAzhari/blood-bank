<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationRequestRequest extends FormRequest
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
            'patient_name' => ['required', 'string', 'max:255'],
            'patient_age' => ['required', 'integer'],
            'bags_number' => ['required', 'integer'],
            'hospital_name' => ['required', 'string', 'max:255'],
            'hospital_address' => ['required', 'string', 'max:255'],
            'city_id' => ['required', 'exists:cities,id'],
            'patient_phone_number' => ['required', 'string', 'max:255'],
            'details' => ['nullable', 'string', 'max:255'],
            'blood_type_id' => ['required', 'exists:blood_types,id'],
        ];
    }
}
