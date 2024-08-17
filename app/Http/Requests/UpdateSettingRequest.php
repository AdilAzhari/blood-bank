<?php

namespace App\Http\Requests;

use App\Models\Setting;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', Setting::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'about_app' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'notification_setting_text' => 'required|string',
            'email' => 'required|string|email|max:255',
            'fb_link' => 'required|string|url|max:255',
            'tw_link' => 'required|string|url|max:255',
            'insta_link' => 'required|string|url|max:255',
        ];
    }
}
