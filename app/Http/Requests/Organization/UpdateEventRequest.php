<?php

namespace App\Http\Requests\Organization;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $event = $this->route('event'); // Grabs the VolunteerActivity model from route

    return auth()->check() &&
           auth()->user()->organizationProfile->id === $event->organization_profile_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'location_address' => 'required|string|max:255',
            'location_city' => 'required|string|max:255',
            'location_province' => 'required|string|max:255',
            'start_date' => 'required|date_format:Y-m-d\TH:i',
            'end_date' => 'required|date_format:Y-m-d\TH:i|after:start_date',
            'registration_deadline' => 'required|date_format:Y-m-d\TH:i|before:start_date',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slots_available' => 'nullable|integer|min:0',
        ];
    }
}
