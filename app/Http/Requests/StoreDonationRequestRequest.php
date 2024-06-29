<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDonationRequestRequest extends FormRequest
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
            'patient_name' => 'required|string|max:255',
            'patient_age' => 'required|integer',
            'bags_number' => 'required|integer|min:1|max:5',
            'hospital_name' => 'required|string|max:255',
            'hospital_address' => 'required|string|max:255',
            'patient_phone_number' => 'required|string|max:15',
            'details' => 'required|string',
            'latitude' => 'nullable|string|max:255',
            'longitude' => 'nullable|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'blood_type_id' => 'required|exists:blood_types,id',
        ];
    }
}
